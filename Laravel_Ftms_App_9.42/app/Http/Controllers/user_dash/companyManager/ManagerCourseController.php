<?php

namespace App\Http\Controllers\user_dash\companyManager;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ManagerCourseController extends Controller
{
    public function index()
    {
        $courses = Course::where('company_id', '=', Auth::user()->company_id)->get();

        $courses = $courses->load('supervisor');
        return response()->view('user_dash.companyManager.courses.index', compact(['courses']));
    }
    
    public function create(Request $request)
    {
        $users = User::where('company_id', Auth::user()->company_id)
            ->where('type', 'companySupervisor')
            ->get();
        return response()->view('user_dash.companyManager.courses.create', compact('users'));
    }
    public function store(Request $request)
    {
        $validator =
            $request->validate([
                'name' => 'required|string|min:3|max:20|',
                'description' => 'required|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'status' => 'nullable|string|in:on',
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
        } else {
        }

        $course->save();
        return redirect()->route('user_dash.cmCourses.index')->with('msg', 'Course Updated Successfully')->with('type', 'warning');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::findOrFail($id);
        $course = $course->load(['course_students', 'supervisor']);
        return response()->view('user_dash.companyManager.courses.show', compact('course'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $course = Course::find($id);
        $users = User::where('company_id', Auth::user()->company_id)
            ->where('type', 'companySupervisor')
            ->get();

        return response()->view('user_dash.companyManager.courses.edit', compact(['course', 'users']));
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
        $validator =
            $request->validate([
                'name' => 'required|string|min:3|max:20|',
                'description' => 'required|string',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'image' => 'nullable|image|mimes:jpg,png|max:1024',
                'supervisor_id' => 'required',
            ]);
        $course = Course::findOrFail($id);

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
        return redirect()->route('user_dash.cmCourses.index')->with('msg', 'Company Updated Successfully')->with('type', 'warning');

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
        if ($course->image != null) {
            Storage::delete($course->image);
        }
        return redirect()->route('user_dash.cmCourses.index')->with('msg', 'Company Deleted Successfully')->with('type', 'danger');
    }
}
