<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CacheLock
 *
 * @property string $key
 * @property string $owner
 * @property int $expiration
 *
 * @package App\Models\Base
 */
class CacheLock extends Model
{
    public const KEY        = 'key';
    public const OWNER      = 'owner';
    public const EXPIRATION = 'expiration';
    protected $primaryKey   = 'key';
    public $incrementing    = false;
    public $timestamps      = false;

    protected $casts = [
        self::EXPIRATION => 'int'
    ];

    protected $fillable = [
        self::OWNER,
        self::EXPIRATION
    ];
}
