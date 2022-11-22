<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeController extends Controller
{
    function index()
    {
        // $voitures = Voiture::where('disponible', 0)->get();
        // $nbVoiture = Voiture::all()->count();
        // $nbEmploye = User::all()->count() - 1;
        // $nbClient = Client::all()->count();
        //$recettes2 = Location::where('validation', 1)->latest()->take(5)->get(['id', 'name', 'image', 'duree', 'vue', 'user_id']);
        return view('employe.index');
    }
}
