<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Returns extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderdetails_id',
        'return_date',
        'customer_name',
        'product_name',
        'price',
        'quantity',
    ];
}
