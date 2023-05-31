<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tasks =Task::all();
        $courses = DB::select('SELECT `id`, `name` FROM `courses` ');
        $companies = DB::select('SELECT `id`, `name` FROM `companies` ');
        return response()->view('admin.tasks.index',compact(['tasks','courses','companies']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tasks =Task::all();
        $courses = DB::select('SELECT `id`, `name` FROM `courses` ');
        $companies = DB::select('SELECT `id`, `name` FROM `companies` ');
        return response()->view('admin.tasks.create',compact(['tasks','courses','companies']));

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

        $validator = validator($request->all(),[
            'company_id' => 'required|',
            'course_id' => 'required|',
            'question'=>'required|string',
            'main_mark'=>'required|int|min:1|max:100',
        ]);

        if (!$validator->fails()) {
            $tasks = new Task();
            $tasks->company_id = $request->input('company_id');
            $tasks->course_id  = $request->input('course_id');
            $tasks->question   = $request->input('question');
            $tasks->main_mark  = $request->input('main_mark');
            $tasks->title  = $request->input('title');
            $tasks->save();
        }

        return redirect()->route('admin.tasks.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $task =Task::findOrFail($id);
        $courses = DB::select('SELECT `id`, `name` FROM `courses` ');
        $companies = DB::select('SELECT `id`, `name` FROM `companies` ');
        return response()->view('admin.tasks.edit',compact(['task','courses','companies']));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $tasks = Task::findOrFail($id);
        $validator = validator($request->all() , [
            'company_id' => 'required|',
            'course_id' => 'required|',
            'question'=>'required|string',
            'main_mark'=>'required|int|min:1|max:100',
        ]);
        if (!$validator->fails()) {  // يعني لو التحقق نجح وما قشل احقظلي البيانات وهكذا
            $tasks->company_id = $request->input('company_id');
            $tasks->course_id  = $request->input('course_id');
            $tasks->question   = $request->input('question');
            $tasks->main_mark  = $request->input('main_mark');
            $tasks->title  = $request->input('title');
            $save = $tasks->save();

        }
        return redirect()->route('admin.tasks.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $deleted = Task::destroy($id);
        return redirect()->back();
    }
}
