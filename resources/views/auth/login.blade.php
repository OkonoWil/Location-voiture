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

            <div class="flex flex-col justify-center md:justify-start my-auto pt-8 md:pt-0 px-8 md:px-24 lg:px-32">
                <p class="text-center text-3xl font-extrabold text-blue-700"><a href="{{route('welcome')}}">LARACAR
                        v.1</a></p>
                <form action="{{route('postlogin')}}" method="post" class="flex flex-col pt-3 md:pt-8">
                    @csrf
                    <div class="flex flex-col pt-4">
                        <label for="email" class="text-lg">Email</label>
                        <input type="email" autocomplete="off" name="email" id="email" placeholder="your@email.com"
                            value="{{old('email')}}"
                            class=" border border-blue-500 outline-blue-400 rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:shadow-outline">
                    </div>

                    <div class=" flex flex-col pt-4">
                        <label for="password" class="text-lg">Password</label>
                        <input type="password" name="password" id="password" placeholder="Password"
                            class="shadow appearance-none border  border-blue-500 outline-blue-400 rounded w-full py-2 px-3 text-gray-700 mt-1 leading-tight focus:shadow-outline">
                    </div>

                    <input type="submit" value="Se connecter"
                        class="bg-blue-700 text-white font-bold text-lg hover:bg-blue-400 p-2 mt-8">
                </form>
                <div class="text-center pt-12 pb-12">
                    <p>Vous n'avez pas de compte? <a href="{{route('home.getContact')}}"
                            class="underline font-semibold  text-blue-700">Contactez nous
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