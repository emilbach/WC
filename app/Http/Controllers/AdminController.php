<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::select('id','first_name', 'last_name', 'address', 'city', 'email','created_at')->where('active', '!=', '1')->orderBy('id', 'desc')->get();
        return view('admin', compact('users'));
    }
}
