<?php

namespace App\Http\Controllers;

use App\Models\Evaluation;
use App\Models\EvaluationAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EvaluationAnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //;
        $EvaluationAnswer = EvaluationAnswer::all();
        $evaluation = DB::select('SELECT `id`, `title` FROM `evaluations`');
        // $EvaluationAnswer  = $EvaluationAnswer->load('evaluation');

        return response()->view('admin.evaluationAnswer.index', ['EvaluationAnswer' => $EvaluationAnswer, 'evaluations' => $evaluation]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $evaluation = DB::select('SELECT `id`, `title` FROM `evaluations` ');
        return response()->view('admin.evaluationAnswer.create', ['evaluation' => $evaluation]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validator = validator($request->all(), [
            'reason' => 'required|string|max:30',
            'answer_type' => 'required|numeric|min:1|max:100',
            'evaluation_id' => 'required',
        ]);

        if (!$validator->fails()) {
            $EvaluationAnswer = new EvaluationAnswer();
            $EvaluationAnswer->reason = $request->input('reason');
            $EvaluationAnswer->answer_type = $request->input('answer_type');
            $EvaluationAnswer->evaluation_id = $request->input('evaluation_id');
            $EvaluationAnswer->save();
        }

        return redirect()->route('admin.evaluationAnswer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(EvaluationAnswer $evaluationAnswer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $evaluation = DB::select('SELECT `id`, `title` FROM `evaluations` ');
        $evaluationAnswer = EvaluationAnswer::findOrFail($id);
        return response()->view('admin.EvaluationAnswer.edit', ['evaluationAnswer' => $evaluationAnswer, 'evaluation' => $evaluation]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //

        $validator = validator($request->all(), [
            'reason' => 'required|string|max:30',
            'answer_type' => 'required|numeric|min:1|max:100',
            'evaluation_id' => 'required',
        ]);
        if (!$validator->fails()) {  // يعني لو التحقق نجح وما قشل احقظلي البيانات وهكذا
            $EvaluationAnswer = EvaluationAnswer::findOrFail($id);
            $EvaluationAnswer->reason = $request->input('reason');
            $EvaluationAnswer->answer_type = $request->input('answer_type');
            $EvaluationAnswer->evaluation_id = $request->input('evaluation_id');
            $save = $EvaluationAnswer->save();
            if ($save) {
                return redirect()->route('admin.evaluationAnswer.index')->with('msg', 'EvaluationAnswer Updated Successfully')->with('type', 'success');;
            }
        } else {
            return redirect()->back()->with('msg', 'EvaluationAnswer Update Failed')->with('type', 'danger');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $deleted = EvaluationAnswer::destroy($id);
        if ($deleted) {
            return redirect()->back()->with('msg', 'EvaluationAnswer Deleted Successfully')->with('type', 'success');;
        } else {
            return redirect()->back()->with('msg', 'EvaluationAnswer Delete Failed')->with('type', 'danger');;
        }
    }
}
