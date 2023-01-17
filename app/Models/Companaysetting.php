<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Companaysetting extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'company_name',
        'company_contact',
        'company_email',
        'company_address',
        'company_logo',
    ];
}
