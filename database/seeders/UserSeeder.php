<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@boss.com',
            'role' => 'admin',
            'password'=> Hash::make('12345678'),
        ]);
        // Editor user
         User::create([
            'name' => 'editor',
            'email' => 'editor@boss.com',
            'role' => 'editor',
            'password'=> Hash::make('12345678'),
        ]);
        // Viewer user
         User::create([
            'name' => 'viewer',
            'email' => 'viewer@boss.com',
            'role' => 'viewer',
            'password'=> Hash::make('12345678'),
        ]);
    }
}
