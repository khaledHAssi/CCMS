<?php

namespace App\Http\Controllers\user_dash\companyManager;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class ManagerUsersController extends Controller
{
    public function index()
    {
        $users = User::get();
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
                'user_image' => 'required|image|mimes:jpg,png|max:1024',
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
    public function edit($id)
    {
        $user = User::find($id);
        // dd($user);
        $users = User::all();
        return view('user_dash.companyManager.users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(StudentRequest $request, User $user)
    public function update(Request $request, $id)
    {

        $validator =
            $request->validate([
                'username' => 'required|string|min:3|max:20|',
                'name' => 'required|string|min:3|max:20|',
                'phone' => 'nullable|numeric|digits:12|',
                'status' => 'nullable|string|in:on',
                'email' => 'required|string|email',
                'user_image' => 'nullable|image|mimes:jpg,png|max:1024',
                'password'=> [
                    'nullable','string',
                    Password::min(8)
                    ->letters()
                    ->numbers()
                    ->symbols()
                    ->mixedCase()
                    ->uncompromised()
                 ],
            ]);


        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->type = $request->input('type');
        if($request->has('password')){
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->status == 'on') {
            $user->status = 1;
        }else{
            $user->status = 0;
        }

        if ($request->hasFile('user_image')) {
            if ($user->image != null) {
                Storage::delete($user->image);
            }
            $userImage = $request->file('user_image');
            $imageName = time() . '_image' . $user->name . '.' . $userImage->getClientOriginalExtension();
            $userImage->storePubliclyAs('users', $imageName, ['disk' => 'public']);
            $user->image = 'users/' . $imageName;
        }

        $user->save();
        return redirect()->route('user_dash.cmUsers.index')->with('msg', 'Company Updated Successfully')->with('type', 'warning');
    }
    public function destroy($id)
    {
        // File::delete(public_path())


        $user = User::findOrFail($id);
       $deleted = $user->delete();
        if ($user->image != null & $deleted) {
            Storage::delete($user->image);
        }

        return redirect()->route('user_dash.cmUsers.index')->with('msg', 'Company Deleted Successfully')->with('type', 'danger');
    }

}
