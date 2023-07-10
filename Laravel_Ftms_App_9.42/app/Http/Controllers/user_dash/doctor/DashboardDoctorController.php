<?php

namespace App\Http\Controllers\user_dash\doctor;

use App\Http\Controllers\Controller;
use App\Models\AvailableTime;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Expert;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class DashboardDoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('user_dash.doctor.index');
    }

    public function expertIndex()
    {
        $experts = Expert::where('doctor_id', '=', Auth::user()->id)->get();
        $companyIds = $experts->pluck('company_id')->filter();

        $companiesName = Company::whereIn('id', $companyIds)->pluck('name');
        $experts = $experts->load('User');
        return response()->view('user_dash.doctor.experts.index', compact('experts','companiesName'));
    }

    public function availableTimeIndex()
    {
        $experts = Expert::where('doctor_id', '=', Auth::user()->id)->get();
        $expertIds = $experts->pluck('id');
        $times = AvailableTime::whereIn('expert_id', $expertIds)->get();
        $experts = $times->load('expert');
        return response()->view('user_dash.doctor.availableTimes.index ', compact(['times', 'experts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response`
     */
    public function create()
    {
        //
    }
    public function availableTimeCreate($id, $company_id = null)
    {
        $expertId = $id;
        $companyId = $company_id;

        return view('user_dash.doctor.availableTimes.create', compact('expertId', 'companyId'));
    }
    public function expertCreate()
    {
        $experts = DB::select('SELECT `id`,`name` FROM `users` Where `type` like "doctor"');
        return response()->view('user_dash.doctor.experts.create', compact('experts'));
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

    public function availableTimeStore(Request $request)
    {
        $validator = $request->validate([
            'link' => $request->input('company_id') ? 'nullable|url' : 'required|url',
            "expert_id" => 'required',
            "date" => 'required|date',
            'price' => 'required|numeric',
            'hour_to' => 'required|',
            'hour_from' => 'required|',
        ]);

        $availableTime = new AvailableTime;
        $expert = Expert::get('company_id');
        $availableTime->link = $request->input('link');
        $availableTime->expert_id = $request->input('expert_id');
        $availableTime->date = $request->input('date');
        $availableTime->price = $request->input('price');
        $availableTime->hour_from = $request->input('hour_from');
        $availableTime->hour_to = $request->input('hour_to');




        $availableTime->save();
        return redirect()->route('user_dash.doctor.dash.AvailableTimeIndex')->with('msg', 'AvailableTimes Stored Successfully')->with('type', 'warning');

        //
    }
    public function expertStore(Request $request)
    {
        //
        $validator =
            $request->validate([
                'name' => 'required|string|min:3|max:20|',
                'hour_price' => 'required|numeric|min:5|',
                'image' => 'required|image|mimes:jpg,png|',

            ]);

        $expert = new Expert;
        $expert->doctor_id = Auth::user()->id;
        $expert->name = $request->input('name');
        $expert->hour_price = $request->input('hour_price');



        if ($request->hasFile('image')) {
            $Img = $request->file('image');
            $imageName = time() . '_image' . $expert->name . '.' . $Img->getClientOriginalExtension();
            $Img->storePubliclyAs('experts', $imageName, ['disk' => 'public']);
            $expert->image = 'experts/' . $imageName;
        }

        $expert->save();
        return redirect()->route('user_dash.doctor.dash.expertIndex')->with('msg', 'Experts Updated Successfully')->with('type', 'warning');
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

    public function expertEdit($id)
    {
        $expert = Expert::find($id);

        return response()->view('user_dash.doctor.experts.edit', compact('expert'));
    }
    public function availableTimeEdit($id)
    {
        $AvailableTime = AvailableTime::find($id);
        $experts = Expert::where('doctor_id', '=', Auth::user()->id)->get();
        return response()->view('user_dash.doctor.AvailableTimes.edit', compact(['experts', 'AvailableTime']));
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


    public function expertUpdate(Request $request, $id)
    {
        //
        $expert = Expert::findOrFail($id);
        $validator =
            $request->validate([
                'name' => 'required|string|min:3|max:20|',
                'hour_price' => 'required|numeric|min:5|',
                'image' => 'required|image|mimes:jpg,png',

            ]);

        $expert->name = $request->input('name');
        $expert->hour_price = $request->input('hour_price');




        if ($request->hasFile('image')) {
            if ($expert->image != null) {
                Storage::delete($expert->image);
            }
            $CourseImg = $request->file('image');
            $imageName = time() . '_image' . $expert->name . '.' . $CourseImg->getClientOriginalExtension();
            $CourseImg->storePubliclyAs('experts', $imageName, ['disk' => 'public']);
            $expert->image = 'experts/' . $imageName;
        }

        $saved=$expert->save();
        if($saved){
        return redirect()->route('user_dash.doctor.dash.expertIndex')->with('msg', 'Expert Updated Successfully')->with('type', 'success');
    }

        else{
            return redirect()->route('user_dash.doctor.dash.expertEdit')->with('msg', 'Expert Update Failed')->with('type', 'warning');
        }
    }

    public function availableTimeUpdate(Request $request, $id)
    {
        $validator = $request->validate([
            "link" =>  $request->input('company_id') ? 'nullable|url' : 'required|url',
            "expert_id" => 'required',
            "date" => 'required|date',
            'price' => 'required|numeric',
            'hour_to' => 'required|',
            'hour_from' => 'required|',
        ]);
        $availableTime = AvailableTime::findOrFail($id);
        $availableTime->expert_id = $request->input('expert_id');
        $availableTime->link = $request->input('link');
        $availableTime->date = $request->input('date');
        $availableTime->price = $request->input('price');
        $availableTime->hour_from = $request->input('hour_from');
        $availableTime->hour_to = $request->input('hour_to');

        $saved = $availableTime->save();
        if($saved){
        return redirect()->route('user_dash.doctor.dash.AvailableTimeIndex')->with('msg', 'AvailableTimes Updated Successfully')->with('type', 'success');
    }else{
        return redirect()->route('user_dash.doctor.dash.AvailableTimeEdit')->with('msg', 'AvailableTimes Update Failed')->with('type', 'warning');
    }
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
    public function expertDestroy($id)
    {
        //
        $expert = Expert::findOrFail($id);
        $expert->delete();
        if ($expert->image != null) {
           $deleted =  Storage::delete($expert->image);
           if($deleted){

               return redirect()->route('user_dash.doctor.dash.expertIndex')->with('msg', 'Expert Deleted Successfully')->with('type', 'danger');
            }else{
                return redirect()->route('user_dash.doctor.dash.expertIndex')->with('msg', 'Expert Delete Failed')->with('type', 'warning');
           }
        }
    }
    public function availableTimeDestroy($id)
    {
        //
        $availableTime = AvailableTime::findOrFail($id);
        $deleted = $availableTime->delete();

        if ($deleted) {
            return redirect()->route('user_dash.doctor.dash.AvailableTimeIndex')->with('msg', 'AvailableTimes Deleted Successfully')->with('type', 'success');
        } else {
            return redirect()->route('user_dash.doctor.dash.AvailableTimeIndex')->with('msg', 'AvailableTimes Deleted Failed')->with('type', 'danger');
        }
    }
}
