<div class="w-full 2xl:w-2/3 lg:w-4/5 mt-6 pl-0 lg:pl-2">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> Formulaire
    </p>
    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-xl" role="form" wire:submit.prevent='addRetour()'>
            <p class="text-lg text-gray-800 font-medium pb-2">Information du retour</p>

            <div class="flex w-full flex-col md:flex-row">
                <div class="mt-2 w-full md:w-1/2 sm:mr-1">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="montant">Clien
                        retenu</label>
                    <input disabled
                        class="w-full px-2 sm:px-5  py-1 sm:py-2 text-gray-700 bg-gray-200 @error('client_id') border border-red-500 @enderror rounded focus:outline-blue-500"
                        id="client_id" wire:model="client_id" type="text" placeholder="Id Client"
                        aria-label="client_id">
                    @error('client_id')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="mt-2 w-full md:w-1/2 sm:ml-1">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="user_id">Employee</label>
                    <input disabled
                        class="w-full px-2 sm:px-5  py-1 sm:py-2 text-gray-700 bg-gray-200 @error('user_id') border border-red-500 @enderror rounded focus:outline-blue-500"
                        id="user_id" wire:model="user_id" type="text" placeholder="ID Employe" aria-label="user_id">
                    @error('user_id')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="flex w-full flex-col md:flex-row">
                <div class="w-full md:w-1/2 sm:mr-1 mt-2">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="location_id">Location</label>
                    <select wire:model="location_id" id="location_id" class='w-full font-bold mx-1 border-2'>
                        <option value="null">Selectionner une location</option>
                        @forelse ($locations as $location)
                        <option class="w-10 h-14" value="{{$location->id}}">
                            {{$location->montant.' - '.$location->client->name.' - '.$location->client->lastName}}
                        </option>
                        @empty
                        <option value="null">Aucune nouvelle location</option>

                        @endforelse
                    </select>
                    @error('voiture_id')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="w-full md:w-1/2 sm:mr-1 mt-2">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="etat_id">Etat</label>
                    <select wire:model="etat_id" id="etat_id" class='w-full font-bold mx-1 border-2'>
                        <option value="null">Selectionner un etat</option>
                        @forelse ($etats as $etat)
                        <option class="w-10 h-14" value="{{$etat->id}}">
                            {{$etat->nomEtat}}
                        </option>
                        @empty
                        <option value="null">Aucun etat</option>
                        @endforelse
                    </select>
                    @error('etat_id')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="mt-6 flex flex-wrap flex-row justify-around">
                <button class="px-4 font-extralight py-1 text-white  tracking-wider bg-green-800 rounded"
                    type="submit">Enregistrer</button>
                <button class="px-4 font-extralight py-1 text-white  tracking-wider bg-blue-800 rounded" type="button"
                    wire:click='goToListRetour()'><span class="md:hidden">Retour</span><span
                        class="hidden md:inline">Retouner
                        à la liste des
                        paiements</span></button>
            </div>
        </form>
    </div>
</div>