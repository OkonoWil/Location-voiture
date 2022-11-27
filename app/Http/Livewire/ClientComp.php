<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Client;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class ClientComp extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $parPage = 10;
    public $isBtnListClicked = true;
    public $isBtnCreateClicked = false;
    public $isBtnEditClicked = false;
    public $search;

    public $client_id;
    public $name;
    public $lastName;
    public $email;
    public $dateDeNaissance;
    public $lieuDeNaissance;
    public $nationalite;
    public $ville;
    public $pays;
    public $Adresse;
    public $sexe;
    public $pieceIdentite;
    public $numeroPieceIdentite;
    public $photo;
    public $phone1;
    public $phone2;
    public $user_id;


    protected $rules;
    public function rules()
    {
        if ($this->isBtnCreateClicked) {
            return [
                'name' => 'required',
                'lastName' => 'required',
                'dateDeNaissance' => 'required|date_format:Y-m-d',
                'lieuDeNaissance' => 'required',
                'nationalite' => 'required',
                'ville' => 'required',
                'pays' => 'required',
                'Adresse' => 'required',
                'sexe' => 'required',
                'email' => 'required|email|unique:clients,email',
                'phone1' => 'required|unique:clients,phone1|numeric|min_digits:8',
                'pieceIdentite' => 'required',
                'numeroPieceIdentite' => 'required|unique:clients,numeroPieceIdentite',
                'phone2' => 'nullable|numeric|min_digits:8',
                'photo' => 'required|image|max:1024',
            ];
        }
        return [
            'name' => 'required',
            'lastName' => 'required',
            'email' => ['required', 'email', Rule::unique("clients")->ignore($this->client_id)],
            'dateDeNaissance' => 'required|date_format:Y-m-d',
            'lieuDeNaissance' => 'required',
            'nationalite' => 'required',
            'ville' => 'required',
            'pays' => 'required',
            'Adresse' => 'required',
            'sexe' => 'required',
            'phone1' => ['required', Rule::unique("clients")->ignore($this->client_id)],
            'pieceIdentite' => 'required',
            'numeroPieceIdentite' => ['required', Rule::unique("clients")->ignore($this->client_id)],
            'phone2' => 'nullable|numeric|min_digits:8',
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
    function goToAddClient()
    {
        $this->isBtnListClicked = false;
        $this->isBtnCreateClicked = true;
        $this->isBtnEditClicked = false;
    }
    public function goToListClient()
    {

        $this->isBtnListClicked = true;
        $this->isBtnCreateClicked = false;
        $this->isBtnEditClicked = false;
    }
    public function goToEditClient($client)
    {
        $this->client_id = $client['id'];
        $this->name = $client['name'];
        $this->lastName = $client['lastName'];
        $this->dateDeNaissance = $client['dateDeNaissance'];
        $this->lieuDeNaissance = $client['lieuDeNaissance'];
        $this->nationalite = $client['nationalite'];
        $this->ville = $client['ville'];
        $this->pays = $client['pays'];
        $this->Adresse = $client['Adresse'];
        $this->sexe = $client['sexe'];
        $this->email = $client['email'];
        $this->phone1 = $client['phone1'];
        $this->pieceIdentite = $client['pieceIdentite'];
        $this->numeroPieceIdentite = $client['numeroPieceIdentite'];
        $this->phone2 = $client['phone2'];
        $this->current_user = $client;

        $this->isBtnListClicked = false;
        $this->isBtnCreateClicked = false;
        $this->isBtnEditClicked = true;
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
            "users" => User::all(),
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


    public function addClient()
    {
        $validatedData = $this->validate();
        $filename = 'client' . Client::latest()->first()->id + 1 . '.' . $validatedData['photo']->extension();
        $path = $validatedData['photo']->storeAs(
            'clients',
            $filename,
            'public'
        );
        $validatedData['photo'] = $path;
        $validatedData['user_id'] = Auth::user()->id;
        Client::create(
            $validatedData
        );

        $this->dispatchBrowserEvent("showSuccessMessage", ["Message" => "Client créé avec succès!"]);
    }

    public function corbeille()
    {
        $this->client_id = '';
        $this->name = '';
        $this->lastName = '';
        $this->dateDeNaissance = '';
        $this->lieuDeNaissance = '';
        $this->nationalite = '';
        $this->ville = '';
        $this->pays = '';
        $this->Adresse = '';
        $this->sexe = '';
        $this->email = '';
        $this->phone1 = '';
        $this->photo = '';
        $this->pieceIdentite = '';
        $this->numeroPieceIdentite = '';
        $this->phone2 = '';
    }
    public function updateClient()
    {
        $validatedData = $this->validate();
        $client = Client::find($this->client_id);
        $client->name = $validatedData['name'];
        $client->lastName = $validatedData['lastName'];
        $client->dateDeNaissance = $validatedData['dateDeNaissance'];
        $client->lieuDeNaissance = $validatedData['lieuDeNaissance'];
        $client->nationalite = $validatedData['nationalite'];
        $client->ville = $validatedData['ville'];
        $client->pays = $validatedData['pays'];
        $client->Adresse = $validatedData['Adresse'];
        $client->sexe = $validatedData['sexe'];
        $client->email = $validatedData['email'];
        $client->phone1 = $validatedData['phone1'];
        $client->pieceIdentite = $validatedData['pieceIdentite'];
        $client->numeroPieceIdentite = $validatedData['numeroPieceIdentite'];
        $client->phone2 = $validatedData['phone2'];
        $client->updated_at = now();
        $client->save();
        $this->dispatchBrowserEvent("showSuccessMessage", ["Message" => "Les informations du client ont été mise à jour avec succès!"]);
    }

    public function confirmDestroy($name, $client_id)
    {
        $this->dispatchBrowserEvent(
            "showConfirmMessage",
            [
                "Message" => "Voulez-vous vraiment supprimer l'client $name de la liste !",
                "title" => "êtes-vous sûr?",
                "icon" => "warning",
                "data" => [
                    "user_id" => $client_id,
                ],
            ]
        );
    }
    public function deleteUser($user_id)
    {
        $client = Client::find($user_id);
        $client->visible = 0;
        $client->updated_at = now();
        $client->save();
        $this->dispatchBrowserEvent("showSuccessDesMessage", ["Message" => "Client supprimé avec succès!"]);
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
    public function updatePicture()
    {
        $validatedData = $this->validate(['photo' => 'required|image|max:1024',]);
        $filename = 'client' . Client::latest()->first()->id + 1 . '.' . $validatedData['photo']->extension();
        $path = $validatedData['photo']->storeAs(
            'clients',
            $filename,
            'public'
        );
        $client = Client::find($this->client_id);
        $client->photo = $path;
        $client->updated_at = now();
        $client->save();
        $this->dispatchBrowserEvent("showSuccessMessage", ["Message" => "Photo de profil mise à jour avec succès!"]);
    }
}
