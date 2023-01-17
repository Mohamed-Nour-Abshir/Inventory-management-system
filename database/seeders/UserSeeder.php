<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user = User::where('email', 'info@kaizenitbd.com')->first();

        if (is_null($user)) {
            $user = new User();
            $user->name = 'Kaizen It Ltd';
            $user->email = 'info@kaizenitbd.com';
            $user->password = Hash::make('123456789');
            $user->contact = '01934453979';
            $user->designation = 'Admin';
            $user->address = '151/6, 2nd floor, Gazi Tower, Panthapath Dhaka-1205';
        }
    }
}
