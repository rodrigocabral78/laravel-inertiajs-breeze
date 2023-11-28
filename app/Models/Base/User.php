<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AuditLog;
use App\Models\Post;
use App\Models\Session;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 *
 * @property int $id
 * @property string|null $uuid
 * @property string $name
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $api_token
 * @property string|null $remember_token
 * @property bool $is_admin
 * @property bool $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @property Collection|AuditLog[] $audit_logs
 * @property Collection|Post[] $posts
 * @property Collection|Session[] $sessions
 *
 * @package App\Models\Base
 */
class User extends Model
{
    use SoftDeletes;
    public const ID                = 'id';
    public const UUID              = 'uuid';
    public const NAME              = 'name';
    public const EMAIL             = 'email';
    public const EMAIL_VERIFIED_AT = 'email_verified_at';
    public const PASSWORD          = 'password';
    public const API_TOKEN         = 'api_token';
    public const REMEMBER_TOKEN    = 'remember_token';
    public const IS_ADMIN          = 'is_admin';
    public const IS_ACTIVE         = 'is_active';
    public const CREATED_BY        = 'created_by';
    public const UPDATED_BY        = 'updated_by';
    public const CREATED_AT        = 'created_at';
    public const UPDATED_AT        = 'updated_at';
    public const DELETED_AT        = 'deleted_at';

    protected $casts = [
        self::ID                => 'int',
        self::EMAIL_VERIFIED_AT => 'datetime',
        self::IS_ADMIN          => 'bool',
        self::IS_ACTIVE         => 'bool',
        self::CREATED_BY        => 'int',
        self::UPDATED_BY        => 'int',
        self::CREATED_AT        => 'datetime',
        self::UPDATED_AT        => 'datetime'
    ];

    protected $fillable = [
        self::UUID,
        self::NAME,
        self::EMAIL,
        self::EMAIL_VERIFIED_AT,
        self::PASSWORD,
        self::API_TOKEN,
        self::REMEMBER_TOKEN,
        self::IS_ADMIN,
        self::IS_ACTIVE,
        self::CREATED_BY,
        self::UPDATED_BY
    ];

    public function audit_logs(): HasMany
    {
        return $this->hasMany(AuditLog::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }
}
