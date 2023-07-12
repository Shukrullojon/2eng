<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ListeningRepeat;
use Illuminate\Http\Request;

class ListeningRepeatController extends Controller
{
    public function get(Request $request)
    {
        $listening_repeat = ListeningRepeat::select("id", "day_id", "text", "video","audio")
            ->where('day_id', $request->day_id)
            ->first();
        return response()->json([
            'status' => true,
            'result' => [
                'listening_repeat' => $listening_repeat,
            ],
        ], 200);
    }
}
