@extends('employe.layouts.app')

@section('tilte','Dashboard')

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
            <div class="bg-gradient-to-b from-blue-200 to-blue-100 border-b-4 border-blue-500 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-blue-600"><i class="fas fa-users fa-2x fa-inverse"></i></div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-gray-600">Clients</h2>
                        <p class="font-bold text-3xl">{{Auth::user()->clients->count()}} <span class="text-blue-500"><i
                                    class="fas fa-caret-up"></i></span></p>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card-->
            <div
                class="bg-gradient-to-b from-yellow-200 to-pink-100 border-b-4 border-yellow-500 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-yellow-600"><i
                                class="fa-solid fa-bookmark fa-2x fa-inverse"></i>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-gray-600">Locations</h2>
                        <p class="font-bold text-3xl">{{Auth::user()->locations->count()}} <span
                                class="text-yellow-500"><i class="fas fa-exchange-alt"></i></span></p>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
        <div class="w-full md:w-1/2 xl:w-1/3 p-6">
            <!--Metric Card-->
            <div
                class="bg-gradient-to-b from-green-200 to-green-100 border-b-4 border-green-600 rounded-lg shadow-xl p-5">
                <div class="flex flex-row items-center">
                    <div class="flex-shrink pr-4">
                        <div class="rounded-full p-5 bg-green-600"><i
                                class="fa-brands fa-cc-amazon-pay fa-2x fa-inverse"></i>
                        </div>
                    </div>
                    <div class="flex-1 text-right md:text-center">
                        <h2 class="font-bold uppercase text-gray-600">Paiements</h2>
                        <p class="font-bold text-3xl">{{Auth::user()->paiements->count()}} <span
                                class="text-green-600"><i class="fas fa-caret-up"></i></span></p>
                    </div>
                </div>
            </div>
            <!--/Metric Card-->
        </div>
    </div>

    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Mes paiments récents..
        </p>
        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-center py-3 px-4 uppercase font-semibold text-sm">#</th>
                        <th class="text-center py-3 px-4 uppercase font-semibold text-sm">N° location</th>
                        <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Client</th>
                        <th class="text-center py-3 px-4 uppercase font-semibold text-sm">date</th>
                        <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Montant</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @php $i = 0 @endphp
                    @forelse ( $paiments as $paiment )
                    <tr @if($i%2!=0)class="bg-gray-200" @endif>
                        <td class="text-center py-3 px-4">{{$paiment->id}}</td>
                        <td class="text-center py-3 px-4">{{$paiment->location_id}}</td>
                        <td class="text-center py-3 px-4">{{$paiment->location->client->name}}</td>
                        <td class="text-center py-3 px-4">{{$paiment->datePaiement}}</td>
                        <td class="text-center py-3 px-4">{{$paiment->montant}}FCFA
                        </td>
                    </tr>
                    @php $i++ @endphp
                    @empty
                    <span>Aucun retour enregistré...</span>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Mes locations récentes...
        </p>
        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-center py-3 px-4 uppercase font-semibold text-sm">#</th>
                        <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Client</th>
                        <th class="text-center py-3 px-4 uppercase font-semibold text-sm">début</th>
                        <th class="text-center py-3 px-4 uppercase font-semibold text-sm">fin</th>
                        <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Montant</th>
                        <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Caution</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @php $i = 0 @endphp
                    @forelse ( $locations as $location )
                    <tr @if($i%2!=0)class="bg-gray-200" @endif>
                        <td class="text-center py-3 px-4">{{$location->id}}</td>
                        <td class="text-center py-3 px-4">{{$location->client->name}}</td>
                        <td class="text-center py-3 px-4">{{$location->dateDebut}}</td>
                        <td class="text-center py-3 px-4">{{$location->dateFin}}</td>
                        <td class="text-center py-3 px-4">{{$location->montant}}FCFA
                        </td>
                        <td class="text-center py-3 px-4">{{$location->caution}}FCFA</td>
                    </tr>
                    @php $i++ @endphp
                    @empty
                    <span>Aucun retour enregistré...</span>
                    @endforelse

                </tbody>
            </table>
        </div>
    </div>
    <div class="w-full mt-12">
        <p class="text-xl pb-3 flex items-center">
            <i class="fas fa-list mr-3"></i> Clients récents...
        </p>
        <div class="bg-white overflow-auto">
            <table class="min-w-full bg-white">
                <thead class="bg-gray-800 text-white">
                    <tr>
                        <th class="text-center py-3 px-4 uppercase font-semibold text-sm">#</th>
                        <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Nom</th>
                        <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Prénom</th>
                        <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Nationalité</th>
                        <th class="text-center py-3 px-4 uppercase font-semibold text-sm">Téléphone</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700">
                    @php $i = 0 @endphp
                    @forelse ( $clients as $client )
                    <tr @if($i%2!=0)class="bg-gray-200" @endif>
                        <td class="text-center py-3 px-4">{{$client->id}}</td>
                        <td class="text-center py-3 px-4">{{$client->name}}</td>
                        <td class="text-center py-3 px-4">{{$client->lastnName}}</td>
                        <td class="text-center py-3 px-4">{{$client->nationalite}}</td>
                        <td class="text-center py-3 px-4">{{$client->phone1}}
                        </td>
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

    @section('data')
    {{-- <form action="" id="techform" class="hidden">
        @foreach ($techniciens as $technicien)
        <input type="text" name="technicien[]" value="{{$technicien->name}}">
        @endforeach
    </form>
    <form action="" id="retform" class="hidden">
        @foreach ($techniciens as $technicien)
        <input type="text" name="retours[]" value="{{$technicien->retours->count()}}">
        @endforeach
    </form>
    <form action="" id="etaform" class="hidden">
        @foreach ($etats as $etat)
        <input type="text" name="etats[]" value="{{$etat->nomEtat}}">
        @endforeach
    </form>
    <form action="" id="etaNbform" class="hidden">
        <input type="text" name="etatsNb[]" value="{{Auth::user()->retours->where('etat_id',1)->count()}}">
        <input type="text" name="etatsNb[]" value="{{Auth::user()->retours->where('etat_id',2)->count()}}">
        <input type="text" name="etatsNb[]" value="{{Auth::user()->retours->where('etat_id',3)->count()}}">
        <input type="text" name="etatsNb[]" value="{{Auth::user()->retours->where('etat_id',4)->count()}}">

    </form> --}}
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    {{-- <script>
        const techniciens = document.getElementsByName('technicien[]');
        let tabTech = new Array();
        techniciens.forEach(element => {
            tabTech.push(element.value);   
        });
        const retours = document.getElementsByName('retours[]');
        let tabRetours = new Array();
        retours.forEach(element => {
            tabRetours.push(element.value);   
        });
        var chartOne = document.getElementById('chartOne');
        var myChart = new Chart(chartOne, {
            type: 'bar',
            data: {
                
                labels: tabTech,
                datasets: [{
                    label: '# of Retours',
                    data: tabRetours,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
        const etats = document.getElementsByName('etats[]');
        let tabEtats = new Array();
        etats.forEach(element => {
            tabEtats.push(element.value);   
        });
        const etatsNb = document.getElementsByName('etatsNb[]');
        let tabEtatsNb = new Array();
        etatsNb.forEach(element => {
            tabEtatsNb.push(element.value);   
        });
        console.log(tabEtatsNb);
        var chartTwo = document.getElementById('chartTwo');
        var myLineChart = new Chart(chartTwo, {
            type: 'bar',
            data: {
                labels: tabEtats,
                datasets: [{
                    label: '# of Etat',
                    data: tabEtatsNb,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        }); --}}
    </script>
    @endsection