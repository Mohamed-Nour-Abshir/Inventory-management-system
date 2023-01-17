<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            [
                'designation' => 'Admin',
            ]
        ];

        foreach ($roles as $key => $value) {
            Role::create($value);
        }
    }
}
