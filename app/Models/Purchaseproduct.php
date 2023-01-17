<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchaseproduct extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'products_id',
        'product_name',
        'product_price',
        'sell_price',
        'quantity',
        'discount',
        'color',
        'total_amount',
        'purchase_id',
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }

    public function product()
    {
        return $this->hasMany(Product::class);
    }

    public function purchasereturn()
    {
        return $this->hasMany(Purchasereturn::class);
    }

    public function orderdetail()
    {
        return $this->hasMany(Orderdetail::class);
    }
}
