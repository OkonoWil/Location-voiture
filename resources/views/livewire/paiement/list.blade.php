<div>
    <button></button>

    <div class="bg-white overflow-auto">
        <div class="flex flex-row justify-between my-1">
            <button wire:click='goToAddPaiement()'
                class="flex items-center bg-green-500 text-white font-bold text-lg py-3 px-3 rounded-xl">
                <i class="fa-solid fa-plus mr-2"></i>
                Ajouter
            </button>

            <div class=" flex flex-row items-center ">
                <span>paiements </span>
                @php
                $n =$paiements->total()<100?$paiements->total():100;
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
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Location</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Immatriculation</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">montant</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Caissier</th>
                    <th class="text-center py-3 px-7 uppercase font-semibold text-sm">date</th>
                    <th class="text-center py-3 px-6 uppercase font-semibold text-sm">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @php $i = 0 @endphp
                @forelse ( $paiements as $paiement )
                <tr @if($i%2!=0)class="bg-gray-200" @endif>
                    <td class="text-center py-3 px-4">{{$paiement->id}}</td>
                    <td class="text-center py-3 px-4">{{$paiement->location_id}}</td>
                    <td class="text-center py-3 px-4">{{$paiement->location->voiture->immatriculation}}</td>
                    <td class="text-center py-3 px-4">{{$paiement->montant}}FCFA</td>
                    <td class="text-center py-3 px-4">{{$paiement->user->name}}</td>
                    <td class="text-center py-3 px-4">{{$paiement->created_at->format('d-m-Y')}}</td>
                    <td class="text-center py-3 px-4"><button title="show"
                            wire:click="showPicture('{{$paiement->id}}','{{$paiement->location_id}}','{{$paiement->location->voiture->immatriculation}}','{{$paiement->montant}}', '{{$paiement->user->name}}', '{{$paiement->created_at->format('d-m-Y')}}', '{{$paiement->location->voiture->photo}}')"
                            class=" mx-2"><i class="fa-regular fa-image text-blue-500"></i></button>
                        <button title="edit" wire:click="goToEditPaiement({{$paiement}})" class=" mx-2"><i
                                class="fa-solid fa-pen-to-square text-green-500"></i></button>
                        <button title="delete" wire:click="confirmDestroy('{{$paiement->id}}')" class=" mx-2"><i
                                class="fa-solid fa-trash text-red-500"></i></button>
                    </td>
                </tr>
                @php $i++ @endphp
                @empty<tr>
                    <td colspan="7" class="px-4 py-3 text-center">Aucun paiement trouvée...</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{$paiements->links()}}

    </div>
</div>