<?php

namespace App\Services;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
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
     * @param StorePostRequest $request запрос на создание поста
     * @return Post
     * @throws ValidationException
     * @throws AuthorizationException
     */
    public function store(StorePostRequest $request): Post;

    /**
     * Обновляет пост.
     *
     * @param UpdatePostRequest $request запрос на обновление поста
     * @param Post $post пост
     * @return bool
     * @throws ValidationException
     * @throws AuthorizationException
     */
    public function update(UpdatePostRequest $request, Post $post): bool;

    /**
     * Удаляет пост.
     *
     * @param Post $post пост
     * @return bool
     */
    public function remove(Post $post): bool;
}
