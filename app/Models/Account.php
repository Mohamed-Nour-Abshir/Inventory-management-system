<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'account_name',
        'account_number',
        'account_holder_name',
        'branch_name',
        'account_balance',
        'account_status',
    ];

    public function fundtransfer()
    {
        return $this->hasMany(Fundtransfer::class);
    }
}
