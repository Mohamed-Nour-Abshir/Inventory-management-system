<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'order_id',
        'invoice',
        'order_date',
        'shipping_id',
        'paymentmethod',
        'total_amount',
        'received_amount',
        'discount',
        'vat',
        'due',
        'discount_tk',
        'vat_tk',
        'order_status',
    ];

    public function shipping()
    {
        return $this->belongsTo(Shipping::class);
    }

    public function orderdetail()
    {
        return $this->hasMany(Orderdetail::class);
    }

    public function sellreturn()
    {
        return $this->hasMany(Sellreturn::class);
    }
}
