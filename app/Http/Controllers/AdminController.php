<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contract;
use App\Billing;
use App\Measuring;
use Laracasts\Utilities\JavaScript;

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
        $approved_users = User::select('id','first_name', 'last_name', 'address', 'city', 'email','created_at')->where('active', '=', '1')->orderBy('id', 'desc')->get();
        /*foreach ($approved_users as $ap){
            $contracts = Contract::where('email', $ap->email)->get();
            $billings = Billing::where('email', $ap->email)->get();
            $measurements = Measuring::where('email', $ap->email)->get();
        }*/

        return view('admin', compact('users', 'approved_users')); //, 'contracts', 'billings', 'measurements'
    }
    public function contract($email)
    {
        $contract = Contract::where('email', '=', $email)->get();
        /*JavaScript\JavaScriptFacade::put([
            'cont' =>  json_encode(Contract::where('email', '=', $email)->get())
        ]);*/
        return view('admin-contract', compact('contract'));
    }

    public function bill($email)
    {
        $bill = Billing::where('email', '=', $email)->get();
        return view('admin-bill', compact('bill'));
    }

    public function measurement($email)
    {
        $measurement = Measuring::where('email', '=', $email)->get();
        return view('admin-measurement', compact('measurement'));
    }
}
