<?php

namespace App\Http\Controllers\user_dash\companyManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AvailableTime;
use App\Models\Expert;
use Illuminate\Support\Facades\Auth;

class ManagerAvailableTimeController extends Controller
{
    //
    public function index()
    {
        $experts = Expert::where('company_id', '=', Auth::user()->company_id)->get();
        $expertIds = $experts->pluck('id');
        $times = AvailableTime::whereIn('expert_id', $expertIds)->get();
        $experts = $times->load('expert');
        return response()->view('user_dash.companyManager.availableTimes.index ', compact(['times', 'experts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'price' => 'required|numeric',
            'hour_to' => 'required|',
            'hour_from' => 'required|',
        ]);

        $availableTime = new AvailableTime;
        $availableTime->expert_id = $request->input('expert_id');
        $availableTime->link = $request->input('link');
        $availableTime->date = $request->input('date');
        $availableTime->price = $request->input('price');
        $availableTime->hour_from = $request->input('hour_from');
        $availableTime->hour_to = $request->input('hour_to');




        $availableTime->save();
        return redirect()->route('user_dash.cmAvailableTimes.index')->with('msg', 'AvailableTimes Updated Successfully')->with('type', 'warning');

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
        $AvailableTime = AvailableTime::find($id);
        $experts = Expert::where('company_id', '=', Auth::user()->company_id)->get();
        return response()->view('user_dash.companyMAnager.AvailableTimes.edit', compact(['experts', 'AvailableTime']));
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
        if ($request->status == 'on') {
            $availableTime->status = 1;
        } else {
            $availableTime->status = 0;
        }
        $availableTime->save();
        return redirect()->route('user_dash.cmAvailableTimes.index')->with('msg', 'AvailableTimes Updated Successfully')->with('type', 'warning');
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
        $deleted = $availableTime->delete();

        if ($deleted) {
            return redirect()->route('user_dash.cmAvailableTimes.index')->with('msg', 'AvailableTimes Deleted Successfully')->with('type', 'success');
        } else {
            return redirect()->route('user_dash.cmAvailableTimes.index')->with('msg', 'AvailableTimes Deleted Failed')->with('type', 'danger');
        }
    }

    public function createWithId(string $id)
    {
        return view('user_dash.companyManager.availableTimes.create', compact('id'));
    }
}
