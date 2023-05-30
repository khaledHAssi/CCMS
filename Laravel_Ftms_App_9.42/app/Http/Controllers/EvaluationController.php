<?php

namespace App\Http\Controllers;

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
        return response()->view('admin.Evaluation.index' , ['evaluation' => $evaluation]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

       $evaluation = Evaluation::all();
        $companies = DB::select('SELECT `id`, `name` FROM `companies` ');
        ;
       return response()->view('admin.Evaluation.create' , ['evaluation' => $evaluation , 'companies'=>$companies]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
            //
            $validator = validator($request->all(),[
                'title' => 'required|string|max:30',
                'question' => 'required',

            ]);

            if (!$validator->fails()) {
                $evaluation = new Evaluation();
                $evaluation->title = $request->input('title');
                $evaluation->question = $request->input('question');
                $evaluation->company_id = $request->input('company_id');
                $save = $evaluation->save();
            }

            return redirect()->route('admin.evaluation.index');
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

        return response()->view('admin.evaluation.edit' , ['evaluation' => $evaluation,'companies'=>$companies]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
        $validator = validator($request->all() , [
            'title' => 'required|string|max:30',
            'question' => 'required',
            'company_id' => 'required',
        ]);
        if (!$validator->fails()) {  // يعني لو التحقق نجح وما قشل احقظلي البيانات وهكذا
            $evaluation = Evaluation::findOrFail($id);
            $evaluation->title = $request->input('title');

            $evaluation->question = $request->input('question');
            $evaluation->company_id = $request->input('company_id');
            $save = $evaluation->save();

        }
        return redirect()->route('admin.evaluation.index');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $deleted = Evaluation::destroy($id);
        return redirect()->back();

    }
}
