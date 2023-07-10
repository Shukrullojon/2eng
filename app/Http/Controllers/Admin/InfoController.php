<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $infos = Info::latest()->paginate(20);
        return view('admin.info.index', [
            'infos' => $infos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.info.create');
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

        ]);
        if (isset($request->image)){
            $filePath = 'images/'.time().'.'.$request->image->extension();
            $isFileUploaded = Storage::disk('my_files')->put($filePath, file_get_contents($request->image));
        }
        Info::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => (isset($filePath)) ? $filePath : "",
        ]);
        return redirect()->route('infoIndex')->with('success', 'Info has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $info = Info::find($id);
        return view('admin.info.show', [
            'info' => $info,
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
        $info = Info::find($id);
        return view('admin.info.edit', [
            'info' => $info,
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
        ]);

        $info = Info::find($id);
        if (isset($request->image)){
            $filePath = 'images/'.time().'.'.$request->image->extension();
            $isFileUploaded = Storage::disk('my_files')->put($filePath, file_get_contents($request->image));
        }
        $info->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => (isset($filePath)) ? $filePath : $info->image,
        ]);
        return redirect()->route('infoIndex')->with('success', 'Info Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Info::where('id', $id)->delete();
        return redirect()->route('infoIndex')->with('success', 'Info has been deleted successfully');
    }
}
