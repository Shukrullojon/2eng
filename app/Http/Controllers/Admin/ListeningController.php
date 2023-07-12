<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Listening;
use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ListeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listening = Listening::latest()->paginate(20);
        return view('admin.listening.index', [
            'listening' => $listening
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
        return view('admin.listening.create', [
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
        ]);

        if (isset($request->audio)){
            $filePath = 'audio/'.time().'.'.$request->audio->extension();
            $isFileUploaded = Storage::disk('my_files')->put($filePath, file_get_contents($request->audio));
        }
        Listening::create([
            'day_id' => $request->day_id,
            'text' => $request->text,
            'audio' => (isset($filePath)) ? $filePath : "",
        ]);
        return redirect()->route('listeningIndex')->with('success', 'Listening has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listening = Listening::find($id);
        $parts = Part::select()
            ->where('day_id',$listening->day_id)
            ->where('model',Listening::class)
            ->where('model_id',$listening->id)
            ->get();
        return view('admin.listening.show', [
            'listening' => $listening,
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
        $listening = Listening::find($id);
        Part::create([
            'day_id' => $listening->day_id,
            'model' => Listening::class,
            'model_id' => $listening->id,
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'answer' => $request->answer,
            'status' => $request->status,
        ]);
        return redirect()->route('listeningShow',$listening->id)->with('success', 'Test has been created successfully.');
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
        $listening = Listening::find($id);
        return view('admin.listening.edit', [
            'listening' => $listening,
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
        ]);

        $listening = Listening::find($id);
        if (isset($request->audio)){
            $filePath = 'audio/'.time().'.'.$request->audio->extension();
            $isFileUploaded = Storage::disk('my_files')->put($filePath, file_get_contents($request->audio));
        }
        $listening->update([
            'day_id' => $request->day_id,
            'text' => $request->text,
            'audio' => (isset($filePath)) ? $filePath :  $listening->audio,
        ]);
        return redirect()->route('listeningIndex')->with('success', 'Listening has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Listening::where('id', $id)->delete();
        return redirect()->route('listeningIndex')->with('success', 'Listening has been deleted successfully');
    }
}
