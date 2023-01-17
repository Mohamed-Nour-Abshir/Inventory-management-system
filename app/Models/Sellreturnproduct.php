<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sellreturnproduct extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'product_name',
        'sell_price',
        'quantity',
        'return_quantity',
        'replace_product',
        'return_amount',
        'subtotal_amount',
        'sellreturn_id',
    ];

    public function sellreturn()
    {
        return $this->belongsTo(Sellreturn::class);
    }
}
