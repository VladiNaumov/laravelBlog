<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * @method factory(string $class, int $int)
 */
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // создать 10 пользователей
       User::factory()->count(10)->create();
    }
}
