<?php

namespace App\Services;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Validation\ValidationException;

/**
 * Интерфейс для работы с постами.
 *
 * @package App\Services
 */
interface PostServiceInterface
{
    /**
     * Возвроащает список постов с постраничкой.
     *
     * @return LengthAwarePaginator
     */
    public function getPosts(): LengthAwarePaginator;

    /**
     * Создает пост.
     *
     * @param PostRequest $request запрос на создание поста
     * @return Post
     * @throws ValidationException
     * @throws AuthorizationException
     */
    public function store(PostRequest $request): Post;

    /**
     * Обновляет пост.
     *
     * @param PostRequest $request запрос на обновление поста
     * @param Post $post пост
     * @return bool
     * @throws ValidationException
     * @throws AuthorizationException
     */
    public function update(PostRequest $request, Post $post): bool;

    /**
     * Удаляет пост.
     *
     * @param Post $post пост
     * @return bool
     */
    public function remove(Post $post): bool;
}
