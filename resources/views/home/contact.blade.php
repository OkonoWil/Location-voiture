<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('Fontawesome/css/all.css')}}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
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
    <style>
        @import url("https://fonts.googleapis.com/css?family=Karla:400,700&display=swap");

        .font-family-karla {
            font-family: karla;
        }
    </style>
    @vite('resources/css/app.css')
    <title>{{env('APP_NAME')}}|contact</title>
</head>

<body class="bg-white font-family-karla h-screen">

    <div class="w-full flex flex-wrap">

        <!-- Login Section -->
        <div class="w-full md:w-1/2 flex flex-col">

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl font-extrabold text-blue-700"><a href="{{route('welcome')}}">TAC-Auto
                        v.1</a></p>
                <form action="{{route('home.postContact')}}" method="post" class=" flex flex-col pt-3 md:pt-8">
                    @csrf
                    <div class="corps-formulaire flex flex-wrap flex-col sm:flex-row w-full">
                        <div class="gauche w-full">
                            <div class="groupe relative mt-5 flex flex-col">
                                <label for="nom">Votre nom</label>
                                <input type="text" autocomplete="off" value="{{old('name')}}" name="name"
                                    class="@error('message') border-red-500 @enderror mt-1 py-2 pl-7 pr-1 border border-blue-500 outline-blue-400">
                                <i class="fas fa-user absolute l-0 top-8 p-2 text-blue-500"></i>
                                @error('name')
                                <span class="text-sm text-red-500">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="groupe relative mt-5 flex flex-col">
                                <label for="email">Votre adresse e-mail</label>
                                <input type="email" autocomplete="off" value="{{old('email')}}" name="email"
                                    class="@error('message') border-red-500 @enderror mt-1 py-2 pl-7 pr-1 border border-blue-500 outline-blue-400">
                                <i class="fas fa-envelope absolute l-0 top-8 p-2 text-blue-500"></i>
                                @error('email')
                                <span class="text-sm text-red-500">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="groupe relative mt-5 flex flex-col">
                                <label for="email">Votre téléphone</label>
                                <input type="tel" autocomplete="off" value="{{old('tel')}}" name="tel"
                                    class="@error('message') border-red-500 @enderror mt-1 py-2 pl-7 pr-1 border border-blue-500 outline-blue-400">
                                <i class="fas fa-mobile absolute l-0 top-8 p-2 text-blue-500"></i>
                                @error('tel')
                                <span class="text-sm text-red-500">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="droite w-full m-0 mb-7">
                            <div class="groupe relative mt-5 flex flex-col h-full">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" placeholder="Saisissez ici..."
                                    class="@error('message') border-red-500 @enderror mt-1 p-2 border border-blue-500 resize-none h-[100px] sm:h-[80%] w-full outline-blue-400"></textarea>
                                @error('message')
                                <span class="text-sm text-red-500">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="pied-formulaire flex justify-center">
                        <input type="submit" value="Envoyer le message"
                            class="mt-2 text-white bg-blue-500 cursor-pointer rounded-md py-2 px-5 outline-none transition-transform hover:scale-105">
                    </div>
                </form>
                <div class="text-center pt-7 pb-12">
                    <p>Vous avez un compte? <a href="{{route('getlogin')}}"
                            class="underline font-semibold  text-blue-700">Se
                            connecter</a>
                    </p>
                </div>
            </div>

        </div>

        <!-- Image Section -->
        <div class="w-1/2 shadow-2xl">
            <img class="object-cover w-full h-screen hidden md:block"
                src="{{Storage::url('images/pexels-pixabay-164634.jpg')}}">
        </div>
    </div>

</body>

</html>