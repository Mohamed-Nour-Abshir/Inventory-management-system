<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchasereturnquantity extends Model
{
    use HasFactory;

    protected $fillable = [
        'warehouse_name',
        'warehouse_quantity',
        'damage_quantity',
        'purchasereturn_id',
    ];

    public function purchasereturn()
    {
        return $this->belongsTo(Purchasereturn::class);
    }
}
