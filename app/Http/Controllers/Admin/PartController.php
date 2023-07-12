<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grammer;
use App\Models\Listening;
use App\Models\Part;
use App\Models\Vocabulary;
use Illuminate\Http\Request;

class PartController extends Controller
{
    public function edit($id){
        return view('admin.part.edit',[
            'part' => Part::find($id),
        ]);
    }

    public function update(Request $request,$id){
        $part = Part::find($id);
        $part->update([
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'answer' => $request->answer,
            'status' => $request->status,
        ]);
        if (Grammer::class == $part->model)
            return redirect()->route('grammerShow',$part->model_id)->with('success', 'Test has been updated successfully.');
        if (Listening::class == $part->model)
            return redirect()->route('listeningShow',$part->model_id)->with('success', 'Test has been updated successfully.');
        if (Vocabulary::class == $part->model)
            return redirect()->route('vocabularyShow',$part->model_id)->with('success', 'Test has been updated successfully.');
    }

    public function delete($id){
        $part = Part::find($id);
        $model_id = $part->model_id;
        $model = $part->model;
        $part->delete();
        if (Grammer::class == $model)
            return redirect()->route('grammerShow',$model_id)->with('success', 'Test has been deleted successfully.');
        if (Listening::class == $model)
            return redirect()->route('listeningShow',$model_id)->with('success', 'Test has been deleted successfully.');
        if (Vocabulary::class == $model)
            return redirect()->route('vocabularyShow',$model_id)->with('success', 'Test has been deleted successfully.');
    }
}
