<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->updateOrInsert(
            ['email' => 'victorloghin06@gmail.com'],
            [
                'name' => 'Admin Pink Cafe',
                'email' => 'victorloghin06@gmail.com',
                'password' => Hash::make('admin111'),
                'rol' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        );
    }
}