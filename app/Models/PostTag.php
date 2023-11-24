<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

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
 * @package App\Models
 */
class PostTag extends Pivot
{
    use HasFactory;
    use SoftDeletes;

    protected static function booted(): void
    {
        static::creating(
            function (PostTag $postTag) {
                $postTag->created_by = (int) Auth::id() ?: 1;
                $postTag->updated_by = (int) Auth::id() ?: 1;
            }
        );
        static::updating(
            function (PostTag $postTag) {
                $postTag->updated_by = (int) Auth::id();
            }
        );
    }

    protected $table = 'post_tags';

    protected $casts = [
        'post_id'    => 'int',
        'tag_id'     => 'int',
        'created_by' => 'int',
        'updated_by' => 'int'
    ];

    protected $fillable = [
        'post_id',
        'tag_id',
        'created_by',
        'updated_by'
    ];

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
}
