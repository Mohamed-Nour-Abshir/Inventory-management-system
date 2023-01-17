<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchasepanding extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'supplier_id',
        'product_name',
        'qty',
        'purchase_id',
    ];

    public function purchase()
    {
        return $this->belongsTo(Purchase::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
