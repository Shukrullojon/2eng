<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function get(Request $request){
        $teachers = Teacher::select('id','name','image','info')->latest()->get();
        return response()->json([
            'status' => true,
            'result' => [
                'teachers' => $teachers
            ],
        ], 200);
    }
}
