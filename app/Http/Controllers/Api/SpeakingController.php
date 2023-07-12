<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Speaking;
use Illuminate\Http\Request;

class SpeakingController extends Controller
{
    public function get(Request $request)
    {
        $speaking = Speaking::select("id", "day_id", "theme", "example")
            ->where('day_id', $request->day_id)
            ->first();
        return response()->json([
            'status' => true,
            'result' => [
                'speaking' => $speaking,
            ],
        ], 200);
    }
}
