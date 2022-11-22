<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeController extends Controller
{
    function index()
    {
        return view('employe.index');
    }
}
