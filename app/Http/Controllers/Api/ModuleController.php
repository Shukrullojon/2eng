<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Module;
use App\Models\User;
use App\Models\UserPoint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ModuleController extends Controller
{
    public function get(Request $request){
        $user = User::where('token',$request->bearerToken())->first();
        $modules = Module::get();
        $data = [];
        foreach ($modules as $module){
            $point = UserPoint::where('model',Module::class)
                ->where('user_id',$user->id)
                ->where('model_id',$module->id)
                ->first();
            $data[]=[
                'id' => $module->id,
                'name' => $module->name,
                'image' => $module->image,
                'info' => $module->info,
                'status' => $point->status ?? 0,
                'point' => $point->point ?? 0
            ];
        }
        return response()->json([
            'status' => true,
            'result' => [
                'modules' => $data
            ],
        ], 200);
    }
}
