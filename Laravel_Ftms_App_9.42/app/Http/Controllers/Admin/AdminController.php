<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    // public function index($lang='en'){
    public function index(){
        // if(in_array($lang,['ar','en','fr'])){

        //     App::setLocale($lang);
        // }
        return view('admin.index');
    }



    public function settings(){
        return view('admin.settings');
    }


    public function settings_store(Request $request)
    {
        $logo = settings()->get('logo');//MisUnderstood
        if($request->has('logo')) {
            $logo = $request->file('logo')->store('uploads', 'custom');
            settings()->set('logo', $logo);
        }

        settings()->save();

        return redirect()->back();
    }

    // public function ShowUsers(){
    //     $users = User::all();
    //     return view('users',['users'=>$users]);
    // }
}
