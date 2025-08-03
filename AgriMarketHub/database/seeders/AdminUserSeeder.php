<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123'), // secure password
            'role' => 'admin', // make sure 'role' column exists in your SQL table
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
