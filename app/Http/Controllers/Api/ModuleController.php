<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function get(Request $request){
        $modules = Module::select('id','name','image','info')->get();
        return response()->json([
            'status' => true,
            'result' => [
                'modules' => $modules
            ],
        ], 200);
    }
}
