<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Part;
use App\Models\PartResult;
use App\Models\User;
use App\Models\Vocabulary;
use Illuminate\Http\Request;

class VocabularyController extends Controller
{
    public function get(Request $request)
    {
        $vocabulary = Vocabulary::select("id", "day_id", "word","translate","info", "audio")->where('day_id', $request->day_id)->first();
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
            ->where('day_id', $vocabulary->day_id)
            ->where('model', Vocabulary::class)
            ->where('model_id', $vocabulary->id)
            ->where('status', 1)
            ->inRandomOrder()
            ->limit(10)
            ->get();

        return response()->json([
            'status' => true,
            'result' => [
                'vocabulary' => $vocabulary,
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
