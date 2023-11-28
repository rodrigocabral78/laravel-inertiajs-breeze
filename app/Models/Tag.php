<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Models\Base\Tag as BaseTag;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Tag extends BaseTag
{
    use HasFactory;

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
}
