<?php

use App\Models\Post;
use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;

/**
 * Заполнение таблицы постов.
 */
class PostSeeder extends Seeder
{
    /**
     * Заполняет таблицу постов.
     *
     * @return void
     */
    public function run(): void
    {
        Post::truncate();

        $faker = Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Post::create([
                'user_id' => User::all()->random()->id,
                'title' => $faker->sentence,
                'content' => $faker->paragraph,
            ]);
        }
    }
}
