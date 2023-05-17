<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    public function index (){
        $users = User::where('type' ,'=', "student")->get();
        return view('students.index' , ['users' =>$users]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        // dd($user);
        return view('students.edit')->with('user', $user);
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

        return redirect()->route('admin.students.index')->with('msg', 'Company Updated Successfully')->with('type', 'warning');
    }
    public function destroy($id)
    {
        // File::delete(public_path())

        User::destroy($id);
        return redirect()->route('admin.students.index')->with('msg', 'Company Deleted Successfully')->with('type', 'danger');
    }

}
