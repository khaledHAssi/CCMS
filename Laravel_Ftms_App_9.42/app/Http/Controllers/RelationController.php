<?php

namespace App\Http\Controllers;

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
}
