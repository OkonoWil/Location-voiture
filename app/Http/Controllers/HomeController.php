<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    function welcome()
    {
        return redirect()->route('getlogin');
    }
    function getContact()
    {
        return view('home.contact');
    }
    function postContact()
    {
    }
}
