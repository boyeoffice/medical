<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Http\Requests\CreateUser;
use App\Http\Requests\UpdateUser;
use Hash;
use App\Profile;
use Excel;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::filterPaginateOrder();
        return response()->json(['model' => $users]);
    }

    public function getUsers(Request $request)
    {
        $input =  $request->search;
        $user = User::where('name', 'LIKE', '%'.$input.'%')->take(5)->get();
        return response()->json($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateUser $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->user_type = $request->user_type;
        $user->password = Hash::make($request->password);
        $user->status = $request->status;
        $user->save();

        $profile = new Profile();
        $profile->user_id = $user->id;
        $profile->save();
        return response()->json(['success' => true]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update_id = $request->id;
        $this->validate($request,[
            'email' => 'required|email|unique:users,email,'.$update_id,
            'username' => 'required|string|min:3|max:100|unique:users,username,'.$update_id,
    ]);
        $user = User::find($id);

        if($request->password === null){
            $password = $user->password;
        }else{
            $password = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->is_admin = $request->is_admin;
        $user->password = $password;
        $user->user_type = $request->user_type;
        $user->status = $request->status;
        $user->update();
        return response()->json(['success' => true]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['success' => true]);
    }
    public function csv()
    {
        Excel::create('clients', function($excel){
            $excel->sheet('clients', function($sheet){
                $sheet->loadView('excel');
                $sheet->setOrientation('landscape');
            });
        })->export('xlsx');
    }
}
