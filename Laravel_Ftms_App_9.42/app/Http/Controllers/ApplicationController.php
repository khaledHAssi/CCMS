<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Course_student;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{

    public function index()
    {
        //

        $applications = Application::all();
        return response()->view('admin.applications.index', compact('applications'));
    }


    public function application_accept(Request $request)
    {
        // dd($request->all());
        $saved = Course_student::create([
            'course_id' => $request->course_id,
            'user_id' => $request->user_id,
            'application_id' => $request->application_id
        ]);
        if ($saved) {
            $application = Application::findOrFail($request->application_id);
            $application->status = 1;
            $application->save();
        } else {
            return redirect()->back()->with(['msg' => 'student accepted is failed.', 'status' => 'error']);
        }

        return redirect()->back()->with(['msg' => 'The student was accepted to the course.', 'status' => 'success']);
    }

    
    public function application_reject($id)
    {
        $application = Application::findOrFail($id);
        $application->status = 0;
        $saved = $application->save();
        if ($saved) {
            return redirect()->back()->with(['msg' => 'The student was rejected from the course.', 'status' => 'success']);
        } else {
            return redirect()->back()->with(['msg' => 'student rejected is failed.', 'status' => 'error']);
        }
    }
}
