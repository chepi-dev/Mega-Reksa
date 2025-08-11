<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\MonthlySummaries;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MonthlySummariesController extends Controller
{
    public function index(Request $request)
    {
        // Debug penerimaan parameter
        logger()->info('Filter Request:', $request->all());

        $selectedMonth = $request->input('month', now()->format('Y-m'));
        $customerId = $request->input('customer_id');

        // Query
        $query = Customer::query();

        if ($customerId) {
            $query->where('id', $customerId);
        }

        $customers = $query->withCount(['transaksis as transactions_count' => function ($query) use ($selectedMonth) {
            $query->whereYear('Tanggal', substr($selectedMonth, 0, 4))
                ->whereMonth('Tanggal', substr($selectedMonth, 5, 2));
        }])
            ->withMax('transaksis', 'Tanggal')
            ->orderBy('Nama')
            ->paginate(10)
            ->appends($request->query()); // Pertahankan parameter filter

        $months = $this->generateMonthList();

        return view('summaries.index', compact('customers', 'months', 'selectedMonth', 'customerId'));
    }


    public function generate(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists::customers,id',
            'month' => 'required|date_format:Y-m',
        ]);

        $total = Transaksi::where('customer_id', $request->customer_id)
            ->whereYear('Tanggal', Carbon::parse($request->mounth)->year)
            ->whereMonth('Tanggal', Carbon::parse($request->mounth)->month)
            ->sum('Total_Tarif');

        $summary = MonthlySummaries::updateOrCreate(
            [
                'customer_id' => $request->customer_id,
                'mounth' => $request->mounth
            ],
            [
                'total_tarif' => $total
            ]
        );

        return response()->json([
            'sussess' => true,
            'dara' => $summary
        ]);
    }

    public function show($customerId, Request $request)
    {
        $month = $request->input('month', now()->format('Y-m'));
        $customer = Customer::findOrFail($customerId);

        $transactions = Transaksi::where('customer_id', $customerId)
            ->whereYear('Tanggal', Carbon::parse($month)->year)
            ->whereMonth('Tanggal', Carbon::parse($month)->month)
            ->get();

        $total = $transactions->sum('Total_Tarif');

        return view('summaries.show', [
            'customer' => $customer,
            'transactions' => $transactions,
            'month' => $month,
            'total' => $total
        ]);
    }

    public function generateAll($mounth = null)
    {
        $mouth = $mounth ?? Carbon::now()->format('Y-m');

        $customers = Transaksi::select('customer_id')
            ->whereYear('Tanggal', Carbon::parse($mouth)->year)
            ->whereMonth('Tanggal', Carbon::parse($mouth)->month)
            ->groupBy('customer_id')
            ->get();

        foreach ($customers as $customer) {
            $this->generate(new Request([
                'customer_id' => $customer->customer_id,
                'month' => $mouth
            ]));
        }

        return response()->json([
            'message' => 'Rekapan Bulan' . $mounth . ' berhasil di generate',
            'total customer' => $customers->count()
        ]);
    }

    protected function generateMonthList($range = 12)
    {
        $currentDate = now();
        $months = [];

        for ($i = 0; $i < $range; $i++) {
            $date = $currentDate->copy()->subMonths($i);
            $months[$date->format('Y-m')] = $date->isoFormat('MMMM Y');
        }

        return $months;
    }
}
