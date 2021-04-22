<?php

namespace App\Services;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Exception;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Validation\UnauthorizedException;

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
    public function store(PostRequest $request): Post
    {
        $data = array_merge(
            ['user_id' => $request->user()->id],
            $request->validated()
        );
        return $this->postModel::create($data);
    }

    /**
     * @inheritDoc
     * @throws UnauthorizedException
     */
    public function update(PostRequest $request, Post $post): bool
    {
        if ($post->user_id !== $request->user()->id) {
            throw new UnauthorizedException('Можно редактировать только свои посты', 403);
        }
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
