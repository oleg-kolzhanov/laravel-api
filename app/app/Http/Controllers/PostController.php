<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Services\PostServiceInterface;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Validation\UnauthorizedException;
use Illuminate\Validation\ValidationException;

/**
 * Контроллер постов.
 *
 * @package App\Http\Controllers
 */
class PostController extends Controller
{
    /**
     * @var PostServiceInterface $postService сервис по работе с постами
     */
    protected $postService;

    /**
     * Конструктор.
     *
     * @param PostServiceInterface $postService сервис по работе с постами
     */
    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Возвращает список постов.
     *
     * @return AnonymousResourceCollection
     */
    public function index(): AnonymousResourceCollection
    {
        return PostResource::collection($this->postService->getPosts());
    }

    /**
     * Сохраняет новый пост.
     *
     * @param PostRequest $request запрос создания поста
     * @return PostResource
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function store(PostRequest $request): PostResource
    {
        $post = $this->postService->store($request);
        return new PostResource($post);
    }

    /**
     * Возвращает пост.
     *
     * @param Post $post пост
     * @return PostResource
     */
    public function show(Post $post): PostResource
    {
        return new PostResource($post);
    }

    /**
     * Обновляет пост.
     *
     * @param PostRequest $request запрос обновления поста
     * @param Post $post пост
     * @return PostResource|JsonResponse
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function update(PostRequest $request, Post $post)
    {
        try {
            $this->postService->update($request, $post);
            return new PostResource($post);
        } catch (UnauthorizedException $exception) {
            return response()->json('Можно редактировать только свои посты.', 403);
        }
    }

    /**
     * Удаляет пост.
     *
     * @param Post $post пост
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Post $post): JsonResponse
    {
        $post->delete();
        return response()->json(null, 204);
    }
}
