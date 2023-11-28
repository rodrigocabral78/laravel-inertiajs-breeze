<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use App\Models\AuditLog;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Session
 *
 * @property string $id
 * @property int|null $user_id
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property string $payload
 * @property int $last_activity
 *
 * @property User|null $user
 * @property Collection|AuditLog[] $audit_logs
 *
 * @package App\Models\Base
 */
class Session extends Model
{
    public const ID            = 'id';
    public const USER_ID       = 'user_id';
    public const IP_ADDRESS    = 'ip_address';
    public const USER_AGENT    = 'user_agent';
    public const PAYLOAD       = 'payload';
    public const LAST_ACTIVITY = 'last_activity';
    public $incrementing       = false;
    public $timestamps         = false;

    protected $casts = [
        self::USER_ID       => 'int',
        self::LAST_ACTIVITY => 'int'
    ];

    protected $fillable = [
        self::USER_ID,
        self::IP_ADDRESS,
        self::USER_AGENT,
        self::PAYLOAD,
        self::LAST_ACTIVITY
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function auditLogs(): HasMany
    {
        return $this->hasMany(AuditLog::class);
    }
}
