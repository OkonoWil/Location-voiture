<?php

namespace App\Http\Livewire;

use App\Models\Voiture;
use Livewire\Component;
use Livewire\WithPagination;

class VoitureComp extends Component
{
    use WithPagination;
    public $isBtnListClicked = true;
    public $isBtnCreateClicked = false;
    public $isBtnEditClicked = false;
    public $parPage = 10;
    public $search;
    public $voiture_id;
    public $modele;
    public $immatriculation;
    public $numeroSerie;
    public $couleur;
    public $photo;
    public $dateDeFabri;
    public $nombrePlace;
    public $tarifParJour;
    public $disponible;
    public function updatingParPage()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.voiture.index', ['voitures' => Voiture::where([
            ['visible', '=', '1'],
            ['immatriculation', 'like', '%' . $this->search . '%'],
        ])->paginate($this->parPage)])->extends('admin.layouts.voiture')->section('contenu');
    }
}
