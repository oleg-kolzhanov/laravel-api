<?php

namespace App\Http\Controllers;

use App\Http\Resources\LikeResource;
use App\Like;
use App\Post;
use Illuminate\Http\Request;

/**
 * Контроллер лайков.
 *
 * @package App\Http\Controllers
 */
class LikeController extends Controller
{
    /**
     * Добавляет посту лайк.
     *
     * @param Request $request запрос добавления лайка
     * @param Post $post пост, который лайкнули
     * @return LikeResource
     */
    public function store(Request $request, Post $post): LikeResource
    {
        $like = Like::firstOrCreate(
            [
                'user_id' => $request->user()->id,
                'post_id' => $post->id,
            ]
        );

        return new LikeResource($like);
    }
}
