<?php

namespace App\Http\Controllers\user_dash\companyManager;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Expert;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class ManagerUsersController extends Controller
{
    public function index()
    {
        // //get the expert when his company_id equal the logged in companyManager company
        // $doctors = Expert::where('company_id', '=',Auth::user()->company_id)->get();
        // //get the doctor_id column ;
        // $userIds = $doctors->pluck('doctor_id');
        // //get all courses data when his company_id equal the logged in companyManager company
        // $supervisors = Course::where('company_id', '=',Auth::user()->company_id)->get();
        // //to concat array doctor & array supervisor
        // $userIds = $userIds->concat($supervisors->pluck('supervisor_id'));
        // //when the user_id equal the supervisor id or the expert id;
        // $users = User::whereIn('id', $userIds)->get();

       $users = User::where('company_id', '=',Auth::user()->company_id)->get();

        return view('user_dash.companyManager.users.index', ['users' => $users]);
    }
    public function create()
    {
        return view('user_dash.companyManager.users.create');
    }
    public function show()
    {
    }
    public function store(Request $request)
    // public function store(Request $request)
    {

        $user = new User;

        // $request->file()->move();
        $validator =
            $request->validate([
                'username' => 'required|string|min:3|max:20|',
                'name' => 'required|string|min:3|max:20|',
                'phone' => 'nullable|numeric|digits:12|',
                'status' => 'nullable|string|in:on',
                'email' => 'required|string|email',
                'user_image' => 'nullable|image|mimes:jpg,png|max:1024',
                'password' => [
                    'required', 'string',
                    Password::min(8)
                    ->numbers()
                    ->letters()
                    ->symbols()
                    ->mixedCase()
                    ->uncompromised()
                ],
            ]);


// dd($request->status);
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->type = $request->input('type');
        $user->company_id = $request->input('company_id');
        $user->password = Hash::make($request->input($request->input('password')));
        $user->created_at = $request->input('created_at');
        $user->updated_at = $request->input('updated_at');

        if ($request->status == 'on') {
            $user->status = 1;
        }else{
            $user->status = 0;
        }

        if ($request->hasFile('user_image')) {
            $userImage = $request->file('user_image');
            $imageName = time() . '_image' . $user->name . '.' . $userImage->getClientOriginalExtension();
            $userImage->storePubliclyAs('users', $imageName, ['disk' => 'public']);
            $user->image = 'users/' . $imageName;
        }
        $user->save();

        return redirect()->route('user_dash.cmUsers.index')->with('msg', 'Student Account Created Successfully')->with('type', 'success');
    }


}
