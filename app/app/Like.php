<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Модель лайков.
 *
 * @property integer $id идентификатор
 * @property integer $user_id идентификатор пользователя
 * @property integer $post_id идентификатор поста
 *
 * @property User $user Автор лайка
 * @property Post $post Пост
 *
 * @package App
 * @method static truncate()
 * @method static firstOrCreate(array $array)
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
