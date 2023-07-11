<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Day;
use App\Models\Grammer;
use App\Models\Part;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GrammerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $grammers = Grammer::latest()->paginate(20);
        return view('admin.grammer.index', [
            'grammers' => $grammers
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
        return view('admin.grammer.create', [
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

        if (isset($request->video)){
            $filePath = 'videos/'.time().'.'.$request->video->extension();
            $isFileUploaded = Storage::disk('my_files')->put($filePath, file_get_contents($request->video));
        }
        Grammer::create([
           'day_id' => $request->day_id,
           'text' => $request->text,
           'video' => (isset($filePath)) ? $filePath : "",
        ]);
        return redirect()->route('grammerIndex')->with('success', 'Grammer has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $grammer = Grammer::find($id);
        $parts = Part::select()
            ->where('day_id',$grammer->day_id)
            ->where('model',Grammer::class)
            ->where('model_id',$grammer->id)
            ->get();
        return view('admin.grammer.show', [
            'grammer' => $grammer,
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
        $grammer = Grammer::find($id);
        Part::create([
            'day_id' => $grammer->day_id,
            'model' => Grammer::class,
            'model_id' => $grammer->id,
            'question' => $request->question,
            'option_a' => $request->option_a,
            'option_b' => $request->option_b,
            'option_c' => $request->option_c,
            'option_d' => $request->option_d,
            'answer' => $request->answer,
            'status' => $request->status,
        ]);
        return redirect()->route('grammerShow',$grammer->id)->with('success', 'Test has been created successfully.');
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
        $grammer = Grammer::find($id);
        return view('admin.grammer.edit', [
            'grammer' => $grammer,
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

        $grammer = Grammer::find($id);
        if (isset($request->video)){
            $filePath = 'videos/'.time().'.'.$request->video->extension();
            $isFileUploaded = Storage::disk('my_files')->put($filePath, file_get_contents($request->video));
        }
        $grammer->update([
            'day_id' => $request->day_id,
            'text' => $request->text,
            'video' => (isset($filePath)) ? $filePath :  $grammer->video,
        ]);
        return redirect()->route('grammerIndex')->with('success', 'Grammer Has Been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Grammer::where('id', $id)->delete();
        return redirect()->route('grammerIndex')->with('success', 'Grammer has been deleted successfully');
    }
}
