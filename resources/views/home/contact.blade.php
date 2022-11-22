<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        @import url("https://fonts.googleapis.com/css?family=Karla:400,700&display=swap");

        .font-family-karla {
            font-family: karla;
        }
    </style>
    @vite('resources/css/app.css')
    <title>{{env('APP_NAME')}}|login</title>
</head>

<body class="bg-white font-family-karla h-screen">

    <div class="w-full flex flex-wrap">

        <!-- Login Section -->
        <div class="w-full md:w-1/2 flex flex-col">

            <div class="flex justify-center md:justify-start pt-12 md:pl-12 md:-mb-24">
                <a href="#" class="bg-black text-white font-bold text-xl p-4">Logo</a>
            </div>

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl">LARACAD v.1</p>
                <form action="{{route('home.postContact')}}" method="post" class=" flex flex-col pt-3 md:pt-8">
                    @csrf
                    <div class="corps-formulaire flex flex-wrap flex-col sm:flex-row w-full">
                        <div class="gauche w-full sm:w-[45%]">
                            <div class="groupe relative mt-5 flex flex-col">
                                <label for="nom">Votre nom</label>
                                <input type="text" autocomplete="off"
                                    value="{{old('name') ?? Auth::check() ? Auth::user()->name : ''}}" name="name"
                                    class="mt-1 py-2 pl-7 pr-1 border border-orange-500 outline-orange-400">
                                <i class="fas fa-user absolute l-0 top-8 p-2 text-orange-500"></i>
                            </div>
                            <div class="groupe relative mt-5 flex flex-col">
                                <label for="email">Votre adresse e-mail</label>
                                <input type="email" autocomplete="off"
                                    value="{{old('email') ?? Auth::check() ? Auth::user()->email: ''}}" name="email"
                                    class="mt-1 py-2 pl-7 pr-1 border border-orange-500 outline-orange-400">
                                <i class="fas fa-envelope absolute l-0 top-8 p-2 text-orange-500"></i>
                            </div>
                            <div class="groupe relative mt-5 flex flex-col">
                                <label for="email">Votre téléphone</label>
                                <input type="tel" autocomplete="off" value="{{old('tel')}}" name="tel"
                                    class="mt-1 py-2 pl-7 pr-1 border border-orange-500 outline-orange-400">
                                <i class="fas fa-mobile absolute l-0 top-8 p-2 text-orange-500"></i>
                            </div>
                        </div>
                        <div class="droite w-full sm:w-[45%] m-0 sm:ml-10">
                            <div class="groupe relative mt-5 flex flex-col h-full">
                                <label for="message">Message</label>
                                <textarea name="message" id="message" placeholder="Saisissez ici..."
                                    class="mt-1 p-2 border border-orange-500 resize-none h-[100px] sm:h-[80%] w-full outline-orange-400"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="pied-formulaire flex justify-center">
                        <input type="submit" value="Envoyer le message"
                            class="mt-2 text-white bg-orange-500 cursor-pointer rounded-md py-2 px-5 outline-none transition-transform hover:scale-105">
                    </div>
                </form>
                <div class="text-center pt-12 pb-12">
                    <p>Vous n'avez pas de compte? <a href="{{route('home.getContact')}}"
                            class="underline font-semibold">Contactez nous
                            ici.</a>
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