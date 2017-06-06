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
        //echo json_encode($contracts);
        $billings = Billing::where('email', $email)->get();
        $measurements = Measuring::where('email', $email)->get();
        return view('home', compact('contracts', 'billings', 'measurements'));
    }
    public function updateUserInfo(Request $request)
    {
        User::where('email', '=', Auth::user()->email)->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'address' => $request->address,
            'city' => $request->city
        ]);
        return redirect()->back();
    }
}
