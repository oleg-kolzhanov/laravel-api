<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Модель лайков.
 *
 * @property integer $id идентификатор
 * @property integer $user_id идентификатор пользователя
 * @property integer $post_id идентификатор поста
 * @property Carbon created_at метка времени создания записи
 * @property Carbon updated_at метка времени редактирования записи
 *
 * @property User $user Автор лайка
 * @property Post $post Пост
 *
 * @method static truncate()
 * @method static firstOrCreate(array $array)
 *
 * @package App
 */
class Like extends Model
{
    /**
     * @inheritDoc
     */
    protected $table = 'likes';

    /**
     * @inheritDoc
     */
    protected $fillable = ['user_id'];

    /**
     * Возвращает связь с пользователем.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Возвращает связь с постом.
     *
     * @return BelongsTo
     */
    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }
}
