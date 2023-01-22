<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stockquantity extends Model
{
    use HasFactory;

    public function purchaseproduct()
    {
        return $this->hasMany(Purchaseproduct::class);
    }

    public function stock()
    {
        return $this->belongsTo(Stock::class);
    }
}
