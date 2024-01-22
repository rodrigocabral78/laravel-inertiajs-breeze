<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models\Base;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string|null $api_token
 * @property bool $is_admin
 * @property bool $is_active
 * @property int|null $created_by
 * @property int|null $updated_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 *
 * @package App\Models\Base
 */
class User extends Model
{
    use SoftDeletes;
    const ID = 'id';
    const NAME = 'name';
    const EMAIL = 'email';
    const PASSWORD = 'password';
    const API_TOKEN = 'api_token';
    const IS_ADMIN = 'is_admin';
    const IS_ACTIVE = 'is_active';
    const CREATED_BY = 'created_by';
    const UPDATED_BY = 'updated_by';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    const DELETED_AT = 'deleted_at';

    protected $casts = [
        self::ID => 'int',
        self::IS_ADMIN => 'bool',
        self::IS_ACTIVE => 'bool',
        self::CREATED_BY => 'int',
        self::UPDATED_BY => 'int',
        self::CREATED_AT => 'datetime',
        self::UPDATED_AT => 'datetime'
    ];

    protected $fillable = [
        self::NAME,
        self::EMAIL,
        self::PASSWORD,
        self::API_TOKEN,
        self::IS_ADMIN,
        self::IS_ACTIVE,
        self::CREATED_BY,
        self::UPDATED_BY
    ];
}
