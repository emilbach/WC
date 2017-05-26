<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

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
        //$user = User::find($request->uid);
        $user->active = 1;
        $user->save();
        return redirect()->back();
    }

    public function delete(Request $request)
    {
        User::destroy($request->uid);
        return redirect()->back();
    }
}
