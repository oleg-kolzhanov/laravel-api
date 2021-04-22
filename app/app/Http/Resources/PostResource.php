<?php

namespace App\Http\Resources;

use App\Models\Like;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

/**
 * Ресурс поста.
 *
 * @property integer $id идентификатор
 * @property integer $user_id идентификатор автора поста
 * @property string $title заголовок поста
 * @property string $content содержание поста
 * @property Carbon $created_at метка времени создания поста
 * @property Carbon $updated_at метка времени редактирования поста
 * @property User $user автор поста
 * @property Like[]|Collection $likes лайки поста
 */
class PostResource extends JsonResource
{
    /**
     * Трансформирует пост в массив.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'user' => $this->user,
            'likes' => $this->likes,
        ];
    }
}
