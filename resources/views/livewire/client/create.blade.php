<div class="w-full 2xl:w-2/3 lg:w-4/5 mt-6 pl-0 lg:pl-2">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> Formulaire
    </p>
    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-xl" role="form" wire:submit.prevent='addClient()'>
            <p class="text-lg text-gray-800 font-medium pb-2">Information du client</p>
            <div class="flex w-full flex-col md:flex-row">
                <div class="w-full md:w-1/2 sm:mr-1 mt-2">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="name">Nom</label>
                    <input
                        class="w-full px-2 sm:px-5  py-1 sm:py-2 text-gray-700 @error('name') border border-red-500 @enderror bg-gray-200 rounded focus:outline-blue-500"
                        id="name" wire:model="name" type="text" placeholder="Nom" aria-label="Nom">
                    @error('name')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="w-full md:w-1/2 sm:ml-1 mt-2">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="lastName">Prénom</label>
                    <input
                        class="w-full px-2 sm:px-5 py-1 sm:py-2 text-gray-700 bg-gray-200 @error('lastName') border border-red-500 @enderror rounded focus:outline-blue-500"
                        id="lastName" wire:model="lastName" type="text" placeholder="Prénom" aria-label="Prénom">
                    @error('lastName')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="flex w-full flex-col md:flex-row">
                <div class="mt-2 w-full md:w-1/2 sm:mr-1">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="dateDeNaissance">Date de
                        naissance</label>
                    <input
                        class="w-full px-2 sm:px-5  py-1 sm:py-2 text-gray-700 bg-gray-200 @error('dateDeNaissance') border border-red-500 @enderror rounded focus:outline-blue-500"
                        id="dateDeNaissance" wire:model="dateDeNaissance" type="date" placeholder="Date de naissance"
                        aria-label="dateDeNaissance">
                    @error('dateDeNaissance')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="mt-2 w-full md:w-1/2 sm:ml-1">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="lieuDeNaissance">Lieu de
                        naissance
                        d'utilisateur</label>
                    <input
                        class="w-full px-2 sm:px-5  py-1 sm:py-2 text-gray-700 bg-gray-200 @error('lieuDeNaissance') border border-red-500 @enderror rounded focus:outline-blue-500"
                        id="lieuDeNaissance" wire:model="lieuDeNaissance" type="text" placeholder="Nom d'utilisateur"
                        aria-label="lieuDeNaissance">
                    @error('lieuDeNaissance')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="flex w-full flex-col md:flex-row">
                <div class="mt-2 w-full md:w-1/2 sm:mr-1">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="email">Email</label>
                    <input
                        class="w-full px-2 sm:px-5  py-1 sm:py-2 text-gray-700 bg-gray-200 @error('email') border border-red-500 @enderror rounded focus:outline-blue-500"
                        id="email" wire:model="email" type="email" placeholder="Email" aria-label="Email">
                    @error('email')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="mt-2 w-full md:w-1/2 sm:ml-1">
                    <span class="hidden sm:block text-sm sm:text-base text-gray-600">Sexe</span>
                    <div
                        class="flex flex-wrap flex-row justify-between sm:justify-around w-full px-2 sm:px-5  @error('sexe') border border-red-500 @enderror py-1 sm:py-2 text-gray-700 bg-gray-200 rounded ">

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
            </div>
            <div class="flex w-full flex-col md:flex-row">
                <div class="w-full md:w-1/2 sm:mr-1 mt-2">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="pays">Pays</label>
                    <input
                        class="w-full px-2 sm:px-5  py-1 sm:py-2 text-gray-700 @error('pays') border border-red-500 @enderror bg-gray-200 rounded focus:outline-blue-500"
                        id="pays" wire:model="pays" type="text" placeholder="Pays" aria-label="nationalite">
                    @error('pays')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="w-full md:w-1/2 sm:ml-1 mt-2">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600"
                        for="nationalite">Nationalité</label>
                    <input
                        class="w-full px-2 sm:px-5 py-1 sm:py-2 text-gray-700 bg-gray-200 @error('nationalite') border border-red-500 @enderror rounded focus:outline-blue-500"
                        id="nationalite" wire:model="nationalite" type="text" placeholder="nationalite"
                        aria-label="nationalite">
                    @error('nationalite')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="flex w-full flex-col md:flex-row">
                <div class="w-full md:w-1/2 sm:mr-1 mt-2">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="ville">Ville</label>
                    <input
                        class="w-full px-2 sm:px-5  py-1 sm:py-2 text-gray-700 @error('ville') border border-red-500 @enderror bg-gray-200 rounded focus:outline-blue-500"
                        id="ville" wire:model="ville" type="text" placeholder="Ville" aria-label="nationalite">
                    @error('ville')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="w-full md:w-1/2 sm:ml-1 mt-2">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="Adresse">Adresse</label>
                    <input
                        class="w-full px-2 sm:px-5 py-1 sm:py-2 text-gray-700 bg-gray-200 @error('Adresse') border border-red-500 @enderror rounded focus:outline-blue-500"
                        id="Adresse" wire:model="Adresse" type="text" placeholder="Adresse" aria-label="Adresse">
                    @error('Adresse')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="flex w-full flex-col md:flex-row">
                <div class="w-full md:w-1/2 sm:mr-1 mt-2">
                    <span class="hidden sm:block text-sm sm:text-base text-gray-600">Sexe</span>
                    <div
                        class="flex flex-wrap flex-row justify-between sm:justify-around w-full px-2 sm:px-5  @error('sexe') border border-red-500 @enderror py-1 sm:py-2 text-gray-700 bg-gray-200 rounded ">

                        <div class="mx-2">
                            <input class="mr-1" type="radio" wire:model="pieceIdentite" id="cni" value="CNI">
                            <label for="cni">CNI</label>
                        </div>
                        <div class="mx-2">
                            <input class="mr-1" type="radio" wire:model="pieceIdentite" id="passport" value="Passport">
                            <label for="passport">Passport</label>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 sm:ml-1 mt-2">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="phone2">Numéro
                        secondaire</label>
                    <input
                        class="w-full px-2 sm:px-5 py-1 sm:py-2 text-gray-700 bg-gray-200 @error('numeroPieceIdentite') border border-red-500 @enderror rounded focus:outline-blue-500"
                        id="numeroPieceIdentite" wire:model="numeroPieceIdentite" type="number"
                        placeholder="Numéro secondaire" aria-label="numéro">
                    @error('numeroPieceIdentite')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="flex w-full flex-col md:flex-row">
                <div class="w-full md:w-1/2 sm:mr-1 mt-2">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="phone1">Numéro</label>
                    <input
                        class="w-full px-2 sm:px-5  py-1 sm:py-2 text-gray-700 bg-gray-200 @error('phone1') border border-red-500 @enderror rounded focus:outline-blue-500"
                        id="phone1" wire:model="phone1" type="tel" placeholder="Numéro" aria-label="Numéro">
                    @error('phone1')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="w-full md:w-1/2 sm:ml-1 mt-2">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="phone2">Numéro
                        secondaire</label>
                    <input
                        class="w-full px-2 sm:px-5 py-1 sm:py-2 text-gray-700 bg-gray-200 @error('phone2') border border-red-500 @enderror rounded focus:outline-blue-500"
                        id="phone2" wire:model="phone2" type="tel" placeholder="Numéro secondaire" aria-label="numéro">
                    @error('phone2')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="mt-2 flex flex-col">
                <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="photo">Photo</label>
                <input
                    class="w-full px-2 sm:px-5  py-1 sm:py-2 text-gray-700 bg-gray-200 @error('photo') border border-red-500 @enderror rounded focus:outline-blue-500"
                    id="photo" wire:model="photo" type="file" placeholder="Photo" aria-label="photo">
                @error('photo')
                <span class="text-red-500">{{$message}}</span>
                @enderror
            </div>
            <div class="mt-6 flex flex-wrap flex-row justify-around">
                <button class="px-4 font-extralight py-1 text-white  tracking-wider bg-green-800 rounded"
                    type="submit">Enregistrer</button>
                <button class="px-4 font-extralight py-1 text-white  tracking-wider bg-blue-800 rounded" type="button"
                    wire:click='goToListClient()'><span class="md:hidden">Retour</span><span
                        class="hidden md:inline">Retouner
                        à la liste des
                        clients</span></button>
            </div>
        </form>
    </div>
</div>