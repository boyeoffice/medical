<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Hash;
use Auth;

class ProfileController extends Controller
{
    public function updateProfile(Request $request)
    {
    	$input = Auth::id();
        $user = User::find($input);
        $this->validate($request, [
            'name' => 'required|string|max:20',
            'username' => 'required|min:3|max:10|unique:users,username,'.$input,
            'email' => 'required|email|unique:users,email,'.$input
        ]);
        if (! empty($request->password) && $user && Hash::check($request->old_password, $user->password)) {
            $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
            ]);
            $password = Hash::make($request->password);
        }else if($request->password === null){
            $password = $user->password;
        }else{
            return response()->json(['old_password' => ['The current password is incorrect']], 422);
        }
        $user->username = $request->username;
        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = $password;
        $user->update();
        return response()->json(['saved' => true]);
    }
}
