<div>
    <button></button>

    <div class="bg-white overflow-auto">
        <div class="flex flex-row justify-between my-1">
            <button class="flex items-center bg-green-500 text-white font-bold text-lg py-3 px-6 rounded-xl">
                <i class="fa-solid fa-plus mr-3"></i>
                Retour
            </button>

            <div class=" flex flex-row items-center ">
                <span>retours </span>
                <select wire:model.lazy="parPage" name="maxShow" id="maxShow" class='font-bold mx-1 border-2'>
                    @for($i= 5; $i <= $retours->total(); $i+=2) <option value="{{$i}}"> {{$i}}
                        </option>
                        @endfor
                </select>
                <label for="maxShow">par page</label>
            </div>

        </div>
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">#</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Client</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Immatriculation</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">état</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">montant retenu</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">date</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Action</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                @php $i = 0 @endphp
                @forelse ( $retours as $retour )
                <tr @if($i%2!=0)class="bg-gray-200" @endif>
                    <td class="text-center py-3 px-4">{{$retour->id}}</td>
                    <td class="text-center py-3 px-4">{{$retour->client->name}}</td>
                    <td class="text-center py-3 px-4">{{$retour->location->voiture->immatriculation}}</td>
                    <td class="text-center py-3 px-4">{{$retour->etat->nomEtat}}</td>
                    <td class="text-center py-3 px-4">{{$retour->etat->montantDegat *
                        $retour->location->caution}}FCFA
                    </td>
                    <td class="text-center py-3 px-4">{{$retour->dateRetour}}</td>
                    <td class="text-center py-3 px-4"><a href="{{route('retours.edit',['retour' => $retour])}}"
                            class=" mx-2"><i class="fa-solid fa-pen-to-square text-green-500"></i></a></td>
                </tr>
                @php $i++ @endphp
                @empty
                <span>Aucun retour enregistré...</span>
                @endforelse
            </tbody>
        </table>
    </div>

    <div>
        {{$retours->links()}}

    </div>
</div>