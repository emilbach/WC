<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contract;
use App\Billing;
use App\Measuring;

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

        return view('admin', compact('users', 'approved_users'));
    }
    public function contract($email)
    {
        $contract = Contract::where('email', '=', $email)->get();
        return view('admin-contract', compact('contract', 'email'));
    }

    public function updateContract(Request $request)
    {
        Contract::where('email', '=', $request->email)->update(['contract_no' => $request->contract_no, 'old_contract_no' => $request->old_contract_no, 'contract_type' => $request->contract_type, 'starting_date' => $request->starting_date, 'suspension_date' => $request->suspension_date, 'closing_date' => $request->closing_date, 'status' => $request->status]);
        return redirect()->back();
    }

    public function bill($email)
    {
        $bill = Billing::where('email', '=', $email)->get();
        return view('admin-bill', compact('bill', 'email'));
    }

    public function addBill(Request $request, $email)
    {
        $bill = new Billing([
            'pay_method' => $request->pay_method,
            'default_value' => $request->default_value,
            'consumption' => $request->consumption,
            'consumption_a_forfait' => $request->consumption_a_forfait,
            'email' => $email
        ]);
        $bill->save();
        return redirect()->back();
    }
    public function updateBill(Request $request)
    {
        Billing::where('email', '=', $request->email)->update([
            'pay_method' => $request->pay_method,
            'default_value' => $request->default_value,
            'consumption' => $request->consumption,
            'consumption_a_forfait' => $request->consumption_a_forfait
        ]);
        return redirect()->back();
    }

    public function measurement($email)
    {
        $measurement = Measuring::where('email', '=', $email)->get();
        return view('admin-measurement', compact('measurement'));
    }
}
