<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Collection;

/**
 * Модель постов.
 *
 * @property integer $id идентификатор
 * @property integer $user_id идентификатор автора поста
 * @property string $title заголовок поста
 * @property string $content содержание поста
 * @property Carbon created_at метка времени создания записи
 * @property Carbon updated_at метка времени редактирования записи
 *
 * @property User $user автор поста
 * @property Like[]|Collection $likes лайки поста
 *
 * @method static truncate()
 * @method static create(array $array)
 * @method static pluck(string $string)
 *
 * @package App
 */
class Post extends Model
{
    /**
     * @inheritDoc
     */
    protected $table = 'posts';

    /**
     * @inheritDoc
     */
    protected $fillable = ['user_id', 'title', 'content'];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasMany
     */
    public function likes(): HasMany
    {
        return $this->hasMany(Like::class);
    }
}
