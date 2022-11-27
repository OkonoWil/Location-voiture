<div class="w-full 2xl:w-2/3 lg:w-4/5 mt-6 pl-0 lg:pl-2">
    <p class="text-xl pb-6 flex items-center">
        <i class="fas fa-list mr-3"></i> Formulaire
    </p>
    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-xl" role="form" wire:submit.prevent='updateLocation()'>
            <p class="text-lg text-gray-800 font-medium pb-2">Information de la location</p>
            <div class="flex w-full flex-col md:flex-row">
                <div class="w-full md:w-1/2 sm:mr-1 mt-2">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="dateDebut">Date de
                        début</label>
                    <input
                        class="w-full px-2 sm:px-5  py-1 sm:py-2 text-gray-700 bg-gray-200 @error('dateDebut') border border-red-500 @enderror rounded focus:outline-blue-500"
                        id="dateDebut" wire:model="dateDebut" type="date" placeholder="Date de
                        début" aria-label="dateDebut">
                    @error('dateDebut')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="w-full md:w-1/2 sm:ml-1 mt-2">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="dateFin">Date de
                        fin</label>
                    <input
                        class="w-full px-2 sm:px-5  py-1 sm:py-2 text-gray-700 bg-gray-200 @error('dateFin') border border-red-500 @enderror rounded focus:outline-blue-500"
                        id="dateFin" wire:model="dateFin" type="date" placeholder="Date de
                        fin" aria-label="dateFin">
                    @error('dateFin')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="flex w-full flex-col md:flex-row">
                <div class="mt-2 w-full md:w-1/2 sm:mr-1">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="montant">Montant</label>
                    <input disabled
                        class="w-full px-2 sm:px-5  py-1 sm:py-2 text-gray-700 bg-gray-200 @error('montant') border border-red-500 @enderror rounded focus:outline-blue-500"
                        id="montant" wire:model="montant" type="text" placeholder="Montant" aria-label="montant">
                    @error('montant')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>

                <div class="mt-2 w-full md:w-1/2 sm:ml-1">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="caution">Caution</label>
                    <input disabled
                        class="w-full px-2 sm:px-5  py-1 sm:py-2 text-gray-700 bg-gray-200 @error('caution') border border-red-500 @enderror rounded focus:outline-blue-500"
                        id="caution" wire:model="caution" type="text" placeholder="caution" aria-label="caution">
                    @error('caution')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
            </div>
            <div class="flex w-full flex-col md:flex-row">
                <div class="w-full md:w-1/2 sm:mr-1 mt-2">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="ville">Voiture</label>
                    <select wire:model="voiture_id" id="voiture_id" class='w-full font-bold mx-1 border-2'>
                        @foreach ($voitures as $voiture)
                        <option class="w-10 h-14" value="{{$voiture->id}}">
                            {{$voiture->immatriculation.' - '.$voiture->marque->nomMarque.' - '.$voiture->modele}}
                        </option>

                        @endforeach
                    </select>
                    @error('voiture_id')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
                <div class="w-full md:w-1/2 sm:mr-1 mt-2">
                    <label class="hidden sm:block sm:text-base text-sm text-gray-600" for="ville">Client</label>
                    <select wire:model="client_id" id="client_id" class='w-full font-bold mx-1 border-2'>
                        @foreach ($clients as $client)
                        <option class="w-10 h-14" value="{{$client->id}}">
                            {{$client->name.' '.$client->lastName}}
                        </option>

                        @endforeach
                    </select>
                    @error('client_id')
                    <span class="text-red-500">{{$message}}</span>
                    @enderror
                </div>
            </div>

            <div class="mt-6 flex flex-wrap flex-row justify-around">
                <button class="px-4 font-extralight py-1 text-white  tracking-wider bg-green-800 rounded"
                    type="submit">Enregistrer</button>
                <button class="px-4 font-extralight py-1 text-white  tracking-wider bg-blue-800 rounded" type="button"
                    wire:click='goToListLocation()'><span class="md:hidden">Retour</span><span
                        class="hidden md:inline">Retouner
                        à la liste des
                        clients</span></button>
            </div>
        </form>
    </div>
</div>