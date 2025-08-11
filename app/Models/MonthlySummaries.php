<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlySummaries extends Model
{
    protected $table = 'monthly_summaries';
    protected $fillable = [
        'customer_id',
        'mounth',
        'total_tarif'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
