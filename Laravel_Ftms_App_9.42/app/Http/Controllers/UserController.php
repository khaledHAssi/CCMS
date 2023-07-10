<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('admin.users.index', ['users' => $users]);
    }
    public function create()
    {
        $companies = DB::select('SELECT `id`,`name` FROM `companies`');
        return view('admin.users.create',compact('companies'));
    }
    public function show()
    {
    }
    public function store(Request $request)
    {

        $user = new User;

        // $request->file()->move();
        $validator =
            $request->validate([
                'username' => 'required|string|min:3|max:20|',
                'name' => 'required|string|min:3|max:20|',
                'phone' => 'nullable|numeric|digits:12|',
                'status' => 'nullable|string|in:on',
                'company_id' => 'required',
                'email' => 'required|string|email',
                'user_image' => 'required|image|mimes:jpg,png',
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
        } else {
            $user->status = 0;
        }

        if ($request->hasFile('user_image')) {
            $userImage = $request->file('user_image');
            $imageName = time() . '_image' . $user->name . '.' . $userImage->getClientOriginalExtension();
            $userImage->storePubliclyAs('users', $imageName, ['disk' => 'public']);
            $user->image = 'users/' . $imageName;
        }
        $user->save();

        return redirect()->route('admin.users.index')->with('msg', 'Student Account Created Successfully')->with('type', 'success');
    }
    public function edit($id)
    {
        $user = User::find($id);
        // dd($user);
        $companies = DB::select('SELECT `id`,`name` FROM `companies`');
        return view('admin.users.edit',compact('companies','user'));
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
                'company_id' => 'required',
                'user_image' => 'nullable|image|mimes:jpg,png|',
                'password' => [
                    'nullable', 'string',
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
        $user->company_id = $request->input('company_id');
        $user->type = $request->input('type');
        if ($request->has('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        if ($request->status == 'on') {
            $user->status = 1;
        } else {
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

        $saved=$user->save();
        if($saved){

            return redirect()->route('admin.users.index')->with('msg', 'User Updated Successfully')->with('type', 'success');
        }else{
            return redirect()->route('admin.users.edit')->with('msg', 'User Update Failed')->with('type', 'warning');

        }
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $deleted = $user->delete();
        if ($user->image != null & $deleted) {
           $ifDeleted = Storage::delete($user->image);
           if($ifDeleted){
           return redirect()->route('admin.users.index')->with('msg', 'User Deleted Successfully')->with('type', 'success');
        }else{
               return redirect()->route('admin.users.index')->with('msg', 'User Delete Failed')->with('type', 'danger');

           }
        }

    }
}
