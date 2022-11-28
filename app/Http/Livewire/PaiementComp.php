<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Location;
use App\Models\Paiement;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class PaiementComp extends Component
{
    use WithFileUploads;
    use WithPagination;
    public $parPage = 10;
    public $isBtnListClicked = true;
    public $isBtnCreateClicked = false;
    public $isBtnEditClicked = false;
    public $search;
    public $paiement_id;
    public $datePaiement;
    public $location_id;
    public $user_id;
    public $montant;

    public function rules()
    {
        return [
            'location_id' => 'required',
            'user_id' => 'required',
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
    function goToAddPaiement()
    {
        $this->isBtnListClicked = false;
        $this->isBtnCreateClicked = true;
        $this->isBtnEditClicked = false;
    }
    public function goToListPaiement()
    {

        $this->isBtnListClicked = true;
        $this->isBtnCreateClicked = false;
        $this->isBtnEditClicked = false;
        $this->corbeille();
    }
    public function goToEditPaiement($paiement)
    {
        $this->paiement_id = $paiement['id'];
        $this->datePaiement = $paiement['datePaiement'];
        $this->montant = $paiement['montant'];
        $this->user_id = $paiement['user_id'];
        $this->location_id = $paiement['location_id'];

        $this->isBtnListClicked = false;
        $this->isBtnCreateClicked = false;
        $this->isBtnEditClicked = true;
    }
    public function corbeille()
    {
        $this->paiement_id = '';
        $this->datePaiement = '';
        $this->montant = '';
        $this->user_id = '';
        $this->location_id = '';
    }

    public function render()
    {

        return view('livewire.paiement.index', [
            'paiements' => Paiement::where('visible', 1)->paginate($this->parPage),
            'locations' => Location::leftJoin('paiements', 'locations.id', '=', 'paiements.location_id')->select('locations.*', 'paiements.montant as montantP', 'paiements.datePaiement')->whereNull('paiements.montant')->get()
        ])->extends('employe.layouts.paiement')->section('contenu');
    }




    public function showPicture($paiement_id, $location_id, $immatriculation, $montant, $name, $date, $photo)
    {
        $this->dispatchBrowserEvent("showPictureMessage", [
            "title" => 'Paiement N°:' . $paiement_id,
            "text" => "N° location:  $location_id \t Immatriculation de la voiture loué :  $immatriculation\n Montant : $montant\tPayé le : $date à $name",
            "imageAlt" => "photo id" . $paiement_id,
            "imageUrl" => $photo,
        ]);
    }
    public function addPaiement()
    {
        $validatedData = $this->validate();
        // dd([$validatedData['dateDebut'], $validatedData['dateFin'], date_diff(date_create($validatedData['dateDebut']), date_create($validatedData['dateFin']))]);

        $validatedData['montant'] = Location::find($validatedData['voiture_id'])->montant + Location::find($validatedData['voiture_id'])->cautiont;
        $validatedData['user_id'] = Auth::user()->id;
        $validatedData['datePaiement'] = now();
        $this->montant = $validatedData['montant'];
        $this->user_id = $validatedData['user_id'];
        $this->datePaiement = $validatedData['datePaiement'];
        $this->confirmCreate($validatedData);
    }
    public function confirmCreate($paiement)
    {
        $this->dispatchBrowserEvent(
            "showConfirmCreateMessage",
            [
                "Message" => "Le montant est " . $paiement['montant'] . " FCFA ! Voulez-vous vraiment enregistré?",
                "title" => "êtes-vous sûr?",
                "icon" => "warning",
                "data" => [
                    "data" => $paiement,
                ],
            ]
        );
    }
    public function createPaiement($paiement)
    {
        Paiement::create(
            $paiement
        );
        $this->dispatchBrowserEvent("showSuccessMessage", ["Message" => "Paiement enregistré avec succès!"]);
    }


    public function updatePaiement()
    {
        $validatedData = $this->validate();
        $paiement = Paiement::find($this->paiement_id);
        $paiement->datePaiement = now();
        $paiement->montant = Location::find($validatedData['voiture_id'])->montant + Location::find($validatedData['voiture_id'])->cautiont;
        $paiement->user_id = Auth::user()->id;
        $paiement->location_id = $validatedData['voiture_id'];
        $paiement->updated_at = now();
        $paiement->save();
        $this->dispatchBrowserEvent("showSuccessMessage", ["Message" => "Les informations du paiement ont été mise à jour avec succès!"]);
    }

    public function confirmDestroy($paiement_id)
    {
        $this->dispatchBrowserEvent(
            "showConfirmMessage",
            [
                "Message" => "Voulez-vous vraiment supprimer le paiement N° $paiement_id de la liste !",
                "title" => "êtes-vous sûr?",
                "icon" => "warning",
                "data" => [
                    "user_id" => $paiement_id,
                ],
            ]
        );
    }
    public function deletePaiement($paiement_id)
    {
        $paiement = Paiement::find($paiement_id);
        $paiement->visible = 0;
        $paiement->updated_at = now();
        $paiement->save();
        $this->dispatchBrowserEvent("showSuccessDesMessage", ["Message" => "Location supprimé avec succès!"]);
    }
}
