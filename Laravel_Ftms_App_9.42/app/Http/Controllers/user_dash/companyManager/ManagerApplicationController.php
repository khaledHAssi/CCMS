<?php

namespace App\Http\Controllers\user_dash\companyManager;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Company;
use App\Models\Course_student;
use Illuminate\Http\Request;

class ManagerApplicationController extends Controller
{

    public function index()
    {
        $companyId = Company::pluck('id')->first();

        $applications = Application::join('companies', 'applications.company_id', '=', 'companies.id')
            ->where('companies.id', $companyId)
            ->select('applications.*')
            ->get();
        $applications = $applications->load('user', 'company', 'course');

        return view('user_dash.companyManager.applications.index', compact('applications'));
    }


    public function application_accept(Request $request)
    {
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
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function create()
    {
        //
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
    }
}
