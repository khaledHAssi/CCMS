<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class ProfileController extends Controller
{
    public function update_user_profile(Request $request)
    {
        $id = Auth::user()->id;
        $valid = Validator::make($request->all(), [
            'name' => 'required|string|min:3|max:20|',
            'email' => 'required|string|email|unique:users,email,' . $id,
            'username' => 'required|string|min:3|max:20|unique:users,username,' . $id,
            'phone' => 'required|numeric|digits:12|',
            'image' => 'Nullable|image|mimes:jpg,png|max:3024'
        ]);

        if ($valid->fails()) {
            return response()->json([
                "status" => 'error',
                "message" => "Errors form validation",
                "data" => [
                    "errors" =>  $valid->errors()
                ]
            ]);
        }

        $user = User::findOrFail($id);

        if ($request->has('name')) {
            $user->name = $request->input('name');
        }
        if ($request->has('username')) {
            $user->username = $request->input('username');
        }
        if ($request->has('phone')) {
            $user->phone = $request->input('phone');
        }
        if ($request->has('email')) {
            $user->email = $request->input('email');
        }

        if ($request->hasFile('image')) {
            if ($user->image != null) {
                Storage::delete($user->image);
            }
            $userImage = $request->file('image');
            $imageName = time() . '_image' . $user->name . '.' . $userImage->getClientOriginalExtension();
            $userImage->storePubliclyAs('users', $imageName, ['disk' => 'public']);
            $user->image = 'users/' . $imageName;
        }

        $saved = $user->save();
        if ($saved) {
            return response()->json([
                "status" => 'success',
                "message" => "Post update successfully",
                "data" => [
                    "status" =>  $saved
                ]
            ]);
        } else {
            return response()->json([
                "status" => 'error',
                "message" => "Post update failed",
                "data" => [
                    "status" =>  $saved
                ]
            ]);
        }
    }

    public function update_profile(Request $request)
    {
        $id = Auth::user()->id;
        $valid = Validator::make($request->all(), [
            'bio' => 'required|string|min:20|max:400|',
            'facebook' => 'required|string|url',
            'twitter' => 'required|string|url',
            'linkedin' => 'required|string|url',
            'instagram' => 'required|string|url'
        ]);

        if ($valid->fails()) {
            return response()->json([
                "status" => 'error',
                "message" => "Errors form validation",
                "data" => [
                    "errors" =>  $valid->errors()
                ]
            ]);
        }

        $haveProfile = Auth::user()->profile;
        if ($haveProfile) {
            $profile = Profile::findOrFail(Auth::user()->profile->id);
        } else {
            $profile = new Profile();
        }
        $profile->bio = $request->input('bio');
        $profile->fb = $request->input('facebook');
        $profile->tw = $request->input('twitter');
        $profile->li = $request->input('linkedin');
        $profile->in = $request->input('instagram');
        $profile->user_id = $id;
        $profile->status = 1;
        $saved = $profile->save();


        if ($saved) {
            return response()->json([
                "status" => 'success',
                "message" => "Profile update successfully",
                "data" => [
                    "status" =>  $saved
                ]
            ]);
        } else {
            return response()->json([
                "status" => 'error',
                "message" => "Profile update failed",
                "data" => [
                    "status" =>  $saved
                ]
            ]);
        }
    }
}
