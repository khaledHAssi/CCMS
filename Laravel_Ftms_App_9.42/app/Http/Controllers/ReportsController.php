<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Course_student;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class ReportsController extends Controller
{

    public function contacts()
    {
        $contacts = Report::where('type', '=', 'contact')->get();
        $contacts = $contacts->load('user');
        return response()->view('admin.reports.contacts', compact('contacts'));
    }
    public function doctors()
    {
        $doctors = Report::where('type', '=', 'doctor')->get();
        $doctors = $doctors->load('user');
        return response()->view('admin.reports.doctors', compact('doctors'));
    }
    public function companyManager()
    {
        $companyManagers = Report::where('type', '=', 'companyManager')->get();
        $companyManagers = $companyManagers->load('user');
        return response()->view('admin.reports.companyManagers', compact('companyManagers'));
    }


    public function application_accept(Request $request)
    {
        // dd($request->all());
        $saved = User::create([
            'user_id' => $request->user_id,
            'name' => $request->name,
            'email' => $request->email,
            // 'email' => $request->email,
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
