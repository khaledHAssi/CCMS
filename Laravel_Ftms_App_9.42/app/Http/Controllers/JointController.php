<?php

namespace App\Http\Controllers;

use App\Models\Course_student;
use Illuminate\Http\Request;

class JointController extends Controller
{

    public function delete_student($id)
    {
        $courseStudent = Course_student::findOrFail($id);
        $deleted = $courseStudent->delete();
        if ($deleted) {
            return redirect()->back()->with(['msg' => 'The student was deleted from the course.', 'status' => 'success']);
        } else {
            return redirect()->back()->with(['msg' => 'Failed to delete the student in the course.', 'status' => 'error']);
        }
    }



    public function edit_student(Request $request)
    {
        $courseStudent = Course_student::findOrFail($request->course_id);
        $courseStudent->student_mark = $request->student_mark;
        $courseStudent->note = $request->note;
        $saved = $courseStudent->save();


        if ($saved) {
            return response()->json([
                "status" => 'success',
                "message" => "Data entered successfully",
                "data" => [
                    "status" =>  $saved
                ]
            ]);
        } else {
            return response()->json([
                "status" => 'error',
                "message" => "Data entered failed",
                "data" => [
                    "status" =>  $saved
                ]
            ]);
        }
        // $id = $request->course_id;
        // $mark = $request->student_mark;
        // $note = $request->note;

        // return [$id, $mark, $note,'from controller'];
    }

    // to test online api 
    // public function posts_api()
    // {
    //     // $data = Http::get('https://jsonplaceholder.typicode.com/posts');
    //     $data = Http::get('http://jsonplaceholder.typicode.com/posts');
    //     dd($data->json());
    // }
    // add this code in routes/api.php
    // Route::get('posts_api', [TestAPI::class, 'posts_api']);
}
