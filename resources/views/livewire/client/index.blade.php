<div>
    <button></button>

    <div class="bg-white overflow-auto">
        <div class="flex flex-wrap flex-row justify-between my-1">
            <button class="flex items-center bg-green-500 text-white font-bold text-lg py-3 px-3 rounded-xl">
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
                <input wire:model='search' type="search" name="search" id="search" placeholder="Rechercher un client"
                    class="w-full pl-8 pr-2 text-gray-700 placeholder-gray-600 bg-gray-100 border-0 rounded-md  focus:placeholder-gray-500 focus:bg-white focus:border-blue-300 focus:outline-blue-300 focus:outline-2 focus:shadow-outline-purple"
                    aria-label="Search">
            </div>
            <div class="flex-row items-center hidden sm:flex">
                <span>clients </span>
                @php
                $n =$clients->total()<100?$clients->total():100
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
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Client</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Piéce</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">N° piéce</th>
                    <th class="text-center py-3 px-7 uppercase font-semibold text-sm">Tél</th>
                    <th class="text-center py-3 px-6 uppercase font-semibold text-sm">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @php $i = 0 @endphp
                @forelse ( $clients as $client )

                <tr class="text-gray-700 @if($i%2!=0)bg-gray-200 @endif">
                    <td class="py-3 px-4">
                        <div class="flex items-center text-sm">
                            <!-- Avatar with inset shadow -->
                            <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full" src="{{$client->photo}}" alt=""
                                    loading="lazy" />
                                <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                            </div>
                            <div>
                                <p class="font-semibold">{{$client->name." ".$client->lastName}}</p>
                                <p class="px-2 py-1 text-xs text-left font-bold text-gray-600  rounded-full">
                                    {{$client->nationalite}}
                                </p>
                            </div>
                        </div>
                    </td>
                    <td class="text-center py-3 px-4">
                        {{$client->pieceIdentite}}
                    </td>
                    <td class="px-4 py-3 text-center">
                        {{$client->numeroPieceIdentite}}
                    </td>
                    <td class="px-4 py-3 text-sm text-center">
                        {{$client->phone1}}
                    </td>
                    <td class="text-center py-3 px-4"><a href="#" class=" mx-2"><i
                                class="fa-solid fa-pen-to-square text-green-500"></i></a><a href="#" class=" mx-2"><i
                                class="fa-solid fa-trash text-red-500"></i></a></td>
                </tr>
                @php $i++ @endphp
                @empty
                <span>Aucun client enregistré...</span>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{$clients->links()}}

    </div>
</div>