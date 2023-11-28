<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\PostTag;
use App\Models\Tag;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Post
 *
 * @property int $id
 * @property string|null $uuid
 * @property int $user_id
 * @property string $slug
 * @property string $title
 * @property string $description
 * @property string $post
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property User $user
 * @property Collection|Tag[] $tags
 *
 * @package App\Models\Base
 */
class Post extends Model
{
    use SoftDeletes;
    public const ID          = 'id';
    public const UUID        = 'uuid';
    public const USER_ID     = 'user_id';
    public const SLUG        = 'slug';
    public const TITLE       = 'title';
    public const DESCRIPTION = 'description';
    public const POST        = 'post';
    public const CREATED_BY  = 'created_by';
    public const UPDATED_BY  = 'updated_by';
    public const CREATED_AT  = 'created_at';
    public const UPDATED_AT  = 'updated_at';
    public const DELETED_AT  = 'deleted_at';

    protected $casts = [
        self::ID         => 'int',
        self::USER_ID    => 'int',
        self::CREATED_BY => 'int',
        self::UPDATED_BY => 'int',
        self::CREATED_AT => 'datetime',
        self::UPDATED_AT => 'datetime'
    ];

    protected $fillable = [
        self::UUID,
        self::USER_ID,
        self::SLUG,
        self::TITLE,
        self::DESCRIPTION,
        self::POST,
        self::CREATED_BY,
        self::UPDATED_BY
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tags')
                    ->withPivot(PostTag::ID, PostTag::CREATED_BY, PostTag::UPDATED_BY, PostTag::DELETED_AT)
                    ->withTimestamps();
    }
}
