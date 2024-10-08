<?php

namespace App\Http\Controllers;

use App\Models\Expert;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ExpertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $experts = Expert::all();
        $users = User::join('experts', 'users.id', '=', 'experts.doctor_id')
        ->where('users.type', '=', 'doctor')
        ->select('users.*')
        ->get();
        return response()->view('admin.experts.index',compact(['experts','users']));
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
        return response()->view('admin.experts.create',compact(['companies','doctors']));
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
             'hour_price' => 'required|numeric|min:5|max:100|',
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
        return redirect()->route('admin.experts.index')->with('msg', 'Expert Store Successfully')->with('type', 'success');

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

        return response()->view('admin.experts.edit',compact(['expert','companies','doctors']));
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
        return redirect()->route('admin.experts.index')->with('msg', 'Expert Updated Successfully')->with('type', 'success');

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
        return redirect()->route('admin.experts.index')->with('msg', 'Expert Deleted Successfully')->with('type', 'success');

    }
}
