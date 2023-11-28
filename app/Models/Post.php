<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Models\Base\Post as BasePost;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Post extends BasePost
{
    use HasFactory;

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
}
