<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\Session;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * Class AuditLog
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $session_id
 * @property string|null $session_name
 * @property string|null $ip
 * @property string|null $agent
 * @property string|null $browser
 * @property Carbon|null $login_at
 * @property Carbon|null $logout_at
 * @property bool $login_successfully
 * @property array|null $location
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Session|null $session
 * @property User|null $user
 *
 * @package App\Models\Base
 */
class AuditLog extends Model
{
    public const ID                 = 'id';
    public const USER_ID            = 'user_id';
    public const SESSION_ID         = 'session_id';
    public const SESSION_NAME       = 'session_name';
    public const IP                 = 'ip';
    public const AGENT              = 'agent';
    public const BROWSER            = 'browser';
    public const LOGIN_AT           = 'login_at';
    public const LOGOUT_AT          = 'logout_at';
    public const LOGIN_SUCCESSFULLY = 'login_successfully';
    public const LOCATION           = 'location';
    public const CREATED_AT         = 'created_at';
    public const UPDATED_AT         = 'updated_at';

    protected $casts = [
        self::ID                 => 'int',
        self::USER_ID            => 'int',
        self::LOGIN_AT           => 'datetime',
        self::LOGOUT_AT          => 'datetime',
        self::LOGIN_SUCCESSFULLY => 'bool',
        self::LOCATION           => 'json',
        self::CREATED_AT         => 'datetime',
        self::UPDATED_AT         => 'datetime'
    ];

    protected $fillable = [
        self::USER_ID,
        self::SESSION_ID,
        self::SESSION_NAME,
        self::IP,
        self::AGENT,
        self::BROWSER,
        self::LOGIN_AT,
        self::LOGOUT_AT,
        self::LOGIN_SUCCESSFULLY,
        self::LOCATION
    ];

    public function session(): BelongsTo
    {
        return $this->belongsTo(Session::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
