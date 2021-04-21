<?php

namespace App\Services;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Post;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Сервис по работе с постами.
 *
 * @package App\Services
 */
class PostService implements PostServiceInterface
{
    /**
     * Количестсво строк на странице в списке постов.
     */
    protected const ROWS_PER_PAGE = 25;

    /**
     * @var Post пустая модель поста
     */
    protected $postModel;

    /**
     * Конструктор.
     *
     * @param Post $postModel пустая модель поста
     */
    public function __construct(
        Post $postModel
    )
    {
        $this->postModel = $postModel;
    }

    /**
     * @inheritDoc
     */
    public function getPosts(): LengthAwarePaginator
    {
        return $this->postModel::with('likes')->paginate(self::ROWS_PER_PAGE);
    }

    /**
     * @inheritDoc
     */
    public function store(StorePostRequest $request): Post
    {
        return $this->postModel::create($request->validated());
    }

    /**
     * @inheritDoc
     */
    public function update(UpdatePostRequest $request, Post $post): bool
    {
        return $post->update($request->only(['title', 'content']));
    }

    /**
     * @inheritDoc
     * @throws Exception
     */
    public function remove(Post $post): bool
    {
        return $post->delete();
    }
}
