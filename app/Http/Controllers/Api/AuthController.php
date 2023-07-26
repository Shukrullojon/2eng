<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Otp;
use App\Models\User;
use App\Services\OtpService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function phone(Request $request)
    {
        $user = User::where('phone',$request->phone)->first();
        $phone = (string)$request->phone;
        if (empty($user)){
            $user = User::create([
                'phone' => $phone,
                'token' => Str::uuid(),
            ]);
        }else{
            $user->update([
                'token' => Str::uuid()
            ]);
        }

        $otp = OtpService::otp([
            'user_id' => $user->id,
            'phone' => $phone,
        ]);
        if ($otp){
            return response()->json([
                'status' => true,
                'result' => [
                    'token' => $user->token,
                    'message' => [
                        'uz' => "Tasdiqlash kodini kiriting!!!",
                    ],
                ],
            ], 200);
        }else{
            return response()->json([
                'status' => false,
                'result' => [
                    'message' => [
                        'uz' => "Sms yuborishda xatolik!!!",
                    ],
                ],
            ], 200);
        }
    }

    public function code(Request $request){
        $validator = Validator::make($request->only('token'), [
            'token' => ['required', 'string', 'exists:users,token'],
            'code' => ['required', 'string'],
        ]);
        $user = User::where('token',$request->token)->first();
        $otp = Otp::where('user_id',$user->id)
            ->where('status',0)
            ->where('attemp','<',3)
            ->where('created_at',"<",date("Y-m-d H:i:s", strtotime("-1 minute")))
            ->latest()
            ->first();
        if (!empty($otp)){
            if (Hash::check($request->code,$otp->code)){
                $user->update([
                    'name' => "NO NAME",
                ]);
                return response()->json([
                    'status' => true,
                    'result' => null,
                ], 200);
            }else{
                $otp->update([
                    'attemp' => $otp->attemp + 1
                ]);
                return response()->json([
                    'status' => false,
                    'result' => [
                        'message' => [
                            'uz' => "Kodni to'g'ri kiriting!!!",
                        ],
                    ],
                ], 403);
            }
        }else{
            return response()->json([
                'status' => false,
                'result' => [
                    'is_return' => true,
                ],
            ], 401);
        }
    }
}
