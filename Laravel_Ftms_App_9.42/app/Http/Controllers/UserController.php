<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class UserController extends Controller
{
    public function index (){
        $users = User::get();
        return view('users.index' , ['users' =>$users]);
    }
    public function create(){
        return view('users.create');
    }

    public function store(Request $request)
    // public function store(Request $request)
    {
        // $request->file()->move();
        $validator =
          $request->validate([
            'username' => 'required|string|min:3|max:20|',
            'name' => 'required|string|min:3|max:20|',
            'phone' => 'nullable|numeric|digits:12|',
            'email' => 'required|string|email',
            // 'image' => 'required|image|mimes:jpg,png|max:3024',
            'password' => [
                'required', 'string',
                Password::min(8)
                    ->numbers()
                    // ->letters()
                    // ->symbols()
                    // ->mixedCase()
                    // ->uncompromised()
            ],
        ]);
        $user = new User;


        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->phone = $request->input('phone');
        $user->email = $request->input('email');
        $user->type = $request->input('type');
        $user->password = Hash::make($request->input($request->input('password')));
        $user->created_at = $request->input('created_at');
        $user->updated_at = $request->input('updated_at');

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
        $user = User::findOrFail($id);
        // dd($user);
        return view('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(StudentRequest $request, User $user)
    public function update(Request $request,$id)
    {





        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'phone' => $request->phone,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.users.index')->with('msg', 'Company Updated Successfully')->with('type', 'warning');
    }
    public function destroy($id)
    {
        // File::delete(public_path())


        $user = User::findOrFail($id);
        $deleted = $user->delete();
        if ($deleted) {
            Storage::delete($user->image);
        }

        return redirect()->route('admin.users.index')->with('msg', 'Company Deleted Successfully')->with('type', 'danger');
    }

}
