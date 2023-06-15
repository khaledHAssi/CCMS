<?php

namespace App\Http\Controllers\user_dash\companyManager;

use App\Models\Expert;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ManagerExpertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $experts = Expert::where('company_id','=',Auth::user()->company_id)->get();
        $experts = $experts->load('User');
        return response()->view('user_dash.companyManager.experts.index',compact('experts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = DB::select('SELECT `id`,`name` FROM `companies`');
        $doctors = DB::select('SELECT `id`,`name` FROM `users` Where `type` like "doctor"');

        return response()->view('user_dash.companyManager.experts.create',compact(['companies','doctors']));

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
             'hour_price' => 'required|numeric|min:5|',
             'company_id' => 'required',
             'image' => 'nullable|image|mimes:jpg,png|max:1024',

        ]);

        $expert = new Expert ;
        $expert->company_id = $request->input('company_id');
        $expert->doctor_id = $request->input('doctor_id');
        $expert->name = $request->input('name');
        $expert->hour_price = $request->input('hour_price');



        if ($request->hasFile('image')) {
            $Img = $request->file('image');
            $imageName = time() . '_image' . $expert->name . '.' . $Img->getClientOriginalExtension();
            $Img->storePubliclyAs('experts', $imageName, ['disk' => 'public']);
            $expert->image = 'experts/' . $imageName;
        }

        $expert->save();
        return redirect()->route('user_dash.cmExperts.index')->with('msg', 'Experts Updated Successfully')->with('type', 'warning');

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
        $expert = Expert::find($id);
        // dd($expert->supervisor_id);
        $companies = DB::select('SELECT `id`, `name` FROM `companies` ');
        $doctors = DB::select('SELECT `id`,`name` FROM `users` Where `type` like "doctor"');

        return response()->view('user_dash.companyManager.experts.create',compact(['expert','companies','doctors']));
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
        $expert = Expert::findOrFail($id);
        $validator =
        $request->validate([
             'name' => 'required|string|min:3|max:20|',
             'hour_price' => 'required|numeric|min:5|max:100|',
             'company_id' => 'required',
             'doctor_id' => 'required',
             'image' => 'nullable|image|mimes:jpg,png|max:1024',

        ]);

        $expert->name = $request->input('name');
        $expert->hour_price = $request->input('hour_price');
        $expert->doctor_id = $request->input('doctor_id');
        $expert->company_id = $request->input('company_id');




        if ($request->hasFile('image')) {
            if ($expert->image != null) {
                Storage::delete($expert->image);
            }
            $CourseImg = $request->file('image');
            $imageName = time() . '_image' . $expert->name . '.' . $CourseImg->getClientOriginalExtension();
            $CourseImg->storePubliclyAs('experts', $imageName, ['disk' => 'public']);
            $expert->image = 'experts/' . $imageName;
        }

            $expert->save();
        return redirect()->route('user_dash.cmExperts.index')->with('msg', 'Company Updated Successfully')->with('type', 'warning');

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
        $expert = Expert::findOrFail($id);
        $expert->delete();
        if ($expert->image !=null) {
            Storage::delete($expert->image);
        }
        return redirect()->route('user_dash.cmExperts.index')->with('msg', 'Company Deleted Successfully')->with('type', 'danger');

    }
}
