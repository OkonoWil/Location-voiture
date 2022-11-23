<?php

namespace App\Http\Livewire;

use App\Models\Retour;
use Livewire\Component;
use Livewire\WithPagination;

class RetoursList extends Component
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
        return view('livewire.retours-list', ['retours' => Retour::paginate($this->parPage)]);
    }
}
