<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UtilisateurComp extends Component
{
    use WithPagination;
    use WithFileUploads;
    public $parPage = 10;
    public $isBtnListClicked = true;
    public $isBtnCreateClicked = false;
    public $isBtnEditClicked = false;
    public $search;

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
    public $user_id;
    public $current_user;

    public function corbeille()
    {
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

    public function rules()
    {
        if ($this->isBtnCreateClicked) {
            return [
                'name' => 'required',
                'lastName' => 'required',
                'email' => 'required|email|unique:users,email',
                'username' => 'required|unique:users,username',
                'role_id' => 'required',
                'sexe' => 'required',
                'photo' => 'required|image|max:1024',
                'phone1' => 'required|unique:users,phone1|numeric|min_digits:8',
                'phone2' => 'nullable|numeric|min_digits:8',
                'salaire' => 'required|numeric|min_digits:5',
            ];
        }
        return [
            'name' => 'required',
            'lastName' => 'required',
            'email' => ['required', 'email', Rule::unique("users")->ignore($this->user_id)],
            'username' => ['required', Rule::unique("users")->ignore($this->user_id)],
            'role_id' => 'required',
            'sexe' => 'required',
            'phone1' => ['required', 'min_digits:8', Rule::unique("users")->ignore($this->user_id)],
            'phone2' => 'nullable|numeric|min_digits:8',
            'salaire' => 'required|numeric|min_digits:5',
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
    function goToAddUser()
    {
        $this->isBtnListClicked = false;
        $this->isBtnCreateClicked = true;
        $this->isBtnEditClicked = false;
    }
    public function goToListUser()
    {
        $this->isBtnListClicked = true;
        $this->isBtnCreateClicked = false;
        $this->isBtnEditClicked = false;
    }
    public function goToEditUser($user)
    {

        $this->user_id = $user['id'];
        $this->name = $user['name'];
        $this->lastName = $user["lastName"];
        $this->email = $user["email"];
        $this->username = $user['username'];
        $this->role_id = $user["role_id"];
        $this->sexe = $user['sexe'];
        $this->photo = $user['photo'];
        $this->phone1 = $user['phone1'];
        $this->phone2 = $user['phone2'];
        $this->salaire = $user['salaire'];
        $this->current_user = $user;

        $this->isBtnListClicked = false;
        $this->isBtnCreateClicked = false;
        $this->isBtnEditClicked = true;
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

        $this->corbeille();
        $this->dispatchBrowserEvent("showSuccessMessage", ["Message" => "Utilisateur créé avec succès!"]);
    }

    public function updateUser()
    {
        $validatedData = $this->validate();
        $user = User::find($this->user_id);
        $user->name = $validatedData['name'];
        $user->lastName = $validatedData['lastName'];
        $user->email = $validatedData['email'];
        $user->username = $validatedData['username'];
        $user->role_id = $validatedData['role_id'];
        $user->sexe = $validatedData['sexe'];
        $user->phone1 = $validatedData['phone1'];
        $user->phone2 = $validatedData['phone2'];
        $user->salaire = $validatedData['salaire'];
        $user->updated_at = now();
        $user->save();
        $this->dispatchBrowserEvent("showSuccessMessage", ["Message" => "Les informations de l'tilisateur ont été mise à jour avec succès!"]);
    }

    public function confirmDestroy($name, $user_id)
    {
        $this->dispatchBrowserEvent(
            "showConfirmMessage",
            [
                "Message" => "Voulez-vous vraiment supprimer l'utilisateur $name de la liste !",
                "title" => "êtes-vous sûr?",
                "icon" => "warning",
                "data" => [
                    "user_id" => $user_id,
                ],
            ]
        );
    }
    public function deleteUser($user_id)
    {
        $user = User::find($user_id);
        $user->visible = 0;
        $user->updated_at = now();
        $user->save();
        $this->dispatchBrowserEvent("showSuccessMessage", ["Message" => "Utilisateur supprimé avec succès!"]);
    }

    public function showPicture($name, $role, $photo, $id)
    {
        $this->dispatchBrowserEvent("showPictureMessage", [
            "title" => $name,
            "text" => $role,
            "imageAlt" => "photo id" . $id,
            "imageUrl" => $photo,
        ]);
    }
    public function resetPassword()
    {
        $user = User::find($this->user_id);
        $user->password = Hash::make('password');
        $user->updated_at = now();
        $user->save();
        $this->dispatchBrowserEvent("showSuccessMessage", ["Message" => "Mot de passe réinitialiser avec succès!"]);
    }
    public function updatePicture()
    {
        $validatedData = $this->validate(['photo' => 'required|image|max:1024',]);
        $filename = 'user' . User::latest()->first()->id + 1 . '.' . $validatedData['photo']->extension();
        $path = $validatedData['photo']->storeAs(
            'profils',
            $filename,
            'public'
        );
        $user = User::find($this->user_id);
        $user->photo = $path;
        $user->updated_at = now();
        $user->save();
        $this->dispatchBrowserEvent("showSuccessMessage", ["Message" => "Photo de profil mise à jour avec succès!"]);
    }
}
