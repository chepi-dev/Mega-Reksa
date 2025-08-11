<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaksi;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $month = request('month', now()->format('Y-m'));
        $customerId = request('customer_id');

        $query = Customer::query();

        // Filter berdasarkan customer jika dipilih
        if ($customerId) {
            $query->where('id', $customerId);
        }

        // Tambahkan count transaksi bulan ini
        $query->withCount([
            'transaksis' => function ($q) use ($month) {
                $q->whereYear('Tanggal', Carbon::parse($month)->year)
                    ->whereMonth('Tanggal', Carbon::parse($month)->month);
            }
        ]);

        // Tambahkan data transaksi terakhir
        $query->with([
            'transaksis' => function ($q) use ($month) {
                $q->whereYear('Tanggal', Carbon::parse($month)->year)
                    ->whereMonth('Tanggal', Carbon::parse($month)->month)
                    ->orderBy('Tanggal', 'desc')
                    ->limit(1);
            }
        ]);

        // Gunakan pagination
        $customers = $query->paginate(10);

        // Ambil semua customer untuk dropdown select2
        $allCustomers = Customer::all();

        return view('invoice.index', [
            'customers' => $customers,
            'allCustomers' => $allCustomers,
            'selectedMonth' => $month,
            'customerId' => $customerId
        ]);
    }

    // Di InvoiceController.php
    public function show($customer, $month)
    {
        // Hitung total tarif tanpa mengambil semua data transaksi
        $totalTarif = Transaksi::where('customer_id', $customer)
            ->whereYear('Tanggal', Carbon::parse($month)->year)
            ->whereMonth('Tanggal', Carbon::parse($month)->month)
            ->sum('Total_Tarif');

        // Ambil data customer
        $customer = Customer::findOrFail($customer);

        if ($totalTarif == 0) {
            abort(404, 'Tidak ada transaksi ditemukan');
        }

        $terbilang = terbilang($totalTarif) . ' rupiah';

        return view('invoice.show-invoice', [
            'total' => $totalTarif,
            'terbilang' => $terbilang,
            'periode' => Carbon::parse($month)->locale('id')->isoFormat('MMMM YYYY'),
            'customer' => $customer
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
