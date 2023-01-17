<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplierproduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'products_id',
        'product',
        'price',
        'supplier_id',
    ];


    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
