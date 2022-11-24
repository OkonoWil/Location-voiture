<?php

namespace App\Http\Livewire;

use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;

class ClientComp extends Component
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
        // dd(Client::where([
        //     ['name', 'like', '%' . $this->search . '%'],
        //     ['visible', '=', 0],
        // ])
        //     ->orWhere([
        //         ['lastName', 'like', '%' . $this->search . '%'],
        //         ['visible', '=', 0],
        //     ])
        //     ->paginate($this->parPage));
        //dd(Client::where('name', 'like', '%' . $this->search . '%')->orWhere('lastName', 'like', '%' . $this->search . '%')->paginate($this->parPage));
        return view('livewire.client.index', [
            "clients" => Client::where([
                ['name', 'like', '%' . $this->search . '%'],
                ['visible', '=', 1],
            ])
                ->orWhere([
                    ['lastName', 'like', '%' . $this->search . '%'],
                    ['visible', '=', 1],
                ])
                ->paginate($this->parPage)
        ])
            ->extends('employe.layouts.client')
            ->section('contenu');
    }
}
