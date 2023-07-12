<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Listening;
use App\Models\Part;
use App\Models\Vocabulary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VocabularyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vocabularies = Vocabulary::latest()->paginate(20);
        return view('admin.vocabulary.index', [
            'vocabularies' => $vocabularies
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $days = Day::latest()->get();
        return view('admin.vocabulary.create', [
            'days' => $days,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'day_id' => 'required|exists:days,id',
            'word' => 'required',
            'translate' => 'required',
            'info' => 'required',
            'audio' => 'required',
        ]);

        if (isset($request->audio)){
            $filePath = 'audio/'.time().'.'.$request->audio->extension();
            Storage::disk('my_files')->put($filePath, file_get_contents($request->audio));
        }
        Vocabulary::create([
            'day_id' => $request->day_id,
            'word' => $request->word,
            'translate' => $request->translate,
            'info' => $request->info,
            'audio' => (isset($filePath)) ? $filePath : "",
        ]);
        return redirect()->route('vocabularyIndex')->with('success', 'Vocabulary has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $vocabulary = Vocabulary::find($id);
        $parts = Part::select()
            ->where('day_id',$vocabulary->day_id)
            ->where('model',Vocabulary::class)
            ->where('model_id',$vocabulary->id)
            ->get();
        return view('admin.vocabulary.show', [
            'vocabulary' => $vocabulary,
            'parts' => $parts,
        ]);
    }

    public function partstore(Request $request,$id){
        $request->validate([
            'question' => 'required',
            'option_a' => 'required',
            'option_b' => 'required',
            'option_c' => 'required',
            'option_d' => 'required',
            'answer' => 'required',
            'status' => 'required',
        ]);
        $vocabulary = Vocabulary::find($id);
        Part::create([
            'day_id' => $vocabulary->day_id,
            'model' => Vocabulary::class,
            'model_id' => $vocabulary->id,
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'answer' => $request->answer,
            'status' => $request->status,
        ]);
        return redirect()->route('vocabularyShow',$vocabulary->id)->with('success', 'Test has been created successfully.');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $days = Day::latest()->get();
        $vocabulary = Vocabulary::find($id);
        return view('admin.vocabulary.edit', [
            'vocabulary' => $vocabulary,
            'days' => $days,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'day_id' => 'required|exists:days,id',
            'word' => 'required',
            'translate' => 'required',
            'info' => 'required',
            'audio' => 'required',
        ]);

        $vocabulary = Vocabulary::find($id);
        if (isset($request->audio)){
            $filePath = 'audio/'.time().'.'.$request->audio->extension();
            Storage::disk('my_files')->put($filePath, file_get_contents($request->audio));
        }
        $vocabulary->update([
            'day_id' => $request->day_id,
            'word' => $request->word,
            'translate' => $request->translate,
            'info' => $request->info,
            'audio' => (isset($filePath)) ? $filePath : $vocabulary->audio,
        ]);
        return redirect()->route('vocabularyIndex')->with('success', 'Vocabulary has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Vocabulary::where('id', $id)->delete();
        return redirect()->route('vocabularyIndex')->with('success', 'Vocabulary has been deleted successfully');
    }
}
