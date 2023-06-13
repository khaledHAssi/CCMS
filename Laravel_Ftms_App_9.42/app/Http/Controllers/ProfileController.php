<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    //
    // public function update_user_profile(string $id)
    public function update_user_profile(Request $request, $id)
    {
        $json = json_decode($request->getBody(), true);
        return $json;
        // $validator = $request->validate([
        //     'name' => 'string|min:3|max:20|',
        //     'email' => 'string|email|unique:users,email,' . $id,
        //     'username' => 'string|min:3|max:20|unique:users,username,' . $id,
        //     'phone' => 'nullable|numeric|digits:12|',
        //     'user_image' => 'image|mimes:jpg,png|max:1024',
        // ]);

        // $user = User::findOrFail($id);

        // if($request->has('name')) {
        //     $user->name = $request->input('name');
        // }
        // if($request->has('username')) {
        //     $user->username = $request->input('username');
        // }
        // if($request->has('phone')) {
        //     $user->phone = $request->input('phone');
        // }
        // if($request->has('email')) {
        //     $user->email = $request->input('email');
        // }

        // if ($request->hasFile('user_image')) {
        //     if ($user->image != null) {
        //         Storage::delete($user->image);
        //     }
        //     $userImage = $request->file('user_image');
        //     $imageName = time() . '_image' . $user->name . '.' . $userImage->getClientOriginalExtension();
        //     $userImage->storePubliclyAs('users', $imageName, ['disk' => 'public']);
        //     $user->image = 'users/' . $imageName;
        // }
        
        // $saved = $user->save();
        // if($saved){
        //     return response()->json(['success' => true]);
        // }else{
        //     return response()->json(['success' => false]);
        // }
        // return redirect()->route('admin.users.index')->with('msg', 'Company Updated Successfully')->with('type', 'warning');
    }
}
