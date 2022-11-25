<div class="w-full lg:w-1/2 mt-6 pl-0 lg:pl-2">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> Formulaire
    </p>
    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-xl" role="form" wire:submit.prevent='addUser()'>
            <p class="text-lg text-gray-800 font-medium pb-2">Information de l'employé</p>
            <div class="flex w-full flex-col sm:flex-row">
                <div class="w-full sm:w-1/2 sm:mr-1 mt-2">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="name">Nom</label>
                    <input
                        class="w-full px-2 sm:px-5  py-1 sm:py-2 text-gray-700 @error('name') is-invalid @enderror bg-gray-200 rounded focus:outline-blue-500"
                        id="name" wire:model="name" type="text" placeholder="Nom" aria-label="Nom">
                    @error('name')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="w-full sm:w-1/2 sm:ml-1 mt-2">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="lastName">Prénom</label>
                    <input
                        class="w-full px-2 sm:px-5 py-1 sm:py-2 text-gray-700 bg-gray-200 @error('lastName') border-red-500 @enderror rounded focus:outline-blue-500"
                        id="lastName" wire:model="lastName" type="text" placeholder="Prénom" aria-label="Prénom">
                    @error('lastName')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="flex w-full flex-col sm:flex-row">
                <div class="mt-2 w-full sm:w-1/2 sm:mr-1">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="email">Email</label>
                    <input
                        class="w-full px-2 sm:px-5  py-1 sm:py-2 text-gray-700 bg-gray-200 @error('email') border-red-500 @enderror rounded focus:outline-blue-500"
                        id="email" wire:model="email" type="email" placeholder="Email" aria-label="Email">
                    @error('email')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="mt-2 w-full sm:w-1/2 sm:ml-1">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="username">Nom
                        d'utilisateur</label>
                    <input
                        class="w-full px-2 sm:px-5  py-1 sm:py-2 text-gray-700 bg-gray-200 @error('username') border-red-500 @enderror rounded focus:outline-blue-500"
                        id="username" wire:model="username" type="text" placeholder="Nom d'utilisateur"
                        aria-label="Username">
                    @error('username')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="mt-2">
                <span class="hidden sm:block text-sm sm:text-base text-gray-600">Rôle</span>
                <div
                    class="flex flex-wrap flex-row justify-between sm:justify-around w-full @error('role_id') border-red-500 @enderror px-2 sm:px-5  py-1 sm:py-2 text-gray-700 bg-gray-200 rounded ">
                    @foreach ($roles as $role)
                    <div class="mx-2">
                        <input class="mr-1" type="radio" wire:model="role_id" id="{{$role->nomrole}}"
                            value="{{$role->id}}">
                        <label for="{{$role->nomrole}}">{{$role->nomrole}}</label>
                    </div>
                    @endforeach
                    @error('role_id')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="flex w-full flex-col sm:flex-row">
                <div class="mt-2 w-full sm:w-1/2 sm:mr-1">
                    <span class="hidden sm:block text-sm sm:text-base text-gray-600">Sexe</span>
                    <div
                        class="flex flex-wrap flex-row justify-between sm:justify-around w-full px-2 sm:px-5  @error('sexe') border-red-500 @enderror py-1 sm:py-2 text-gray-700 bg-gray-200 rounded ">

                        <div class="mx-2">
                            <input class="mr-1" type="radio" wire:model="sexe" id="homme" value="Homme">
                            <label for="homme">Homme</label>
                        </div>
                        <div class="mx-2">
                            <input class="mr-1" type="radio" wire:model="sexe" id="femme" value="Femme">
                            <label for="femme">Femme</label>
                        </div>
                    </div>
                    @error('sexe')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="mt-2 w-full sm:w-1/2 sm:ml-1">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="photo">Photo</label>
                    <input
                        class="w-full px-2 sm:px-5  py-1 sm:py-2 text-gray-700 bg-gray-200 @error('photo') border-red-500 @enderror rounded focus:outline-blue-500"
                        id="photo" wire:model="photo" type="file" placeholder="Photo" aria-label="photo">
                </div>
                @error('photo')
                <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class="flex w-full flex-col sm:flex-row">
                <div class="w-full sm:w-1/2 sm:mr-1 mt-2">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="phone1">Numéro</label>
                    <input
                        class="w-full px-2 sm:px-5  py-1 sm:py-2 text-gray-700 bg-gray-200 @error('phone1') border-red-500 @enderror rounded focus:outline-blue-500"
                        id="phone1" wire:model="phone1" type="tel" placeholder="Numéro" aria-label="Numéro">
                    @error('phone1')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="w-full sm:w-1/2 sm:ml-1 mt-2">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="phone2">Numéro
                        secondaire</label>
                    <input
                        class="w-full px-2 sm:px-5 py-1 sm:py-2 text-gray-700 bg-gray-200 @error('phone2') border-red-500 @enderror rounded focus:outline-blue-500"
                        id="phone2" wire:model="phone2" type="tel" placeholder="Numéro secondaire" aria-label="numéro">
                    @error('phone2')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="mt-2 flex flex-col">
                <label class="hidden text-sm sm:text-base sm:block text-gray-600" for="salaire">Salaire</label>
                <input
                    class="w-full px-2 py-2 text-gray-700 bg-gray-200 rounded @error('salaire') border-red-500 @enderror focus:outline-blue-500"
                    id="salaire" wire:model="salaire" type="number" placeholder="Salaire" aria-label="Salaire">
                @error('salaire')
                <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class="mt-6">
                <button class="px-4 font-extralight py-1 text-white  tracking-wider bg-green-800 rounded"
                    type="submit">Enregistrer</button>
            </div>
        </form>
    </div>
</div>