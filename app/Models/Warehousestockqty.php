<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Warehousestockqty extends Model
{
    use HasFactory;

    protected $fillable = [
        'warehouse_name',
        'warehouse_stockqty',
        'product_id',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
