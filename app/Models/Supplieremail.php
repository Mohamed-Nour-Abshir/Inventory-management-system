<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplieremail extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'email',
        'phone',
        'subject',
        'supplier_message',
        'supplier_id',
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
