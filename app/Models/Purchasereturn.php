<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchasereturn extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'date',
        'product_id',
        'supplier_name',
        'quantity',
        'damage_note',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function purchasereturnquantity()
    {
        return $this->hasMany(Purchasereturnquantity::class);
    }
}
