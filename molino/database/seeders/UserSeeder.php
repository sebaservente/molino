<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('users')->insert([
            [
                'user_id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com.ar',
                'password' => \Hash::make('asdasd'),
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
