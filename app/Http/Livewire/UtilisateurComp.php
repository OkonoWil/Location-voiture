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
    public $isBtnAddClicked = true;
    public $search;
    public $newUser = [];
    protected $rules = [
        'newUser.name' => 'required',
        'newUser.lastName' => 'required',
        'newUser.email' => 'required|email|unique:users,email',
        'newUser.username' => 'required|unique:users,username',
        'newUser.role_id' => 'required',
        'newUser.sexe' => 'required',
        'newUser.photo' => 'image|max:1024',
        'newUser.phone1' => 'required|numeric|min_digits:8',
        'newUser.phone2' => 'numeric|min_digits:8',
        'newUser.salaire' => 'required|numeric|min_digits:5',
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
        $validatedData['newUser']['password'] = Hash::make('1234');
        User::create($validatedData['newUser']);
    }
}
