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
 * @package App\Models
 */
class Tag extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected static function booted(): void
    {
        static::creating(
            function (Tag $tag) {
                $tag->uuid       = (string) Str::uuid();
                $tag->created_by = (int) Auth::id() ?: 1;
                $tag->updated_by = (int) Auth::id() ?: 1;
            }
        );
        static::updating(
            function (Tag $tag) {
                $tag->updated_by = (int) Auth::id();
            }
        );
    }

    protected $table = 'tags';

    protected $casts = [
        'created_by' => 'int',
        'updated_by' => 'int'
    ];

    protected $fillable = [
        'uuid',
        'tag',
        'created_by',
        'updated_by'
    ];

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post_tags')
                    ->withPivot('id', 'created_by', 'updated_by', 'deleted_at')
                    ->withTimestamps();
    }
}
