<?php

namespace App\Http\Controllers;

use App\Models\Expert;
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

        return response()->view('admin.experts.index',compact('experts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = DB::select('SELECT `id`,`name` FROM `companies`');

        return view('admin.experts.create',compact('companies'));

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
             'hour_price' => 'required|numeric|min:5|max:20|',
             'company_id' => 'required',
             'image' => 'nullable|image|mimes:jpg,png|max:1024',

        ]);

        $expert = new Expert ;
        $expert->company_id = $request->input('company_id');
        $expert->name = $request->input('name');
        $expert->hour_price = $request->input('hour_price');



        if ($request->hasFile('image')) {
            $Img = $request->file('image');
            $imageName = time() . '_image' . $expert->name . '.' . $Img->getClientOriginalExtension();
            $Img->storePubliclyAs('experts', $imageName, ['disk' => 'public']);
            $expert->image = 'experts/' . $imageName;
        }

        $expert->save();
        return redirect()->route('admin.experts.index')->with('msg', 'Experts Updated Successfully')->with('type', 'warning');

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
        return response()->view('admin.experts.edit',compact(['expert','companies']));
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
             'hour_price' => 'required|numeric|min:5|max:20|',
             'company_id' => 'required',
             'image' => 'nullable|image|mimes:jpg,png|max:1024',

        ]);

        $expert->name = $request->input('name');
        $expert->hour_price = $request->input('hour_price');
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
        return redirect()->route('admin.experts.index')->with('msg', 'Company Updated Successfully')->with('type', 'warning');

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
        return redirect()->route('admin.experts.index')->with('msg', 'Company Deleted Successfully')->with('type', 'danger');

    }
}
