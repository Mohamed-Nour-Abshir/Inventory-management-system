<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'order_id',
        'product_id',
        'warehousestockqty_id',
        'product_name',
        'purchase_price',
        'sell_price',
        'quantity',
        'total_price',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function warehousestockqty()
    {
        return $this->belongsTo(Warehousestockqty::class);
    }
}
