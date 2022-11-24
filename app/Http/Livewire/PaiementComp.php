<?php

namespace App\Http\Livewire;

use App\Models\Paiement;
use Livewire\Component;
use Livewire\WithPagination;

class PaiementComp extends Component
{
    use WithPagination;
    public $parPage = 10;
    public function render()
    {
        return view('livewire.paiement.index', ['paiements' => Paiement::where('visible', 1)->paginate($this->parPage)])->extends('employe.layouts.paiement')->section('contenu');
    }
}
