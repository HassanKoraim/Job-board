<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $users = User::all();

        if ($users->isEmpty()) {
            $users = User::factory(5)->create();
        }

        // Create 20 posts distributed randomly across those users
        Post::factory(20)
            ->recycle($users)
            ->create();
    }
    
}
