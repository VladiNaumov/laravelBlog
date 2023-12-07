<?php

namespace Database\Factories;

use App\Models\Category;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $this->define(Category::class, function (Faker $faker) {
            $name = $faker->realText(rand(40, 50));
            return [
                'name' => $name,
                'content' => $faker->realText(rand(200, 500)),
                'slug' => Str::slug($name),
            ];
        });
    }
}
