<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'designation',
        'company_name',
        'contact',
        'address',
    ];

    public function supplierproduct()
    {
        return $this->hasMany(Supplierproduct::class);
    }

    public function purchase()
    {
        return $this->hasMany(Purchase::class);
    }
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

    public function purchasepanding()
    {
        return $this->hasMany(Purchasepanding::class);
    }

    public function supplieremail()
    {
        return $this->hasMany(Supplieremail::class);
    }
}
