<div>
    <div class="bg-white overflow-auto">
        <table class="min-w-full bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Numero</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Client</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Immatriculation</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">état</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">montant retenu</th>
                    <th class="text-center py-3 px-4 uppercase font-semibold text-sm">date</th>
                </tr>
            </thead>
            <tbody class="text-gray-700">
                {{--@php $i = 0 @endphp
                @forelse ( Auth::user()->retours as $retour )
                <tr @if($i%2!=0)class="bg-gray-200" @endif>
                    <td class="text-center py-3 px-4">{{$retour->id}}</td>
                    <td class="text-center py-3 px-4">{{$retour->client->name}}</td>
                    <td class="text-center py-3 px-4">{{$retour->location->voiture->immatriculation}}</td>
                    <td class="text-center py-3 px-4">{{$retour->etat->nomEtat}}</td>
                    <td class="text-center py-3 px-4">{{$retour->etat->montantDegat *
                        $retour->location->caution}}FCFA
                    </td>
                    <td class="text-center py-3 px-4">{{$retour->dateRetour}}</td>
                </tr>
                @php $i++ @endphp
                @empty
                <span>Aucun retour enregistré...</span>
                @endforelse
                --}}
            </tbody>
        </table>
    </div>
</div>