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

        $user = User::where('email', 'info@nitmag.com')->first();

        if (is_null($user)) {
            $user = new User();
            $user->name = 'Nitmag';
            $user->email = 'info@nitmag.com';
            $user->password = Hash::make('123456789');
            $user->contact = '+8801943-505040';
            $user->designation = 'Admin';
            $user->address = '#Baitul Laz, Flat-4A, 3rd Floor, 183,
            Green Road, Dhanmondi, Dhaka-1205';
        }
    }
}
