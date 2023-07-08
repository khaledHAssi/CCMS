<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;

class RelationController extends Controller
{
    //
    public function profile(){
        $users = User::with('profile')->get();
        // $users = User::all();

        return view('users', compact('users'));
        // $profile = Profile::where('user_id',$user->id)->first();
        // $profile = Profile::find(1);
        // dd($profile->user);

    }

    //-----------------test ManyToMany relationship to course and student ---------------------
    
    public function course_students($id){

        $data = Course::where('id', '=', $id)->get();
        $dataWithRelation = $data->load('course_students');
        return $dataWithRelation;
    }
    
    public function student_courses($id){
    
        $data = User::where('id', '=', $id)->get();
        $dataWithRelation = $data->load('student_courses');
        return $dataWithRelation;
    }

    //----------------------------------------------------------------

}
