<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\AnswerMarks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerMarksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $Answer_marks = AnswerMarks::all();
        $answers = DB::select('SELECT `id`, `solution` FROM `answers` ');
        return response()->view('admin.answer_marks.index',compact(['answers','Answer_marks']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $answers = DB::select('SELECT `id`, `solution` FROM `answers` ');
        return response()->view('admin.answer_marks.create',compact('answers'));

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
            'student_mark'=>'required|min:1|max:100'
        ]);

        if (!$validator->fails()) {
            $answer_marks = new AnswerMarks();
            $answer_marks->answer_id = $request->input('answer_id');
            $answer_marks->student_mark   = $request->input('student_mark');
            $answer_marks->save();
        }
        return redirect()->route('admin.answer_marks.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\answer_marks  $answer_marks
     * @return \Illuminate\Http\Response
     */
    public function show(answer_marks $answer_marks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\answer_marks  $answer_marks
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $Answer_mark =AnswerMarks::findOrFail($id);
        $answers = DB::select('SELECT `id`, `solution` FROM `answers` ');
        return response()->view('admin.answer_marks.edit',compact(['answers','Answer_mark']));



    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\answer_marks  $answer_marks
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $answer_marks = AnswerMarks::findOrFail($id);
        $validator = validator($request->all(),[
            'student_mark'=>'required|min:1|max:100'
        ]);

        if (!$validator->fails()) {
            $answer_marks->answer_id = $request->input('answer_id');
            $answer_marks->student_mark   = $request->input('student_mark');
            $answer_marks->save();
            return redirect()->route('admin.answer_marks.index');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\answer_marks  $answer_marks
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $deleted = AnswerMarks::destroy($id);
        return redirect()->back();
    }
}
