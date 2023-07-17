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
        $applications = $applications->load('user', 'company', 'course');

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


    public function application_restore($id)
    {
        $application = Application::findOrFail($id);
        $app_status = $application->status;
        $application->status = null;
        $saved = $application->save();

        if ($saved & $app_status === 1) {
            $courseStudent = Course_student::where('application_id', $id)->firstOrFail();
            $deleted = $courseStudent->delete();
            if ($deleted) {
                return redirect()->back()->with(['msg' => 'The student was restored from the applications accepted.', 'status' => 'success']);
            }
        }


        if ($saved) {
            return redirect()->back()->with(['msg' => 'The student was restored from the applications rejected.', 'status' => 'success']);
        } else {
            return redirect()->back()->with(['msg' => 'student restored is failed.', 'status' => 'error']);
        }
    }
}
