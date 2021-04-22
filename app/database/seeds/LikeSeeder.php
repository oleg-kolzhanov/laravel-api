<?php

use App\Models\Like;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

/**
 * Заполнение таблицы лайков.
 */
class LikeSeeder extends Seeder
{
    /**
     * Заполняет таблицу лайков.
     *
     * @return void
     * @throws Exception
     */
    public function run(): void
    {
        Like::truncate();

        $posts = Post::all();
        $usersCount = User::count();

        // Каждому посту добавляем лайки от случайных пользователей.
        foreach ($posts as $post) {
            $likesCount = random_int(1, $usersCount);
            $users = User::get()->random($likesCount);
            foreach ($users as $user) {
                Like::create([
                    'user_id' => $user->getKey(),
                    'post_id' => $post->getKey(),
                ]);
            }
        }
    }
}
