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
            ])->join('clients', 'clients.id', '=', 'locations.client_id')
                ->join('voitures', 'voitures.id', '=', 'locations.voiture_id')
                ->select('locations.*', 'voitures.immatriculation', 'voitures.photo', 'clients.name', 'clients.lastName')->orderBy('id')->paginate($this->parPage)
        ])
            ->extends('employe.layouts.location')
            ->section('contenu');
    }


    public function showPicture($name, $user, $photo, $id)
    {
        $this->dispatchBrowserEvent("showPictureMessage", [
            "title" => $name,
            "text" => $user,
            "imageAlt" => "photo id" . $id,
            "imageUrl" => $photo,
        ]);
    }

    public function confirmDestroy($name, $location_id)
    {
        $this->dispatchBrowserEvent(
            "showConfirmMessage",
            [
                "Message" => "Voulez-vous vraiment supprimer la location N° $location_id de la liste !",
                "title" => "êtes-vous sûr?",
                "icon" => "warning",
                "data" => [
                    "user_id" => $location_id,
                ],
            ]
        );
    }
    public function deleteUser($location_id)
    {
        $location = Location::find($location_id);
        $location->visible = 0;
        $location->updated_at = now();
        $location->save();
        $this->dispatchBrowserEvent("showSuccessDesMessage", ["Message" => "Location supprimé avec succès!"]);
    }
}
