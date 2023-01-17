<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fundtransfer extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'date',
        'account_id',
        'balance_transfer',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }
}
