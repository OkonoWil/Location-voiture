<?php

namespace App\Http\Livewire;

use App\Models\Voiture;
use Livewire\Component;
use Livewire\WithPagination;

class VoitureComp extends Component
{
    use WithPagination;
    public $parPage = 10;
    public $search;
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