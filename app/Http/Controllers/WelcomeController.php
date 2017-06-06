<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Contact;

class WelcomeController extends Controller
{
    public function sendContact(Request $request)
    {
        $user = User::where('email', '=', $request->email)->get();
        if( sizeof($user) === 1){
            $contact = new Contact([
                'name' => $request->name,
                'message' => $request->message,
                'email' => $request->email
            ]);
            $contact->save();
            return view('welcome');
        }
        else
            return view('contact-register');

    }
}
