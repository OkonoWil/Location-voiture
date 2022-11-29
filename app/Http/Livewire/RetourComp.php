<?php

namespace App\Http\Livewire;

use App\Models\Etat;
use App\Models\Retour;
use Livewire\Component;
use App\Models\Location;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class RetourComp extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $parPage = 10;
    public $isBtnListClicked = true;
    public $isBtnCreateClicked = false;
    public $isBtnEditClicked = false;
    public $retour_id;
    public $dateRetour;
    public $client_id;
    public $user_id;
    public $location_id;
    public $etat_id;

    public function rules()
    {
        return [
            'location_id' => 'required',
            'user_id' => 'required',
            'etat_id' => 'required',
        ];
    }
    // public $retours;

    // public function mount()
    // {
    //     $this->retours = Retour::all();
    // }  ];



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
    function goToAddRetour()
    {
        $this->user_id = Auth::user()->id;
        $this->isBtnListClicked = false;
        $this->isBtnCreateClicked = true;
        $this->isBtnEditClicked = false;
    }
    public function goToListRetour()
    {

        $this->isBtnListClicked = true;
        $this->isBtnCreateClicked = false;
        $this->isBtnEditClicked = false;
        $this->corbeille();
    }
    public function corbeille()
    {
        $this->retour_id = '';
        $this->dateRetour = '';
        $this->user_id = '';
        $this->client_id = '';
        $this->location_id = '';
    }
    public function render()
    {
        // dd(Location::leftJoin('retours', 'locations.id', '=', 'retours.location_id')
        //     ->join('voitures', 'locations.voiture_id', '=', 'voitures.id')
        //     ->select('locations.*', 'retours.location_id as location', 'retours.dateRetour as date', 'voitures.immatriculation as im')
        //     ->where('disponible', '0')
        //     ->where('locations.created_at', '>', '2022-11-28 20:30:33')
        //     ->whereNull('retours.location_id')->get());
        return view('livewire.retour.index', [
            'retours' => Retour::where('visible', 1)->orderByDesc('retours.id')->paginate($this->parPage),
            'etats' => Etat::where('visible', 1)->get(),
            'locations' => Location::leftJoin('retours', 'locations.id', '=', 'retours.location_id')
                ->join('voitures', 'locations.voiture_id', '=', 'voitures.id')
                ->select('locations.*', 'retours.location_id as location', 'retours.dateRetour as date', 'voitures.immatriculation as im')
                ->where('disponible', '0')
                ->where('locations.created_at', '>', '2022-11-28 20:30:33')
                ->whereNull('retours.location_id')->get()
        ])->extends('technicien.layouts.retour')->section('contenu');
    }

    public function showPicture($retour_id, $location_id, $immatriculation, $montant, $name, $date, $photo)
    {
        $this->dispatchBrowserEvent("showPictureMessage", [
            "title" => 'Retour N°:' . $retour_id,
            "text" => "N° location:  $location_id \t Immatriculation de la voiture loué :  $immatriculation\n Montant retenu: $montant\t enregistré le : $date à $name",
            "imageAlt" => "photo id" . $retour_id,
            "imageUrl" => $photo,
        ]);
    }

    //Create
    public function addRetour()
    {
        $validatedData = $this->validate();
        //dd($validatedData);
        // dd([$validatedData['dateDebut'], $validatedData['dateFin'], date_diff(date_create($validatedData['dateDebut']), date_create($validatedData['dateFin']))]);
        //dd([Location::find($validatedData['location_id'])->montant + Location::find($validatedData['location_id'])->caution, Location::find($validatedData['location_id'])->montant, Location::find($validatedData['location_id'])->caution]);
        //$validatedData['montant'] = Location::find($validatedData['location_id'])->montant + Location::find($validatedData['location_id'])->caution;
        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['client_id'] = Location::find($validatedData['location_id'])->client_id;
        $validatedData['dateRetour'] = now()->format('Y-m-d H:i:s');
        $this->user_id = $validatedData['user_id'];
        $this->datePaiement = $validatedData['dateRetour'];
        $this->confirmCreate($validatedData);
    }
    public function confirmCreate($retour)
    {
        $this->dispatchBrowserEvent(
            "showConfirmCreateMessage",
            [
                "Message" => "L'etat est  " . Etat::find($retour['etat_id'])->nomEtat . " le montant retenu est " . Etat::find($retour['etat_id'])->montantDegat  * Location::find($retour['location_id'])->caution . " FCFA ! Voulez-vous vraiment enregistré?",
                "title" => "êtes-vous sûr?",
                "icon" => "warning",
                "data" => [
                    "data" => $retour,
                ],
            ]
        );
    }
    public function createPaiement($retour)
    {
        Retour::create(
            $retour
        );
        $this->dispatchBrowserEvent("showSuccessMessage", ["Message" => "Retour enregistré avec succès!"]);
    }


    //Update

    public function confirmDestroy($retour_id)
    {
        $this->dispatchBrowserEvent(
            "showConfirmMessage",
            [
                "Message" => "Voulez-vous vraiment supprimer le retour N° $retour_id de la liste !",
                "title" => "êtes-vous sûr?",
                "icon" => "warning",
                "data" => [
                    "user_id" => $retour_id,
                ],
            ]
        );
    }
    public function deletePaiement($retour_id)
    {
        $paiement = Retour::find($retour_id);
        $paiement->visible = 0;
        $paiement->updated_at = now();
        $paiement->save();
        $this->dispatchBrowserEvent("showSuccessDesMessage", ["Message" => "Retour supprimé avec succès!"]);
    }
}
