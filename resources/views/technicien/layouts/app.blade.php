<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{env('APP_NAME')}}-Dashboad</title>
    <meta name="author" content="David Grzyb">
    <meta name="description" content="">
    <link rel="shortcut icon" href="{{Storage::url('icon/icons8_sausage_barbeque.ico')}}" type="image/x-icon">
    <link rel="stylesheet" href="{{asset('Fontawesome/css/all.css')}}">


    <!-- Tailwind -->
    @vite('resources/css/app.css')
    <style>
        @import url('https://fonts.googleapis.com/css?family=Karla:400,700&display=swap');

        .font-family-karla {
            font-family: karla;
        }

        .bg-sidebar {
            background: #3d68ff;
        }

        .cta-btn {
            color: #3d68ff;
        }

        .upgrade-btn {
            background: #1947ee;
        }

        .upgrade-btn:hover {
            background: #0038fd;
        }

        .active-nav-link {
            background: #1947ee;
        }

        .nav-item:hover {
            background: #1947ee;
        }

        .account-link:hover {
            background: #3d68ff;
        }
    </style>
</head>

<body class="bg-gray-100 font-family-karla flex">

    <aside class="relative bg-sidebar h-screen w-64 hidden sm:block shadow-xl">
        <div class="p-6">
            <a href="#" class="text-white text-3xl font-semibold uppercase hover:text-gray-300">LARACAR</a>
            <button
                class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-blue-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i>retour
            </button>
        </div>
        <nav class="text-white text-base font-semibold pt-3">
            <a href="{{route('technicien.index')}}"
                class="flex items-center active-nav-link text-white py-4 pl-6 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Tableau de Bord
            </a>
            <a href="blank.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-4 pl-6 nav-item">
                <i class="fa-solid fa-car mr-3"></i>
                Retour
            </a>

        </nav>
        <span class="absolute w-full bottom-10 text-white flex items-center justify-center py-4">
            {{Auth::user()->username}} <span
                class="bg-green-700 ml-2 border rounded-md border-green-600 p-1">{{Auth::user()->role->nomrole}}</span>
        </span>
        <a href="{{route('logout')}}"
            class="absolute w-full upgrade-btn bottom-0 active-nav-link text-white flex items-center justify-center py-4">
            <i class="fa-solid fa-right-from-bracket mr-3"></i>
            Se déconnecter
        </a>
    </aside>

    <div class="w-full flex flex-col h-screen overflow-y-hidden">
        @section('header')
        @include('partials.header')
        @show
        <!-- Dropdown Nav -->
        <nav :class="isOpen ? 'flex': 'hidden'" class="flex flex-col pt-4">
            <a href="index.html" class="flex items-center active-nav-link text-white py-2 pl-4 nav-item">
                <i class="fas fa-tachometer-alt mr-3"></i>
                Tableau de Bord
            </a>
            <a href="tables.html" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fa-solid fa-car mr-3"></i>
                Retour
            </a>

            <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-cogs mr-3"></i>
                Paramètre
            </a>
            <a href="#" class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fas fa-user mr-3"></i>
                Mon compte
            </a>
            <a href="{{route('logout')}}"
                class="flex items-center text-white opacity-75 hover:opacity-100 py-2 pl-4 nav-item">
                <i class="fa-solid fa-right-from-bracket"></i>
                Se déconnecter
            </a>
        </nav>
        <!-- <button class="w-full bg-white cta-btn font-semibold py-2 mt-5 rounded-br-lg rounded-bl-lg rounded-tr-lg shadow-lg hover:shadow-xl hover:bg-gray-300 flex items-center justify-center">
                <i class="fas fa-plus mr-3"></i> New Report
            </button> -->
        </header>

        <div class="w-full overflow-x-hidden border-t flex flex-col">
            <main>
                @yield('content')
            </main>

            <footer class="w-full bg-white text-center p-4">
                <div>
                    <p>&copy; Copyright {{date('Y')}}. Okono Wilfried, développeur full stack</p>
                </div>
                <div>
                    <a class="m-2" href="https://www.linkedin.com/in/wilfried-lo%C3%AFc-okono-mehitang-11a380218/)"><i
                            class="fa-brands fa-linkedin"></i></a>
                    <a class="m-2" href="https://twitter.com/OkonoWilfried"><i class="fa-brands fa-twitter"></i></a>
                    <a class="m-2" href="https://github.com/OkonoWil"><i class="fa-brands fa-github"></i></a>
                </div>
            </footer>
        </div>

    </div>
    <form action="" id="techform" class="hidden">
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

    </form>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <!-- Font Awesome -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"
        integrity="sha256-KzZiKy0DWYsnwMF+X1DvQngQ2/FxF7MF3Ff72XcpuPs=" crossorigin="anonymous"></script>
    <!-- ChartJS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"
        integrity="sha256-R4pqcOYV8lt7snxMQO/HSbVCFRPMdrhAFMH+vr9giYI=" crossorigin="anonymous"></script>

    <script>
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
        });
    </script>
</body>

</html>