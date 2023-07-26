<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $user_id
 * @property string $code
 * @property integer $attemp
 * @property string $phone_name
 * @property integer $status
 */

class Otp extends Model
{
    use HasFactory;

    protected $table = 'otps';

    protected $guarded = [];
}
