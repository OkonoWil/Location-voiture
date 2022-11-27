<div>
    <button></button>

    <div class="bg-white overflow-auto">
        <div class="flex flex-wrap flex-row justify-between my-1">
            <button wire:click='goToAddLocation()'
                class="flex items-center bg-green-500 text-white font-bold text-lg py-3 px-3 rounded-xl">
                <i class="fa-solid fa-plus mr-2"></i>
                Ajouter
            </button>
            <div
                class="flex relative items-center mx-2 sm:w-64 h-14 focus:border-blue-500 focus:borber- focus:outline-none focus:shadow-outline-purple">
                <div class="absolute nset-y-0 flex items-center pl-2">
                    <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input wire:model='search' type="search" name="search" id="search" placeholder="Entrez le nom du client"
                    class="w-full pl-8 pr-2 text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md  focus:placeholder-gray-500 focus:bg-white focus:border-blue-300 focus:outline-blue-300 focus:outline-2 focus:shadow-outline-purple"
                    aria-label="Search">
            </div>
            <div class="flex-row items-center hidden sm:flex">
                <span>locations </span>
                @php
                $n =$locations->total()<100?$locations->total():100
                    @endphp
                    <select wire:model.lazy="parPage" name="maxShow" id="maxShow" class='font-bold mx-1 border-2'>
                        @for($i= 10; $i <= $n ; $i+=10) <option value="{{$i}}">
                            {{$i}}
                            </option>
                            @endfor
                    </select>
                    <label for="maxShow">par page</label>
            </div>

        </div>
    </div>
    <div class="bg-white overflow-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">#</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Client</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Immatriculation</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">montant</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">caution</th>
                    <th class="text-center py-3 px-7 uppercase font-semibold text-sm">date</th>
                    <th class="text-center py-3 px-6 uppercase font-semibold text-sm">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @php $i = 0 @endphp
                @forelse ( $locations as $location )
                <tr @if($i%2!=0)class="bg-gray-200" @endif>
                    <td class="text-center py-3 px-4">{{$location->id}}</td>
                    <td class="text-center py-3 px-4">{{$location->name. " ".$location->lastName}}</td>
                    <td class="text-center py-3 px-4">{{$location->voiture->immatriculation}}</td>
                    <td class="text-center py-3 px-4">{{$location->montant}}FCFA</td>
                    <td class="text-center py-3 px-4">{{$location->caution}}FCFA</td>
                    <td class="text-center py-3 px-4">{{$location->dateFin}}</td>
                    <td class="text-center py-3 px-4"><button title="show" class=" mx-2"><i
                                class="fa-regular fa-image text-blue-500"></i></button>
                        <button title="edit" wire:click="goToEditLoction({{$location}})" class=" mx-2"><i
                                class="fa-solid fa-pen-to-square text-green-500"></i></button>
                        <button title="delete" wire:click="confirmDestroy('{{$location->id}}','{{$location->name}}')"
                            class=" mx-2"><i class="fa-solid fa-trash text-red-500"></i></button>>
                    </td>
                </tr>
                @php $i++ @endphp
                @empty<tr>
                    <td colspan="7" class="px-4 py-3 text-center">Aucune location trouvée...</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{$locations->links()}}

    </div>
</div>