<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'orderID',
        'total_payment',
        'due',
        'purchase_status',
        'payment_status',
        'supplier_id',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function purchaseproduct()
    {
        return $this->hasMany(Purchaseproduct::class);
    }

    public function purchasepanding()
    {
        return $this->hasMany(Purchasepanding::class, 'purchase_id', 'id');
    }
}
