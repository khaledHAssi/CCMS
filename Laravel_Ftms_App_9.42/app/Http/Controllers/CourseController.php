<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::all();
        $data = $courses->load('company','User');
        return response()->view('admin.courses.index',compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $users = DB::select('SELECT * FROM `users` WHERE `type` = "companySupervisor"');
        $companies = DB::select('SELECT * FROM `companies`');
        return response()->view('admin.courses.create',compact(['users','companies']));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator =
        $request->validate([
             'name' => 'required|string|min:3|max:20|',
             'description' => 'required|string',
             'start_date' => 'required|date',
             'end_date' => 'required|date',
             'company_id' => 'required',
             'supervisor_id' => 'required',
             'image' => 'nullable|image|mimes:jpg,png|max:1024',

        ]);
        $course = new Course;

        $course->company_id = $request->input('company_id');
        $course->name = $request->input('name');


        $course->description = $request->input('description');
        $course->start_date = $request->input('start_date');
        $course->end_date = $request->input('end_date');
        $course->supervisor_id = $request->input('supervisor_id');


        if ($request->hasFile('course_image')) {
            $CourseImg = $request->file('course_image');
            $imageName = time() . '_image' . $course->name . '.' . $CourseImg->getClientOriginalExtension();
            $CourseImg->storePubliclyAs('courses', $imageName, ['disk' => 'public']);
            $course->image = 'courses/' . $imageName;
        }

            $course->save();
        return redirect()->route('admin.courses.index')->with('msg', 'Company Updated Successfully')->with('type', 'warning');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $course = Course::find($id);
        // dd($course->supervisor_id);
        $users = DB::select('SELECT `id`, `name` FROM `users` WHERE `type` = "companySupervisor"');
        $companies = DB::select('SELECT `id`, `name` FROM `companies` ');
        return response()->view('admin.courses.edit',compact(['course','users','companies']));}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator =
        $request->validate([
             'name' => 'required|string|min:3|max:20|',
             'description' => 'required|string',
             'start_date' => 'required|date',
             'end_date' => 'required|date',
             'image' => 'nullable|image|mimes:jpg,png|max:1024',
             'company_id' => 'required',
             'supervisor_id' => 'required',

        ]);
        $course = Course::findOrFail($id);

        $course->company_id = $request->input('company_id');
        $course->supervisor_id = $request->input('supervisor_id');
        $course->name = $request->input('name');


        $course->description = $request->input('description');
        $course->start_date = $request->input('start_date');
        $course->end_date = $request->input('end_date');


        if ($request->hasFile('course_image')) {
            if ($course->image != null) {
                Storage::delete($course->image);
            }
            $CourseImg = $request->file('course_image');
            $imageName = time() . '_image' . $course->name . '.' . $CourseImg->getClientOriginalExtension();
            $CourseImg->storePubliclyAs('courses', $imageName, ['disk' => 'public']);
            $course->image = 'courses/' . $imageName;
        }

            $course->save();
        return redirect()->route('admin.courses.index')->with('msg', 'Company Updated Successfully')->with('type', 'warning');

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $course = Course::findOrFail($id);
        $course->delete();
        if ($course->image !=null) {
            Storage::delete($course->image);
        }
        return redirect()->route('admin.courses.index')->with('msg', 'Company Deleted Successfully')->with('type', 'danger');

    }
}
