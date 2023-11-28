<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Post;
use App\Models\PostTag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Tag
 *
 * @property int $id
 * @property string|null $uuid
 * @property string $tag
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Collection|Post[] $posts
 *
 * @package App\Models\Base
 */
class Tag extends Model
{
    use SoftDeletes;
    public const ID         = 'id';
    public const UUID       = 'uuid';
    public const TAG        = 'tag';
    public const CREATED_BY = 'created_by';
    public const UPDATED_BY = 'updated_by';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    public const DELETED_AT = 'deleted_at';

    protected $casts = [
        self::ID         => 'int',
        self::CREATED_BY => 'int',
        self::UPDATED_BY => 'int',
        self::CREATED_AT => 'datetime',
        self::UPDATED_AT => 'datetime'
    ];

    protected $fillable = [
        self::UUID,
        self::TAG,
        self::CREATED_BY,
        self::UPDATED_BY
    ];

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_tags')
                    ->withPivot(PostTag::ID, PostTag::CREATED_BY, PostTag::UPDATED_BY, PostTag::DELETED_AT)
                    ->withTimestamps();
    }
}
