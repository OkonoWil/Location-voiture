<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function welcome()
    {
        return view('home.welcome');
    }
    function getContact()
    {
        return view('home.contact');
    }
    function postContact(Request $request)
    {
        $this->validate($request, [
            'name' => ['required'],
            'email' => ['required'],
            'tel' => ['required'],
            'message' => ['required', 'min:20']
        ]);
        $emailMessage = "Nom :  $request->name \t Email :  $request->email \t Tel :  $request->tel  \n\n$request->message";
        mail('okonowilfried@gmail.com', 'Laracar contact page', $emailMessage);
        return redirect()->route('welcome');
    }
}
