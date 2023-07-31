<?php

namespace App\Http\Controllers\user_dash\companyManager;


use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $answers = Answer::all();
        $tasks = DB::select('SELECT `id`, `title` FROM `tasks` ');
        $users = DB::select('SELECT `id`, `name` FROM `users` ');
        return response()->view('admin.answers.index', compact(['tasks', 'answers', 'users']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $answers = Answer::all();
        $tasks = DB::select('SELECT `id`, `title` FROM `tasks` ');
        $users = DB::select('SELECT `id`, `name` FROM `users` ');
        return response()->view('admin.answers.create', compact(['tasks', 'answers', 'users']));
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
        $request->validate([
            'solution' => 'required',
            'student_mark' => 'required|min:1|max:100'
        ]);

        $answer = new Answer();
        $answer->user_id = $request->input('user_id');
        $answer->task_id = $request->input('task_id');
        $answer->solution = $request->input('solution');
        $answer->student_mark = $request->input('student_mark');

        $answer->save();

        return redirect()->route('admin.answers.index')->with('msg', 'Answer created Successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function show(answer $answer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $answer = Answer::findOrFail($id);
        $users = DB::select('SELECT `id`, `name` FROM `users` ');
        $tasks = DB::select('SELECT `id`, `title` FROM `tasks` ');
        return response()->view('admin.answers.edit', compact(['tasks', 'users', 'answer']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'solution' => 'required',
            'student_mark' => 'required|min:1|max:100'

        ]);
        $answer = Answer::findOrFail($id);
        $answer->user_id = $request->input('user_id');
        $answer->task_id = $request->input('task_id');
        $answer->solution = $request->input('solution');
        $answer->student_mark = $request->input('student_mark');

        $answer->save();
        return redirect()->route('admin.answers.index')->with('msg', 'Answer updated Successfully')->with('type', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\answer  $answer
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $deleted = Answer::destroy($id);
        return redirect()->back();
    }
}
