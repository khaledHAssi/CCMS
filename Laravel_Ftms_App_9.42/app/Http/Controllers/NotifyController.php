<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\User;
use App\Notifications\AppliedNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotifyController extends Controller
{

    public function send()
    {
        // return 'eeee';

        $user = Auth::user();
        $user->notify( new AppliedNotification() );
        // $user = User::find(24);

        // $user->notify( new AppliedNotification($user) );
    }

    public function read()
    {
        $user = Auth::user();
    //  $applications =$user->notifications->implode('id',',');
        // $notifications = Notification::latest('id')->get();
        // return view('notifications', compact(['user','notifications']));
        return view('notifications', compact('user'));
    }

    public function notify($id)
    {
        $user = Auth::user();
        $notify = $user->notifications()->find($id);

        // dd($notify->data['url']);
        $notify->markAsRead();

        return redirect($notify->data['url']);

    }
}
