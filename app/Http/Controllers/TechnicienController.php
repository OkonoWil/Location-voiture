<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etat;
use App\Models\Voiture;

class TechnicienController extends Controller
{
    function index()
    {
        $notDisponible = Voiture::where('disponible', 0)->count();
        $disponible = Voiture::where('disponible', 1)->count();
        $technicien = User::where('role_id', 3)->get();
        $etats = Etat::all();
        //$recettes2 = Location::where('validation', 1)->latest()->take(5)->get(['id', 'name', 'image', 'duree', 'vue', 'user_id']);
        return view('technicien.index', ['etats' => $etats, 'notDisponible' => $notDisponible, 'disponible' => $disponible, 'techniciens' => $technicien]);
    }
}
