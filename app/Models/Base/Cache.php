<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Cache
 *
 * @property string $key
 * @property string $value
 * @property int $expiration
 *
 * @package App\Models\Base
 */
class Cache extends Model
{
    public const KEY        = 'key';
    public const VALUE      = 'value';
    public const EXPIRATION = 'expiration';
    protected $table        = 'cache';
    protected $primaryKey   = 'key';
    public $incrementing    = false;
    public $timestamps      = false;

    protected $casts = [
        self::EXPIRATION => 'int'
    ];

    protected $fillable = [
        self::VALUE,
        self::EXPIRATION
    ];
}
