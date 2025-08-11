<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksis';
    protected $primaryKey = 'id';
    protected $fillable = [
        'customer_id',
        'Tanggal',
        'Nama_Customer',
        'AWB',
        'Nama_Barang',
        'Tujuan',
        'Koli',
        'Berat',
        'Tarif_Pertama',
        'Tarif_Selanjutnya',
        'Total_Tarif'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}