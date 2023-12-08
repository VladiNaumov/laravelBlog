<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


/**
 * @extends Factory<Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
            return [
                'post_id' => rand(1, 50),
               // 'user_id' => rand(1, 10),
                'content' => fake()->text(),
                //'published_by' => rand(1, 3), // супер-админ или просто админ
            ];

    }



}
