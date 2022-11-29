<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client;
use App\Models\Voiture;
use App\Models\Location;
use App\Models\Marque;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    function index()
    {
        // $g = Voiture::join('marques', 'marques.id', '=', 'voitures.marque_id')
        //     ->join('locations', 'voitures.id', '=', 'locations.voiture_id')
        //     ->groupBy('marques.nomMarque')
        //     ->selectRaw('sum(locations.montant) as sum, marques.nomMarque as marq')
        //     ->get();
        // dd($g[0]->sum);
        $voitures = Voiture::where('disponible', 0)->get();
        $nbVoiture = Voiture::all()->count();
        $nbEmploye = User::all()->count() - 1;
        $nbClient = Client::all()->count();
        //$recettes2 = Location::where('validation', 1)->latest()->take(5)->get(['id', 'name', 'image', 'duree', 'vue', 'user_id']);
        return view('admin.index', [
            'voitures' => $voitures,
            'nbC' => $nbClient,
            'nbV' => $nbVoiture,
            'nbE' => $nbEmploye,
            'marques' => Voiture::join('marques', 'marques.id', '=', 'voitures.marque_id')
                ->join('locations', 'voitures.id', '=', 'locations.voiture_id')
                ->groupBy('marques.nomMarque')
                ->selectRaw('sum(locations.montant) as sum, marques.nomMarque as marq')
                ->get(),
        ]);
    }
}
