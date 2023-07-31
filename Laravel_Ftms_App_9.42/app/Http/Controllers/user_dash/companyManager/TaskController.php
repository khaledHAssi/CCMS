<?php

namespace App\Http\Controllers\user_dash\companyManager;


use App\Http\Controllers\Controller;
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
        $tasks = Task::all();
        $courses = DB::select('SELECT `id`, `name` FROM `courses` ');
        $companies = DB::select('SELECT `id`, `name` FROM `companies` ');
        return response()->view('user_dash.companyManager.tasks.index', compact(['tasks', 'courses', 'companies']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $tasks = Task::all();
        $courses = DB::select('SELECT `id`, `name` FROM `courses` ');
        $companies = DB::select('SELECT `id`, `name` FROM `companies` ');
        return response()->view('user_dash.companyManager.tasks.create', compact(['tasks', 'courses', 'companies']));
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

        $validator = validator($request->all(), [
            'company_id' => 'required|',
            'course_id' => 'required|',
            'question' => 'required|string',
            'main_mark' => 'required|int|min:1|max:100',
        ]);

        if (!$validator->fails()) {
            $tasks = new Task();
            $tasks->company_id = $request->input('company_id');
            $tasks->course_id  = $request->input('course_id');
            $tasks->question   = $request->input('question');
            $tasks->main_mark  = $request->input('main_mark');
            $tasks->start_date  = $request->input('start_date');
            $tasks->end_date  = $request->input('end_date');
            $tasks->title  = $request->input('title');
            $tasks->save();
            return redirect()->route('user_dash.cmtasks.index')->with('msg', 'Task Stored Successfully')->with('type', 'success');
        }else{
            return redirect()->route('user_dash.cmtasks.create')->with('msg', 'Task Store Failed')->with('type', 'danger');

        }

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
        $task = Task::findOrFail($id);
        $courses = DB::select('SELECT `id`, `name` FROM `courses` ');
        $companies = DB::select('SELECT `id`, `name` FROM `companies` ');
        return response()->view('user_dash.companyManager.tasks.edit', compact(['task', 'courses', 'companies']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $tasks = Task::findOrFail($id);
        $validator = validator($request->all(), [
            'company_id' => 'required|',
            'course_id' => 'required|',
            'question' => 'required|string',
            'main_mark' => 'required|int|min:1|max:100',
        ]);
        if (!$validator->fails()) {  // يعني لو التحقق نجح وما قشل احقظلي البيانات وهكذا
            $tasks->company_id = $request->input('company_id');
            $tasks->course_id  = $request->input('course_id');
            $tasks->question   = $request->input('question');
            $tasks->main_mark  = $request->input('main_mark');
            $tasks->title  = $request->input('title');
            $save = $tasks->save();
            return redirect()->route('user_dash.cmtasks.index')->with('msg', 'Task Updated successfully')->with('type', 'success');

        }else{
        return redirect()->back()->with('msg', 'Task Update Failed')->with('type', 'danger');
    }
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
     if($deleted){
        return redirect()->back()->with('msg', 'Task Deleted successfully')->with('type', 'success');
        }
        else{
        return redirect()->back()->with('msg', 'Task Delete Failed')->with('type', 'danger');
    }

    }
}
