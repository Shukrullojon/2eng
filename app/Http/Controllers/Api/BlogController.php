<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function get(Request $request){
        $blog = Blog::select("id","text","translate","grammer_focus")->where('day_id',$request->day_id)->first();
        return response()->json([
            'status' => true,
            'result' => [
                'blog' => $blog
            ],
        ], 200);
    }
}
