<!DOCTYPE html>
<html x-data="data" lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'MADIN') }}</title>

        <!-- Styles -->
        <link rel="shortcut icon" href="{{ asset('images/logo.ico') }}" type="image/x-icon">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/init-alpine.js') }}"></script>
        <!-- table -->
    </head>

    <body>
        <div class="flex h-screen bg-gray-50" :class="{ 'overflow-hidden': isSideMenuOpen }">
            <!-- Desktop sidebar -->
            @include('layouts.navigation')
            <!-- Mobile sidebar -->
            <!-- Backdrop -->
            @include('layouts.navigation-mobile')
            <div class="flex flex-col flex-1 w-full">
                @include('layouts.top-menu')
                <main class="h-full overflow-y-auto">
                    <div class="container px-2 py-2 mb-4 grid">
                        <h2 class=" text-2xl font-semibold  text-green-800">
                            <div class=" mb-4 inline-flex overflow-hidden  w-full   rounded-lg shadow-md">
                                <div class="flex justify-center items-center w-1 bg-green-800">

                                </div>
                                <div class="  px-4 py-2 ">
                                    <div class="">
                                        {{ $header }}
                                    </div>
                                </div>
                            </div>
                        </h2>
                        {{ $slot }}
                    </div>
                </main>
                <footer class=" py-2 px-2    bg-green-800 text-white ">
                    <div class=" flex justify-end">
                        &copy; Copyright
                        {{ date("Y") }}
                        -
                        Madrasah
                        Ibtida'iyah
                        Wahidiyah
                    </div>
                </footer>
            </div>
        </div>
        <script type="text/javascript">

        </script>
    </body>

</html>