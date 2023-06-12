<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Listening;
use App\Models\Speaking;
use Illuminate\Http\Request;

class SpeakingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $speaking = Speaking::latest()->paginate(20);
        return view('admin.speaking.index', [
            'speaking' => $speaking
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
        return view('admin.speaking.create', [
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
            'theme' => 'required',
            'example' => 'required',
        ]);

        Speaking::create($request->all());
        return redirect()->route('speakingIndex')->with('success', 'Speaking has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $speaking = Speaking::find($id);
        return view('admin.speaking.show', [
            'speaking' => $speaking,
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
        $speaking = Speaking::find($id);
        return view('admin.speaking.edit', [
            'speaking' => $speaking,
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
            'theme' => 'required',
            'example' => 'required',
        ]);
        $speaking = Speaking::find($id);
        $speaking->fill($request->post())->save();
        return redirect()->route('speakingIndex')->with('success','Speaking has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Speaking::where('id',$id)->delete();
        return redirect()->route('speakingIndex')->with('success','Speaking has been deleted successfully');
    }
}
