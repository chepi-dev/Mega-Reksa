<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transaksis = Transaksi::latest()->get();
        return view('Transaksi.index', compact('transaksis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $customers = Customer::all();
        return view('Transaksi.create', compact('customers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'Tanggal' => 'required|date',
            'Nama_Customer' => 'required|string',
            'AWB' => 'required|string',
            'Nama_Barang' => 'required|string',
            'Tujuan' => 'required|string',
            'Koli' => 'required|numeric',
            'jenis_transaksi' => 'required|in:normal,tanpa_tarif_pertama,manual',
        ]);

        $Berat = null;
        $Tarif_Pertama = null;
        $Tarif_Selanjutnya = null;
        $Total_Tarif = 0;

        switch ($request->jenis_transaksi) {
            case 'normal':
                $request->validate([
                    'Berat' => 'required|numeric',
                    'Tarif_Pertama' => 'required|numeric',
                    'Tarif_Selanjutnya' => 'required|numeric',
                ]);
                $Berat = $request->Berat;
                $Tarif_Pertama = $request->Tarif_Pertama;
                $Tarif_Selanjutnya = $request->Tarif_Selanjutnya;

                $batas = 5;
                if ($Berat <= $batas) {
                    $Total_Tarif = $Tarif_Pertama;
                } else {
                    $Total_Tarif = $Tarif_Pertama + (($Berat - $batas) * $Tarif_Selanjutnya);
                }
                break;

            case 'tanpa_tarif_pertama':
                $request->validate([
                    'Berat' => 'required|numeric',
                    'Tarif_Selanjutnya' => 'required|numeric',
                ]);
                $Berat = $request->Berat;
                $Tarif_Selanjutnya = $request->Tarif_Selanjutnya;
                $Total_Tarif = $Berat * $Tarif_Selanjutnya;
                break;

            case 'manual':
                $request->validate([
                    'Total_Tarif' => 'required|numeric',
                ]);
                $Total_Tarif = $request->Total_Tarif;
                break;
        }

        Transaksi::create([
            'customer_id' => $request->customer_id,
            'Tanggal' => $request->Tanggal,
            'Nama_Customer' => $request->Nama_Customer,
            'AWB' => $request->AWB,
            'Nama_Barang' => $request->Nama_Barang,
            'Tujuan' => $request->Tujuan,
            'Koli' => $request->Koli,
            'Berat' => $Berat ?? 0,
            'Tarif_Pertama' => $Tarif_Pertama ?? 0,
            'Tarif_Selanjutnya' => $Tarif_Selanjutnya ?? 0,
            'Total_Tarif' => $Total_Tarif,
        ]);

        return redirect()->route('Transaksi.index')->with('success', 'Transaksi berhasil disimpan.');
    }




    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        $customers = Customer::all();
        return view('Transaksi.edit', compact('transaksi', 'customers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $transaksi = Transaksi::findOrFail($id);

        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'Tanggal' => 'required|date',
            'Nama_Customer' => 'required|string',
            'AWB' => 'required|string',
            'Nama_Barang' => 'required|string',
            'Tujuan' => 'required|string',
            'Koli' => 'required|numeric',
            'jenis_transaksi' => 'required|in:normal,tanpa_tarif_pertama,manual',
        ]);

        $Berat = null;
        $Tarif_Pertama = null;
        $Tarif_Selanjutnya = null;
        $Total_Tarif = 0;

        switch ($request->jenis_transaksi) {
            case 'normal':
                $request->validate([
                    'Berat' => 'required|numeric',
                    'Tarif_Pertama' => 'required|numeric',
                    'Tarif_Selanjutnya' => 'required|numeric',
                ]);
                $Berat = $request->Berat;
                $Tarif_Pertama = $request->Tarif_Pertama;
                $Tarif_Selanjutnya = $request->Tarif_Selanjutnya;

                $batas = 5;
                if ($Berat <= $batas) {
                    $Total_Tarif = $Tarif_Pertama;
                } else {
                    $Total_Tarif = $Tarif_Pertama + (($Berat - $batas) * $Tarif_Selanjutnya);
                }
                break;

            case 'tanpa_tarif_pertama':
                $request->validate([
                    'Berat' => 'required|numeric',
                    'Tarif_Selanjutnya' => 'required|numeric',
                ]);
                $Berat = $request->Berat;
                $Tarif_Selanjutnya = $request->Tarif_Selanjutnya;
                $Total_Tarif = $Berat * $Tarif_Selanjutnya;
                break;

            case 'manual':
                $request->validate([
                    'Total_Tarif' => 'required|numeric',
                ]);
                $Total_Tarif = $request->Total_Tarif;
                break;
        }

        $transaksi->update([
            'customer_id' => $request->customer_id,
            'Tanggal' => $request->Tanggal,
            'Nama_Customer' => $request->Nama_Customer,
            'AWB' => $request->AWB,
            'Nama_Barang' => $request->Nama_Barang,
            'Tujuan' => $request->Tujuan,
            'Koli' => $request->Koli,
            'Berat' => $Berat ?? 0,
            'Tarif_Pertama' => $Tarif_Pertama ?? 0,
            'Tarif_Selanjutnya' => $Tarif_Selanjutnya ?? 0,
            'Total_Tarif' => $Total_Tarif,
            'jenis_transaksi' => $request->jenis_transaksi,
        ]);

        return redirect()->route('Transaksi.index')->with('success', 'Transaksi berhasil diperbarui.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        $transaksi->delete();

        return redirect()->route('Transaksi.index')->with([
            'success' => 'Transaksi deleted successfully'
        ]);
    }
}
