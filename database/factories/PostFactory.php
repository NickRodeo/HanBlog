<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = implode(' ', fake()->words(mt_rand(3, 5)));
        return [
            'title' => $title,
            'slug' => Str::slug($title) . '-' . fake()->numberBetween(1000, 9999),
            'excerpt' => implode(' ', fake()->words(mt_rand(6, 10))),
            'body' => "<p>" . collect(range(1, mt_rand(5, 8)))
            ->map(fn() => fake()->paragraphs(mt_rand(8, 11), true))
            ->implode("</p><p>") . "</p>",
            'category_id' => mt_rand(1, 4),
            'user_id' => mt_rand(1, 5)
        ];
    }
}
