<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contract;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
        return User::all();
    }

    public function approve(Request $request)
    {
        $user = User::where('id', '=', $request->uid)->firstOrFail();
        $user->active = 1;
        $user->save();
        return redirect()->back();
    }

    public function update(Request $request)
    {
        $user = User::where('email', '=', $request->email)->firstOrFail();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->city = $request->city;
        $user->email = $request->email;
        if(strlen($request->password) > 0)
        {
            $user->password = $request->password;
        }
    }

    public function delete(Request $request)
    {
        User::destroy($request->uid);
        return redirect()->back();
    }

}