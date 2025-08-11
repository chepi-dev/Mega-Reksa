<?php

namespace Database\Seeders;

use App\Models\Customer;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Customer::insert([
            ['Nama' => 'PT Sinar Jaya', 'No_Telepon' => '08123456789', 'Alamat' => 'Jl. Mawar No.1'],
            ['Nama' => 'CV Mandiri Logistik', 'No_Telepon' => '08234567890', 'Alamat' => 'Jl. Melati No.2'],
            ['Nama' => 'PT Global Express', 'No_Telepon' => '08345678901', 'Alamat' => 'Jl. Anggrek No.3'],
        ]);
    }
}