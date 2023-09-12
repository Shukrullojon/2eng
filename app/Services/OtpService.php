<?php

namespace App\Services;

use App\Models\Otp;
use Illuminate\Support\Facades\Hash;

class OtpService
{
    public static function otp($data){
        Otp::create([
            'user_id' => $data['user_id'],
            'code' => Hash::make('12345'),
            'attemp' => 0,
            'phone_name' => 'Samsung',
            'status' => 0,
        ]);
        return true;
    }
}
