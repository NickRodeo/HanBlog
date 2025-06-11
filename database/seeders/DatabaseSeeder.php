<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(5)->create();

        Post::factory(20)->create();
        
        Category::factory()->create([
            'name' => "Personal",
            'slug' => "personal"
        ]);

        Category::factory()->create([
            'name' => "Programming",
            'slug' => "programming"
        ]);

        Category::factory()->create([
            'name' => "Fun Thing",
            'slug' => "fun-thing"
        ]);

        Category::factory()->create([
            'name' => "Sport",
            'slug' => "sport"
        ]);
    }
}
