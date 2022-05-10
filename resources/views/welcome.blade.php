<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MADIN</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/init-alpine.js') }}"></script>
    </head>

    <body class=" bg-green-200">
        <div class=" h-1 fixed-bottom bg-red-500">
        </div>
        <div class=" fixed  bg-green-800 shadow-lg text-white w-full">
            <div class=" px-6 py-2  text-center text-5xl">
                MADIN ULA WAHIDIYAH
            </div>
        </div>
        <div class="  grid grid-cols-2">
            <div class="rounded-lg w-1/2  px-4 py-4 ">
                <img class=" fixed" src="images/01.png" alt="">
            </div>
            <div class="rounded-lg px-4  py-4 ">
                <img class=" w-1/2 px-2 fixed" src="images/02.png" alt="">
            </div>
        </div>
    </body>

</html>