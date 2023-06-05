<?php

namespace App\Http\Controllers;

use App\Models\AvailableTime;
use App\Models\Expert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class AvailableTimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $times = AvailableTime::all();
        $experts =$times->load('expert');
        return response()->view('admin.availableTimes.index',compact(['times','experts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $experts = DB::select('SELECT `id`,`name` FROM `experts`');

        return view('admin.AvailableTimes.create',compact('experts'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
        "link" => 'nullable|url',
        "expert_id" => 'required',
        "date" => 'required|date',
        'price'=>'required|numeric',
        'hour_to'=>'required|',
        'hour_from'=>'required|',
    ]);

        $availableTime = new AvailableTime ;
        $availableTime->expert_id = $request->input('expert_id');
        $availableTime->link = $request->input('link');
        $availableTime->date = $request->input('date');
        $availableTime->price = $request->input('price');
        $availableTime->hour_from = $request->input('hour_from');
        $availableTime->hour_to = $request->input('hour_to');




        $availableTime->save();
        return redirect()->route('admin.AvailableTimes.index')->with('msg', 'AvailableTimes Updated Successfully')->with('type', 'warning');

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
        $AvailableTime = AvailableTime::find($id);
        $experts = Expert::all();
        // dd($AvailableTime);
        return response()->view('admin.AvailableTimes.edit',compact(['experts','AvailableTime']));
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
        $validator = $request->validate([
            "link" => 'nullable|url',
            "expert_id" => 'required',
            "date" => 'required|date',
            'price'=>'required|numeric',
            'hour_to'=>'required|',
            'hour_from'=>'required|',
        ]);
        $availableTime = AvailableTime::findOrFail($id);
        $availableTime->expert_id = $request->input('expert_id');
        $availableTime->link = $request->input('link');
        $availableTime->date = $request->input('date');
        $availableTime->price = $request->input('price');
        $availableTime->hour_from = $request->input('hour_from');
        $availableTime->hour_to = $request->input('hour_to');
        $availableTime->save();
        return redirect()->route('admin.AvailableTimes.index')->with('msg', 'AvailableTimes Updated Successfully')->with('type', 'warning');

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
        $availableTime = AvailableTime::findOrFail($id);
        $deleted= $availableTime->delete();

        if($deleted){
            return redirect()->route('admin.AvailableTimes.index')->with('msg', 'AvailableTimes Deleted Successfully')->with('type', 'success');
        }
        else{
            return redirect()->route('admin.AvailableTimes.index')->with('msg', 'AvailableTimes Deleted Failed')->with('type', 'danger');
        }

    }
}
