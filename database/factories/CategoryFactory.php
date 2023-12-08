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
     * @return array
     */
    public function definition()
    {

            return [
                'name' => fake()->name(),
                'content'  => fake()->title(),
                'slug' => fake()->slug(),
            ];
    }
}

