<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customeremail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'email',
        'phone',
        'subject',
        'customer_message',
        'customer_id',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
