<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();
        return view('admin.users.index',
            [
               'users' => $users
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $request = $request;
        $user = User::create([
        'remember_token' => $request['_token'],
        'name' => $request['name'],
        'f_name' => $request['f_name'],
        's_name' => $request['s_name'],
        'l_name' => $request['l_name'],
        'email' => $request['email'],
        'password' =>Hash::make($request['password']),
        'role' => $request['role']
        ]);
        if($user==true)
        {
            return redirect()->route('users.index');
        }
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
        $user = User::getOne($id);
        return view('admin.users.edit',[
            'user' => $user
        ]);
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
        $user = User::getOne($id);
        $user->name = $request->name;
        $user->f_name = $request->f_name;
        $user->s_name = $request->s_name;
        $user->l_name = $request->l_name;
        $user->email = $request->email;
/*        $user->password = Hash::make($request['password']);*/
        $user->role = $request->role;
        $user->save();
        if($user == true)
        {
            return redirect()->route('users.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::destroy($id);
        if($user == true)
        {
            return redirect()->route('users.index');
        }
    }
}
