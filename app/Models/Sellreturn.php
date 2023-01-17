<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sellreturn extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'date',
        'order_id',
        'total_amount',
        'received_amount',
        'due_amount',
        'total_return_amount',
        'current_return_amount',
        'damage_note',
    ];

    public function sellreturnproduct()
    {
        return $this->hasMany(Sellreturnproduct::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
