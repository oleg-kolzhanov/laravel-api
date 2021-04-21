<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostResource;
use App\Post;
use App\Services\PostServiceInterface;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
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
     * Создает пост.
     *
     * @param StorePostRequest $request
     * @return PostResource
     */

    /**
     * Сохраняет новый пост.
     *
     * @param StorePostRequest $request
     * @return PostResource
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function store(StorePostRequest $request): PostResource
    {
//        try {
            $post = $this->postService->store($request);
            return new PostResource($post);
//        } catch (AuthorizationException $e) {
//            return response()->json([
//                'code'      =>  500,
//                'message'   =>  'Validation error'
//            ], 500);
//        } catch (ValidationException $e) {
//            return response()->json([
//                'code'      =>  500,
//                'message'   =>  'Validation error'
//            ], 500);
//        }
    }

    /**
     * Возвращает пост.
     *
     * @param Post $post
     * @return PostResource
     */
    public function show(Post $post): PostResource
    {
        return new PostResource($post);
    }

    /**
     * Обновляет пост.
     *
     * @param UpdatePostRequest $request запрос обновления поста
     * @param Post $post пост
     * @return PostResource
     * @throws AuthorizationException
     * @throws ValidationException
     */
    public function update(UpdatePostRequest $request, Post $post): PostResource
    {
        $this->postService->update($request, $post);
        return new PostResource($post);
    }

    /**
     * Удаляет пост.
     *
     * @param Post $post
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(Post $post): JsonResponse
    {
        $post->delete();
        return response()->json(null, 204);
    }
}
