<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Grammer;
use App\Models\Part;
use App\Models\PartResult;
use App\Models\User;
use Illuminate\Http\Request;

class GrammerController extends Controller
{
    public function get(Request $request)
    {
        $grammer = Grammer::select("id", "day_id", "text", "video")->where('day_id', $request->day_id)->first();
        $parts = Part::select(
            "id",
            "question",
            "option_a",
            "option_b",
            "option_c",
            "option_d",
            "answer"
        )
            ->with('PartResult')
            ->where('day_id', $grammer->day_id)
            ->where('model', Grammer::class)
            ->where('model_id', $grammer->id)
            ->where('status', 1)
            ->inRandomOrder()
            ->limit(10)
            ->get();

        return response()->json([
            'status' => true,
            'result' => [
                'grammer' => $grammer,
                'parts' => $parts,
            ],
        ], 200);
    }

    public function result(Request $request)
    {
        $user = User::where('token',$request->header('token'))->first();
        foreach ($request['results'] as $result){
            $user = PartResult::updateOrCreate(
                [
                    'part_id' => $result['part_id'],
                    'user_id' => $user->id,
                ],
                [
                    'answer' => $result['answer']
                ]
            );
        }
        return response()->json([
            'status' => true,
            'result' => [
                'messsage' => [
                    'uz' => "Natijalaringiz qabul qilindi!!!"
                ],
            ],
        ], 200);
    }
}
