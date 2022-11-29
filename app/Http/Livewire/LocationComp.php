<?php

namespace App\Http\Livewire;

use App\Models\Client;
use App\Models\Voiture;
use Livewire\Component;
use App\Models\Location;
use DateTime;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class LocationComp extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $parPage = 10;
    public $isBtnListClicked = true;
    public $isBtnCreateClicked = false;
    public $isBtnEditClicked = false;
    public $search;
    public $location_id;
    public $dateDebut;
    public $dateFin;
    public $montant;
    public $caution;
    public $client_id;
    public $user_id;
    public $voiture_id;

    public function rules()
    {
        if ($this->isBtnCreateClicked) {
            return [

                'montant' => 'required',
                'caution' => 'required',
                'client_id' => 'required',
                'user_id' => 'required',
                'voiture_id' => 'required',
            ];
        }
        return [
            'dateDebut' => 'required|date_format:Y-m-d',
            'dateFin' => 'required|date_format:Y-m-d',
            'montant' => 'required',
            'caution' => 'required',
            'client_id' => 'required',
            'voiture_id' => 'required',
        ];
    }

    //Mise à jour de l'afffichage par page
    public function updatingParPage()
    {
        $this->resetPage();
    }
    public function updatingIsBtnListClicked()
    {
        $this->resetPage();
    }
    public function updatingIsBtnEditClicked()
    {
        $this->resetPage();
    }
    public function updatingIsBtnCreateClicked()
    {
        $this->resetPage();
    }

    //Navigation entre les vues
    function goToAddLocation()
    {
        $this->isBtnListClicked = false;
        $this->isBtnCreateClicked = true;
        $this->isBtnEditClicked = false;
    }
    public function goToListLocation()
    {

        $this->isBtnListClicked = true;
        $this->isBtnCreateClicked = false;
        $this->isBtnEditClicked = false;
        $this->corbeille();
    }
    public function goToEditLocation($location)
    {
        $this->location_id = $location['id'];
        $this->dateDebut = $location['dateDebut'];
        $this->dateFin = $location['dateFin'];
        $this->montant = $location['montant'];
        $this->caution = $location['caution'];
        $this->client_id = $location['client_id'];
        $this->user_id = $location['user_id'];

        $this->isBtnListClicked = false;
        $this->isBtnCreateClicked = false;
        $this->isBtnEditClicked = true;
    }
    public function corbeille()
    {
        $this->location_id = '';
        $this->dateDebut = '';
        $this->dateFin = '';
        $this->montant = '';
        $this->caution = '';
        $this->client_id = '';
        $this->user_id = '';
    }

    public function render()
    {
        // $d = new DateTime('2022-12-11 12:12:00');
        // $f = new DateTime('2022-11-15 12:12:00');
        // dd($d->diff($f)->days);
        // dd(Voiture::find(5)->tarifParJour * ($d->diff($f->dateDebut)));
        return view('livewire.location.index', [
            "locations" => Location::where([
                ['name', 'like', '%' . $this->search . '%'],
                ['locations.visible', '=', 1],
            ])->orWhere([
                ['lastName', 'like', '%' . $this->search . '%'],
                ['locations.visible', '=', 1],
            ])->join('clients', 'clients.id', '=', 'locations.client_id')
                ->join('voitures', 'voitures.id', '=', 'locations.voiture_id')
                ->select('locations.*', 'voitures.immatriculation', 'voitures.photo', 'clients.name', 'clients.lastName')->orderByDesc('id')->paginate($this->parPage),
            "voitures" => Voiture::where('visible', 1)->get(),
            "clients" => Client::where('visible', 1)->get()
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
    public function addLocation()
    {
        $validatedData = $this->validate(
            [
                'dateDebut' => 'required',
                'dateFin' => 'required',
                'voiture_id' => 'required',
                'client_id' => 'required',
            ]
        );
        // dd([$validatedData['dateDebut'], $validatedData['dateFin'], date_diff(date_create($validatedData['dateDebut']), date_create($validatedData['dateFin']))]);
        if (date_create($validatedData['dateDebut']) >= now()  && date_create($validatedData['dateDebut']) < date_create($validatedData['dateFin'])) {
            $validatedData['montant'] = Voiture::find($validatedData['voiture_id'])->tarifParJour * (date_diff(date_create($validatedData['dateDebut']), date_create($validatedData['dateFin']))->days);
            $validatedData['caution'] = $validatedData['montant'] * 0.5;
            $validatedData['user_id'] = Auth::user()->id;
            $this->montant = $validatedData['montant'];
            $this->caution = $validatedData['caution'];
            $this->confirmCreate($validatedData);
        } else {
            $this->dispatchBrowserEvent("showErrorsMessage", ["Message" => "Les informations de la location sont incorrecte! Vérifier les dates"]);
        }
    }
    public function updateLocation()
    {
        $validatedData = $this->validate();
        $voiture = Location::find($this->location_id);
        if (date_create($validatedData['dateDebut']) >= now()  && date_create($validatedData['dateDebut']) < date_create($validatedData['dateFin'])) {
            $voiture->dateDebut = $validatedData['dateDebut'];
            $voiture->dateFin = $validatedData['dateFin'];
            $voiture->montant =  $validatedData['montant'];
            $voiture->caution = $validatedData['caution'];
            $voiture->client_id = $validatedData['client_id'];
            $voiture->voiture_id = $validatedData['voiture_id'];
            $voiture->user_id = Auth::user()->id;
            $voiture->updated_at = now();
            $voiture->save();
            $this->dispatchBrowserEvent("showSuccessMessage", ["Message" => "Les informations de la location ont été mise à jour avec succès!"]);
        } else {
            $this->dispatchBrowserEvent("showErrorsMessage", ["Message" => "Les informations de la location sont incorrecte! Vérifier les dates"]);
        }
    }
    public function confirmCreate($name)
    {
        $this->dispatchBrowserEvent(
            "showConfirmCreateMessage",
            [
                "Message" => "Le montant est " . $name['montant'] . " FCFA et la caution est " . $name['caution'] . "! Voulez-vous vraiment enregistré?",
                "title" => "êtes-vous sûr?",
                "icon" => "warning",
                "data" => [
                    "data" => $name,
                ],
            ]
        );
    }
    public function createLocation($location)
    {
        Location::create(
            $location
        );
        $voiture = Voiture::find($location['voiture_id']);
        $voiture->disponible = 0;
        $voiture->save();

        $this->dispatchBrowserEvent("showSuccessMessage", ["Message" => "Location enregistré avec succès!"]);
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
    public function deleteLocation($location_id)
    {
        $location = Location::find($location_id);
        $location->visible = 0;
        $location->updated_at = now();
        $location->save();
        $this->dispatchBrowserEvent("showSuccessDesMessage", ["Message" => "Location supprimé avec succès!"]);
    }
}
