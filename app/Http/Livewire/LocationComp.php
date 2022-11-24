<?php

namespace App\Http\Livewire;

use App\Models\Location;
use Livewire\Component;
use Livewire\WithPagination;

class LocationComp extends Component
{
    use WithPagination;
    public $parPage = 10;
    public $search;
    //Mise à jour de l'afffichage par page
    public function updatingParPage()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.location.index', [
            "locations" => Location::where('visible', 1)->paginate($this->parPage)
        ])
            ->extends('employe.layouts.location')
            ->section('contenu');
    }
}
