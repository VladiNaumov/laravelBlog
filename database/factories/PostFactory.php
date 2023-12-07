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
     * @return void
     */
    public function definition()
    {
        $this->define(Post::class, function (Faker $faker) {
            $name = $faker->realText(rand(70, 100));
            return [
                'user_id' => rand(1, 10),
                'category_id' => rand(1, 12),
                'name' => $name,
                'excerpt' => $faker->realText(rand(300, 400)),
                'content' => $faker->realText(rand(400, 500)),
                'slug' => Str::slug($name),
                'published_by' => rand(1, 10),
            ];
        });
    }
}
