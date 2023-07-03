<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachers = Teacher::latest()->paginate(20);
        return view('admin.teacher.index', [
            'teachers' => $teachers
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.teacher.create', [

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
            'name' => 'required',
        ]);
        if (isset($request->image)){
            $filePath = 'images/'.time().'.'.$request->image->extension();
            Storage::disk('my_files')->put($filePath, file_get_contents($request->image));
        }
        Teacher::create([
            'name' => $request->name,
            'image' => (isset($filePath)) ? $filePath : "",
            'info' => $request->info,
        ]);
        return redirect()->route('teacherIndex')->with('success', 'Teacher has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $teacher = Teacher::find($id);
        return view('admin.teacher.show', [
            'teacher' => $teacher,
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
        $teacher = Teacher::find($id);
        return view('admin.teacher.edit', [
            'teacher' => $teacher
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
            'name' => 'required',
        ]);

        $teacher = Teacher::find($id);
        if (isset($request->image)){
            $filePath = 'images/'.time().'.'.$request->image->extension();
            Storage::disk('my_files')->put($filePath, file_get_contents($request->image));
        }
        $teacher->update([
            'name' => $request->name,
            'info' => $request->info,
            'image' => (isset($filePath)) ? $filePath :  $teacher->image,
        ]);
        return redirect()->route('teacherIndex')->with('success', 'Teacher has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Teacher::where('id', $id)->delete();
        return redirect()->route('teacherIndex')->with('success', 'Teacher has been deleted successfully');
    }
}
