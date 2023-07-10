<?php

namespace App\Http\Controllers;

use App\Models\Company_evaluations;
use App\Models\Evaluation;
use App\Models\EvaluationAnswer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $evaluation = Evaluation::all();
        return response()->view('admin.Evaluation.index', ['evaluation' => $evaluation]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        $evaluation = Evaluation::all();
        $companies = DB::select('SELECT `id`, `name` FROM `companies` ');
        $courses = DB::select('SELECT `id`, `name` FROM `courses` ');
        return response()->view('admin.Evaluation.create', ['evaluation' => $evaluation, 'companies' => $companies,'courses' => $courses]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validator = validator($request->all(), [
            'title' => 'required|string|max:50',
            'question' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);

        if (!$validator->fails()) {
            $evaluation = new Evaluation();
            $companies_evaluations = new Company_evaluations();
            $evaluation->title = $request->input('title');
            $evaluation->question = $request->input('question');
            $evaluation->end_date = $request->input('end_date');
            $evaluation->start_date = $request->input('start_date');
            $companies_evaluations->course_id = $request->input('course_id');
            $companies_evaluations->company_id = $request->input('company_id');
            $save = $evaluation->save();
            $companies_evaluations->evaluation_id =$evaluation->id;
            $saved = $companies_evaluations->save();
            return redirect()->route('admin.evaluation.index')->with('msg','Evaluation Created Successfully')
        ->with('type', 'success');
        }else{
            return redirect()->route('admin.evaluation.create')->with('msg','Evaluation Create Failed')
            ->with('type', 'warning');
        }


    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $evaluation = Evaluation::findOrFail($id);
        $companies = DB::select('SELECT `id`, `name` FROM `companies` ');
        // $evaluations = DB::select('SELECT * FROM `evaluations` ');

        return response()->view('admin.evaluation.edit', ['evaluation' => $evaluation]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //

        $evaluation = Evaluation::findOrFail($id);
        $validator = validator($request->all(), [
            'title' => 'required|string|max:50',
            'question' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
        ]);
        if (!$validator->fails()) {  // يعني لو التحقق نجح وما قشل احقظلي البيانات وهكذا
            $evaluation->title = $request->input('title');
            $evaluation->end_date = $request->input('end_date');
            $evaluation->start_date = $request->input('start_date');
            $evaluation->question = $request->input('question');
            // $evaluation->company_id = $request->input('company_id');
            $saved = $evaluation->save();
            if ($saved) {
                return redirect()->route('admin.evaluation.index')->with('msg', 'Evaluation Updated Successfully')->with('type', 'success');
            }
        } else {
            return redirect()->route('admin.evaluation.index')->with('msg', 'Evaluation Update Failed')->with('type', 'danger');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $deleted = Evaluation::destroy($id);
        if ($deleted) {
            return redirect()->route('admin.evaluation.index')->with('msg', 'Evaluation Deleted Successfully')->with('type', 'success');
        } else {
            return redirect()->route('admin.evaluation.index')->with('msg', 'Evaluation Deleted Failed')->with('type', 'danger');
        }
    }
}
