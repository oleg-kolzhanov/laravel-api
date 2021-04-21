<?php

namespace App\Http\Resources;

use App\Post;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Ресурс лайка.
 *
 * @property integer $id идентификатор
 * @property integer $user_id идентификатор пользователя
 * @property integer $post_id идентификатор поста
 * @property string $title заголовок поста
 * @property string $content содержание поста
 * @property Carbon $created_at метка времени создания поста
 * @property Carbon $updated_at метка времени редактирования поста
 * @property User $user автор лайка
 * @property Post $post пост
 */
class LikeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'user' => $this->user,
            'post' => $this->post,
        ];
    }
}
