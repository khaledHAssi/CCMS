<?php

namespace App\Http\Controllers;

use App\Models\AppliedEvaluation;
use App\Models\Evaluation;
use App\Models\Question;
use Illuminate\Http\Request;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $evaluations = Evaluation::latest('id')->paginate(env('PAGINATION_COUNT'));

        return view('admin.evaluations.index', compact('evaluations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.evaluations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'name' => 'required',
            'type' => 'required'
        ]);

        $evaluation = Evaluation::create([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        if($request->has('questions')) {
            foreach($request->questions as $q) {
                Question::create([
                    'question' => $q,
                    'evaluation_id' => $evaluation->id
                ]);
            }
        }

        return redirect()->route('admin.evaluations.index')->with('msg', 'Evaluation Created Successfully')->with('type', 'success');
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
        $evaluation = Evaluation::find($id);

        return view('admin.evaluations.edit', compact('evaluation'));
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
        // dd($request->all());
        $evaluation = Evaluation::find($id);

        $request->validate([
            'name' => 'required',
            'type' => 'required'
        ]);

        $evaluation->update([
            'name' => $request->name,
            'type' => $request->type,
        ]);

        if($request->has('questions')) {
            Question::where('evaluation_id', $id)->delete();

            foreach($request->questions as $idd => $q) {//cause he sent the question as an array
                Question::create([
                    'question' => $q,
                    'evaluation_id' => $evaluation->id
                ]);
                // Question::updateOrCreate([
                //     'id' => $idd,
                //     'evaluation_id' => $id
                // ], [
                //     'question' => $q
                // ]);
            }
        }

        return redirect()->route('admin.evaluations.index')->with('msg', 'Evaluation Updated Successfully')->with('type', 'info');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $e = Evaluation::find($id);
        // $e->questions()->delete();
        // $e->delete();

        Question::where('evaluation_id', $id)->delete();
        Evaluation::destroy($id);


        return redirect()->route('admin.evaluations.index')->with('msg', 'Evaluation Deleted Successfully')->with('type', 'danger');
    }

    public function applied()
    {
        $applied = AppliedEvaluation::with('user', 'evaluation')->latest('id')->paginate(env('PAGINATION_COUNT'));
        return view('admin.evaluations.applied', compact('applied'));
    }

    public function applied_data($id)
    {
        $applied = AppliedEvaluation::with('user', 'evaluation')->findOrFail($id);
        return view('admin.evaluations.applied_data', compact('applied'));
    }
}
