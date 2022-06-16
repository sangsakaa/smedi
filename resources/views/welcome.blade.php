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
        <div class=" h-52 grid grid-cols-1 text-center  bg-green-800  text-white content-center">
            <h2 class=" text-5xl  uppercase content-center   ">
                <hr class=" mt-1">
                Madrasah Diniyah Wahidiyah
                <hr class=" mt-1">
            </h2>

        </div>
    </body>

</html>