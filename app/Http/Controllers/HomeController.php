<?php

namespace App\Http\Controllers;

use Illuminate\Auth\Authenticatable;
use Illuminate\Http\Request;
use App\User;
use App\Contract;
use App\Billing;
use App\Measuring;
use Illuminate\Support\Facades\Auth;

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
        $email = Auth::user()->email;
        $contracts = Contract::where('email', $email)->get();
        $billings = Billing::where('email', $email)->get();
        $measurements = Measuring::where('email', $email)->get();
        return view('home', compact('contracts', 'billings', 'measurements'));
    }
}
