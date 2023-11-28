<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Models\Base\PostTag as BasePostTag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;

class PostTag extends BasePostTag
{
    use HasFactory;

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
}
