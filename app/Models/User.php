<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;

/**
 * Class User
 *
 * @property int $id
 * @property string|null $uuid
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property bool $is_admin
 * @property bool $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Collection|Post[] $posts
 * @property Collection|Session[] $sessions
 *
 * @package App\Models
 */
class User extends Authenticate
{
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
