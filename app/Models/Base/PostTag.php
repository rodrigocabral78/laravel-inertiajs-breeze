<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Post;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PostTag
 *
 * @property int $id
 * @property int $post_id
 * @property int $tag_id
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Post $post
 * @property Tag $tag
 *
 * @package App\Models\Base
 */
class PostTag extends Model
{
    use SoftDeletes;
    public const ID         = 'id';
    public const POST_ID    = 'post_id';
    public const TAG_ID     = 'tag_id';
    public const CREATED_BY = 'created_by';
    public const UPDATED_BY = 'updated_by';
    public const CREATED_AT = 'created_at';
    public const UPDATED_AT = 'updated_at';
    public const DELETED_AT = 'deleted_at';

    protected $casts = [
        self::ID         => 'int',
        self::POST_ID    => 'int',
        self::TAG_ID     => 'int',
        self::CREATED_BY => 'int',
        self::UPDATED_BY => 'int',
        self::CREATED_AT => 'datetime',
        self::UPDATED_AT => 'datetime'
    ];

    protected $fillable = [
        self::POST_ID,
        self::TAG_ID,
        self::CREATED_BY,
        self::UPDATED_BY
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function tag(): BelongsTo
    {
        return $this->belongsTo(Tag::class);
    }
}
