<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use App\User;
use Auth;
use Hash;
use App\Consult;
use App\Admission;
use App\Http\Requests\CreateAdmission;
use App\Http\Requests\UpdateAdmission;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
    public function Setting()
    {
        $setting = Setting::first();
        return $setting;
     }
     public function password(Request $request)
     {
        $this->validate($request, [
            'old_password' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ]);
        $update_id = Auth::id();
        $user = User::find($update_id);
        if($user && Hash::check($request->old_password, $user->password)){
            $user->password = bcrypt($request->password);
            $user->save();
            return response()->json(['success' => true]);
        }
        return response()->json(['old_password' => ['Incorrect password']], 422);
     }
     public function updateProfile(Request $request)
     {
        $update_id = $request->id;
        $this->validate($request, [
            'username' => 'required|string|min:3|unique:users,username,'.$update_id,
            'email' => 'required|string|email|unique:users,username,'.$update_id,
            'name' => 'required|string'
        ]);
        $user = User::find($update_id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->update();

        return response()->json(['success' => true]);
     }
     /** Get all admissions from database **/
     public function getAdmissions()
     {
        $admission = Admission::filterPaginateOrder();
        return response()->json(['model' => $admission]);
     }
     /** Store data in storage **/
     public function storeAdmission(CreateAdmission $request)
     {
        $admission = $request->all();
        Admission::create($admission);
        return response()->json(['saved' => true]);
     }
}
