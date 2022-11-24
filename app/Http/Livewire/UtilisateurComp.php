<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UtilisateurComp extends Component
{
    use WithPagination;
    public $parPage = 10;

    //Mise à jour de l'afffichage par page
    public function updatingParPage()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.utilisateur.index', [
            "users" => User::paginate($this->parPage)
        ])
            ->extends('admin.layouts.utilisateur')
            ->section('contenu');
    }
}
