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
    $notifications = Notification::latest('id')->paginate(env('PAGINATION_Notification_COUNT'));


    $jsondata = [];
    foreach($notifications as $item){
        $data = json_decode($item->data , true);
        $mdsai = array(
            'data' => $data,
            'id' => $item->id,
        );
        array_push($jsondata,$mdsai);
    }


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

}
