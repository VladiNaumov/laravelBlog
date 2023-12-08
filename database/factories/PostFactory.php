<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/**
 * @extends Factory<Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

            return [
              //  'category_id' => rand(1, 12),
              //  'published_by' => rand(1, 3), // супер-админ или просто админ
              //  'user_id' => rand(1, 10),
                'name' => fake()->name(),
                'excerpt' => fake()->realText(rand(300, 400)),
                'slug' => fake()->slug(),
                'content' => fake()->title(),

            ];
    }
}
