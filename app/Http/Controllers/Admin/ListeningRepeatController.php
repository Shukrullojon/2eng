<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\ListeningRepeat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ListeningRepeatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listening = ListeningRepeat::latest()->paginate(20);
        return view('admin.listening-repeat.index', [
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
        return view('admin.listening-repeat.create', [
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
            $filePathAudio = 'audio/'.time().'.'.$request->audio->extension();
            Storage::disk('my_files')->put($filePathAudio, file_get_contents($request->audio));
        }
        if (isset($request->video)){
            $filePathVideo = 'video/'.time().rand(1000,9999).'.'.$request->video->extension();
            Storage::disk('my_files')->put($filePathVideo, file_get_contents($request->video));
        }

        ListeningRepeat::create([
            'day_id' => $request->day_id,
            'text' => $request->text,
            'audio' => (isset($filePathAudio)) ? $filePathAudio : "",
            'video' => (isset($filePathVideo)) ? $filePathVideo : "",
        ]);
        return redirect()->route('listeningRepeatIndex')->with('success', 'Listening Repeat has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $listening = ListeningRepeat::find($id);
        return view('admin.listening-repeat.show', [
            'listening' => $listening,
        ]);
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
        $listening = ListeningRepeat::find($id);
        return view('admin.listening-repeat.edit', [
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

        $listening = ListeningRepeat::find($id);
        if (isset($request->audio)){
            $filePathAudio = 'audio/'.time().rand(1000,9999).'.'.$request->audio->extension();
            Storage::disk('my_files')->put($filePathAudio, file_get_contents($request->audio));
        }
        if (isset($request->video)){
            $filePathVideo = 'video/'.time().'.'.$request->video->extension();
            Storage::disk('my_files')->put($filePathVideo, file_get_contents($request->video));
        }
        $listening->update([
            'day_id' => $request->day_id,
            'text' => $request->text,
            'audio' => (isset($filePathAudio)) ? $filePathAudio :  $listening->audio,
            'video' => (isset($filePathVideo)) ? $filePathVideo :  $listening->video,
        ]);
        return redirect()->route('listeningRepeatIndex')->with('success', 'Listening repeat has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        ListeningRepeat::where('id', $id)->delete();
        return redirect()->route('listeningRepeatIndex')->with('success', 'Listening Repeat has been deleted successfully');
    }
}
