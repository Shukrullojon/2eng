<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;

class InfoController extends Controller
{
    public function get(Request $request){
        $infos = Info::select('id','title','description','image')->latest()->get();
        return response()->json([
            'status' => true,
            'result' => [
                'infos' => $infos
            ],
        ], 200);
    }
}
