<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;
use stdClass;

class AdminController extends Controller
{

    // public function index($lang='en'){
    public function index(){
        // if(in_array($lang,['ar','en','fr'])){

        //     App::setLocale($lang);
        // }
    $notifications = Notification::paginate(env('PAGINATION_Notification_COUNT'));


    $jsondata = [];
    foreach($notifications as $item){
        $data = json_decode($item->data , true);
        $mdsai = array(
            'data' => $data,
            'id' => $item->id,
        );
        array_push($jsondata,$mdsai);
    }
    // $data =

    // $object = new stdClass();
    // foreach ($jsondata as $key => $value)
    // {
    //     $object = $value;
    // }
    // $notify = $notifications->toJson();
    // dd($notify);
        // $k =$notifications->toJson();
        // $h =$k->object;
    // dd($notifications[0]['data']);
    // dd($jsondata);

    return response()->view('admin.index',compact('jsondata'));
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
