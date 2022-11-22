@extends('technicien.layouts.app')

@section('content')
<main class="w-full flex-grow p-6">
    <h1 class="text-3xl font-extrabold text-blue-600 pb-6">Tableau de Bord</h1>

    <div class="flex flex-wrap mt-6">
        <div class="w-full lg:w-1/2 pr-0 lg:pr-2">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-plus mr-3"></i> Rapport des retours
            </p>
            <div class="p-6 bg-white">
                <canvas id="chartOne" width="400" height="200"></canvas>
            </div>
        </div>
        <div class="w-full lg:w-1/2 pl-0 lg:pl-2 mt-12 lg:mt-0">
            <p class="text-xl pb-3 flex items-center">
                <i class="fas fa-check mr-3"></i> Rapport de diagnostique
            </p>
            <div class="p-6 bg-white">
                <canvas id="chartTwo" width="400" height="200"></canvas>
            </div>
        </div>
    </div>

    <div class="flex flex-wrap">
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card-->
            <div
                class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-green-600"><i class="fa-solid fa-car fa-2x fa-inverse"></i>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-gray-600">Disponibles</h2>
                        <p class="font-bold text-3xl">{{$disponible}} <span class="text-green-500"><i
                                    class="fas fa-caret-up"></i></span></p>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card-->
            <div class="bg-gradient-to-b from-pink-200 to-pink-100 border-b-4 border-pink-500 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-pink-600"><i
                                class="fa-solid fa-car-tunnel fa-2x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-gray-600">Mes retours</h2>
                        <p class="font-bold text-3xl">{{Auth::user()->retours->count()}} <span class="text-pink-500"><i
                                    class="fas fa-exchange-alt"></i></span></p>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card-->
            <div
                class="bg-gradient-to-b from-yellow-200 to-yellow-100 border-b-4 border-yellow-600 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-yellow-600"><i class="fa-solid fa-truck fa-2x fa-inverse"></i>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-gray-600">Indisponoble</h2>
                        <p class="font-bold text-3xl">{{$notDisponible}} <span class="text-yellow-600"><i
                                    class="fas fa-caret-up"></i></span></p>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
    </div>

    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Mes retours...
        </p>
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
                    @php $i = 0 @endphp
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

                </tbody>
            </table>
        </div>
    </div>
    @endsection