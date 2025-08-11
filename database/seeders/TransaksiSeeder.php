<?php

namespace Database\Seeders;

use App\Models\Transaksi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Transaksi::insert([
            'customer_id' => 1,
            'Tanggal' => '2025-07-22',
            'Nama_Customer' => 'John Doe',
            'AWB' => 'AWB001',
            'Nama_Barang' => 'Laptop Asus',
            'Tujuan' => 'Jakarta',
            'Koli' => 1,
            'Berat' => 3.5,
            'Tarif_Pertama' => 50000,
            'Tarif_Selanjutnya' => 0,
            'Total_Tarif' => 50000,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}