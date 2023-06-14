<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Day;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class DayController extends Controller
{
    public function get(Request $request)
    {
        $validator = Validator::make($request->only('token'), [
            'token' => ['required', 'string', 'exists:users,token'],
        ]);
        if ($validator->fails())
            return response()->json([
                'status' => false,
                'error' => $validator->errors()
            ], 400);

        $days = Day::select('days.name as name','results.is_done as is_done')
            ->leftJoin('results','days.id','=','results.day_id')
            ->get();
        return response()->json([
            'status' => true,
            'result' => [
                'days' => $days
            ],
        ], 200);
    }
}
