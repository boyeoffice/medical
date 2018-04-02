<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class ProfileController extends Controller
{
    public function updateProfile(Request $request)
    {
    	$input = $request->id;
    	$this->validate($request, [
    		'name' => 'required|string|max:20',
    		'username' => 'required|min:3|max:10|unique:users,username,'.$input,
    		'email' => 'required|email|unique:users,email,'.$input
    	]);
    	$user = User::find($input);
    	$user->username = $request->username;
    	$user->email = $request->email;
    	$user->name = $request->name;
    	$user->update();
    	return response()->json(['saved' => true]);
    }
}
