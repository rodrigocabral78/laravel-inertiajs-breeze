<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

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
 * @package App\Models
 */
class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected static function booted(): void
    {
        static::creating(
            function (Post $post) {
                $post->uuid       = (string) Str::uuid();
                $post->created_by = (int) Auth::id() ?: 1;
                $post->updated_by = (int) Auth::id() ?: 1;
            }
        );
        static::updating(
            function (Post $post) {
                $post->updated_by = (int) Auth::id();
            }
        );
    }

    protected $table = 'posts';

    protected $casts = [
        'user_id'    => 'int',
        'created_by' => 'int',
        'updated_by' => 'int'
    ];

    protected $fillable = [
        'uuid',
        'user_id',
        'slug',
        'title',
        'description',
        'post',
        'created_by',
        'updated_by'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags')
                    ->withPivot('id', 'created_by', 'updated_by', 'deleted_at')
                    ->withTimestamps();
    }
}
