<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Create Admin User
        User::factory()->admin()->create();

        // Create Author User
        User::factory()->author()->create();

        // Create Reader Users
        User::factory()->count(5)->create();

        // Create Posts
        Post::factory()->count(10)->create();
    }
}
