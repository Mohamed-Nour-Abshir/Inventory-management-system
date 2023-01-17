<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'name' => 'Kh Tasfik',
                'email' => 'tasfik.kh@gmail.com',
                'password' => Hash::make('123456789'),
                'contact' => '01935553979',
                'image' => 'kaizenit.png',
                'is_admin' => '1',
                'designation' => 'Admin',
                'address' => '151/6, 2nd floor, Gazi Tower, Panthapath Dhaka-1205',
            ]
        );
    }
}
