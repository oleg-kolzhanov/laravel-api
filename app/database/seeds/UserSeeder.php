<?php

use App\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Заполнение таблицы пользователей.
 */
class UserSeeder extends Seeder
{
    /**
     * Заполняет таблицу пользователей.
     *
     * @return void
     */
    public function run(): void
    {
        User::truncate();

        $faker = Factory::create();

        $password = Hash::make('secret');

        // Api пользователь
        User::create([
            'name' => 'api',
            'email' => 'api@laravel.test',
            'password' => $password,
        ]);

        // Несколько дополнительных пользователей
        for ($i = 0; $i < 10; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
            ]);
        }
    }
}
