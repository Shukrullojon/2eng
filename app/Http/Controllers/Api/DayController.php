<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Module;
use App\Models\User;
use App\Models\UserPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DayController extends Controller
{
    public function get(Request $request)
    {
        $user = User::where('token',$request->bearerToken())->first();
        $days = Day::where('module_id',$request->module_id)->get();
        $data = [];
        foreach ($days as $day){
            $point = UserPoint::where('model',Day::class)
                ->where('user_id',$user->id)
                ->where('model_id',$day->id)
                ->first();
            $data[]=[
                'id' => $day->id,
                'name' => $day->name,
                'module_id' => $day->module_id,
                'status' => $point->status ?? 0,
                'point' => $point->point ?? 0
            ];
        }
        return response()->json([
            'status' => true,
            'result' => [
                'days' => $data
            ],
        ], 200);
    }
}
