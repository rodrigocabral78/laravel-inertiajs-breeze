<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class Authenticate
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
 * @package App\Models
 */
class Authenticate extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
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

    /**
     * The table users for the model.
     */
    protected $table = 'users';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = self::ID;

    /**
     * Function booted
     *
     * @return void
     */
    protected static function booted(): void
    {
        static::creating(
            function (User $user) {
                $user->uuid       = (string) Str::uuid();
                $user->created_by = (int) Auth::id() ?: 1;
                $user->updated_by = (int) Auth::id() ?: 1;
            }
        );
        static::updating(
            function (User $user) {
                $user->updated_by = (int) Auth::id();
            }
        );
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        self::ID                => 'int',
        self::EMAIL_VERIFIED_AT => 'datetime',
        self::PASSWORD          => 'hashed',
        self::IS_ADMIN          => 'bool',
        self::IS_ACTIVE         => 'bool',
        self::CREATED_BY        => 'int',
        self::UPDATED_BY        => 'int',
        self::CREATED_AT        => 'datetime:Y-m-d H:i:s',
        self::UPDATED_AT        => 'datetime:Y-m-d H:i:s',
        self::DELETED_AT        => 'datetime:Y-m-d H:i:s',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        self::PASSWORD,
        self::REMEMBER_TOKEN,
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        self::NAME,
        self::EMAIL,
        self::PASSWORD,
        self::API_TOKEN,
        self::IS_ADMIN,
        self::IS_ACTIVE,
    ];

    /**
     * Interact with the user's password.
     */
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => Hash::make($value),
        );
    }

    public function isAdmin()
    {
        return true === $this->is_admin;
    }

    public function isActive()
    {
        return true === $this->is_active;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', '=', 1);
    }

    public function scopeAdmin($query)
    {
        return $query->where('is_admin', '=', 1);
    }

    public function auditLogs(): HasMany
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
