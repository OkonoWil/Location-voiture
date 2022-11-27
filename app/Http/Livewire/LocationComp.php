<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Location;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

class LocationComp extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $parPage = 10;
    public $isBtnListClicked = true;
    public $isBtnCreateClicked = false;
    public $isBtnEditClicked = false;
    public $search;
    //Mise à jour de l'afffichage par page
    public function updatingParPage()
    {
        $this->resetPage();
    }
    public function render()
    {


        return view('livewire.location.index', [
            "locations" => Location::where([
                ['name', 'like', '%' . $this->search . '%'],
                ['locations.visible', '=', 1],
            ])->orWhere([
                ['lastName', 'like', '%' . $this->search . '%'],
                ['locations.visible', '=', 1],
            ])->join('clients', 'clients.id', '=', 'locations.user_id')
                ->join('voitures', 'voitures.id', '=', 'locations.voiture_id')
                ->select('locations.*', 'voitures.immatriculation', 'clients.name', 'clients.lastName')->paginate($this->parPage)
        ])
            ->extends('employe.layouts.location')
            ->section('contenu');
    }
}
