<?php

namespace App\Http\Livewire;

use App\Models\Retour;
use Livewire\Component;
use Livewire\WithPagination;

class RetourComp extends Component
{
    use WithPagination;
    public $parPage = 10;

    // public $retours;

    // public function mount()
    // {
    //     $this->retours = Retour::all();
    // }

    public function updatingParPage()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.retour.index', ['retours' => Retour::where('visible', 1)->paginate($this->parPage)])->extends('technicien.layouts.retour')->section('contenu');
    }
}
