<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Location;
use App\Models\Paiement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeController extends Controller
{
    function index()
    {
        $clients = Client::all()->where('user_id', Auth::user()->id)->sortByDesc('created_at')->take(5);
        $locations = Location::all()->where('user_id', Auth::user()->id)->sortByDesc('created_at')->take(5);
        $paiments = Paiement::all()->where('user_id', Auth::user()->id)->sortByDesc('created_at')->take(5);

        $employes = User::where('role_id', 2)->get();
        return view('employe.index', ['clients' => $clients, 'locations' => $locations, 'paiments' => $paiments, 'employes' => $employes]);
    }
}
