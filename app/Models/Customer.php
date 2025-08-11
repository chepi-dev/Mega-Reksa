<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $table = 'customers';

    protected $fillable = [
        'Nama',
        'No_Telepon',
        'Alamat',
    ];

    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function mounthlySummaries()
    {
        return $this->hasMany(MonthlySummaries::class);
    }
}
