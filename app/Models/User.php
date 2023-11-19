<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use SoftDeletes;

    /**
     * Undocumented function.
     *
     * @return void
     */
    protected static function booted()
    {
        static::creating(
            function (User $user) {
                $user->uuid = (string) Str::uuid();
                $user->created_by ? 1 : Auth::id();
                $user->updated_by ? 1 : Auth::id();
            }
        );
        static::updating(
            function (User $user) {
                $user->updated_by = Auth::id();
            }
        );
    }

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * The table users for the model.
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'is_active',
        // 'created_by',
        // 'updated_by',
        // 'created_at',
        // 'updated_at',
        // 'deleted_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
        'created_at'        => 'datetime:Y-m-d H:i:s',
        'updated_at'        => 'datetime:Y-m-d H:i:s',
        'deleted_at'        => 'datetime:Y-m-d H:i:s',
        'is_admin'          => 'boolean',
        'is_active'         => 'boolean',
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

    /**
     * Returns true if user is administrator.
     *
     * @return $this
     */
    public function isAdmin()
    {
        return true === $this->is_admin;
    }

    /**
     * Returns true if user is active.
     *
     * @return $this
     */
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
}
