<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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

    public function details(Request $request){
        $validator = Validator::make($request->all(), [
            'id' => 'required|integer|exists:teachers,id',
        ]);
        if ($validator->fails()) {
            $errorCode = $validator->errors()->get('id');
            return response()->json([
                'status' => false,
                'result' => [
                    'message' => [
                        'uz' => (isset($errorCode[0])) ? $errorCode[0] : '',
                        'ru' => (isset($errorCode[0])) ? $errorCode[0] : '',
                        'en' => (isset($errorCode[0])) ? $errorCode[0] : '',
                    ],
                ],
            ], 203);
        }
        $teacher = Teacher::find($request->id);
        return response()->json([
            'status' => true,
            'result' => [
                'teacher' => $teacher
            ],
        ], 200);
    }
}
