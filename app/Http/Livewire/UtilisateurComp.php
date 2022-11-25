<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UtilisateurComp extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $parPage = 10;
    public $isBtnAddClicked = false;
    public $search;
    public $newUser = [];

    public $name;
    public $lastName;
    public $email;
    public $username;
    public $role_id;
    public $sexe;
    public $photo;
    public $phone1;
    public $phone2;
    public $salaire;
    protected $rules = [
        'name' => 'required',
        'lastName' => 'required',
        'email' => 'required|email|unique:users,email',
        'username' => 'required|unique:users,username',
        'role_id' => 'required',
        'sexe' => 'required',
        'photo' => 'required|image|max:1024',
        'phone1' => 'required|numeric|min_digits:8',
        'phone2' => 'nullable|numeric|min_digits:8',
        'salaire' => 'required|numeric|min_digits:5',
    ];
    //Mise à jour de l'afffichage par page
    public function updatingParPage()
    {
        $this->resetPage();
    }
    public function updatingIsBtnAddClicked()
    {
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.utilisateur.index', [
            "users" => User::where([
                ['name', 'like', '%' . $this->search . '%'],
                ['visible', '=', 1],
            ])
                ->orWhere([
                    ['lastName', 'like', '%' . $this->search . '%'],
                    ['visible', '=', 1],
                ])
                ->paginate($this->parPage),
            "roles" => Role::all(),
        ])
            ->extends('admin.layouts.utilisateur')
            ->section('contenu');
    }


    function goToAddUser()
    {
        $this->isBtnAddClicked = true;
    }
    public function goToListUser()
    {
    }


    public function addUser()
    {
        $validatedData = $this->validate();
        $validatedData['password'] = Hash::make('1234');
        $filename = 'user' . User::latest()->first()->id + 1 . '.' . $validatedData['photo']->extension();
        $path = $validatedData['photo']->storeAs(
            'profils',
            $filename,
            'public'
        );
        $validatedData['photo'] = $path;
        User::create(
            $validatedData
        );
        $this->name = "";
        $this->lastName = "";
        $this->email = "";
        $this->username = "";
        $this->role_id = "";
        $this->sexe = "";
        $this->photo = "";
        $this->phone1 = "";
        $this->phone2 = "";
        $this->salaire = "";
    }
}
