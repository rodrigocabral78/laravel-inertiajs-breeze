<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Models\Base\Session as BaseSession;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Session extends BaseSession
{
    use HasFactory;

    protected $table     = 'sessions';
}
