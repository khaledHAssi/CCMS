<?php

namespace App\Http\Controllers;

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
        $answers =Answer::all();
        $tasks = DB::select('SELECT `id`, `title` FROM `tasks` ');
        $users = DB::select('SELECT `id`, `name` FROM `users` ');
        return response()->view('admin.answers.index',compact(['tasks','answers','users']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $answers =Answer::all();
        $tasks = DB::select('SELECT `id`, `title` FROM `tasks` ');
        $users = DB::select('SELECT `id`, `name` FROM `users` ');
        return response()->view('admin.answers.create',compact(['tasks','answers','users']));

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

        ]);

        if (!$validator->fails()) {
            $answers = new Answer();
            $answers->user_id = $request->input('user_id');
            $answers->task_id  = $request->input('task_id');
            $answers->solution   = $request->input('solution');
            $answers->save();
        }

        return redirect()->route('admin.answers.index');
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
        $answer= Answer::findOrFail($id);
        $users = DB::select('SELECT `id`, `name` FROM `users` ');
        $tasks = DB::select('SELECT `id`, `title` FROM `tasks` ');
        return response()->view('admin.answers.edit',compact(['tasks','users','answer']));
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
        $validator = validator($request->all(),[

        ]);

        if (!$validator->fails()) {
            $answers = Answer::findOrFail($id);
            $answers->user_id = $request->input('user_id');
            $answers->task_id  = $request->input('task_id');
            $answers->solution   = $request->input('solution');
            $answers->save();
            return redirect()->route('admin.answers.index');

        }
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
