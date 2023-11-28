<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Job
 *
 * @property int $id
 * @property string $queue
 * @property string $payload
 * @property int $attempts
 * @property int|null $reserved_at
 * @property int $available_at
 * @property int $created_at
 *
 * @package App\Models\Base
 */
class Job extends Model
{
    public const ID           = 'id';
    public const QUEUE        = 'queue';
    public const PAYLOAD      = 'payload';
    public const ATTEMPTS     = 'attempts';
    public const RESERVED_AT  = 'reserved_at';
    public const AVAILABLE_AT = 'available_at';
    public const CREATED_AT   = 'created_at';
    public $timestamps        = false;

    protected $casts = [
        self::ID           => 'int',
        self::ATTEMPTS     => 'int',
        self::RESERVED_AT  => 'int',
        self::AVAILABLE_AT => 'int',
        self::CREATED_AT   => 'int'
    ];

    protected $fillable = [
        self::QUEUE,
        self::PAYLOAD,
        self::ATTEMPTS,
        self::RESERVED_AT,
        self::AVAILABLE_AT
    ];
}
