<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'available_quantity',
        'quantity',
        'purchaseproduct_id',
        'storage_id',
    ];

    public function stockquantity()
    {
        return $this->belongsTo(Stockquantity::class);
    }

    public function purchaseproduct()
    {
        return $this->belongsTo(Purchaseproduct::class);
    }
}
