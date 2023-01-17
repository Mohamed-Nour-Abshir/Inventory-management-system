<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'purchaseproduct_id',
        'products_id',
        'product_name',
        'supplier_name',
        'purchase_price',
        'sell_price',
        'image',
        'quantity',
        'product_code',
        'category_id',
        'unit_id',
        'brand_id',
        'warehouse_id',
        'status',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function units()
    {
        return $this->belongsTo(Unit::class);
    }

    public function purchaseproduct()
    {
        return $this->belongsTo(Purchaseproduct::class);
    }

    public function warehousestockqty()
    {
        return $this->hasMany(Warehousestockqty::class);
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
