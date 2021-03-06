<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard Utama') }}
    </x-slot>
    <div class=" grid grid-cols-1 sm:grid-cols-4 w-full gap-2 text-blue-700 ">
        <div class="inline-flex overflow-hidden  mb-2 w-full bg-white  shadow-md">
            <div class="flex justify-center items-center w-1 bg-blue-800">
            </div>
            <div class=" w-full bg-blue-200  px-4   grid grid-cols-2">
                <div class=" grid content-center text-blue-700">
                    <span class="font-semibold text-blue-700"> Santri Putra</span>
                    <p class=" text-blue-700 lg:text-4xl  text-5xl">{{ $l }}</p>Santriwan
                </div>
                <div class=" grid  justify-end content-center  ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                        class="bi bi-people text-blue-700" viewBox="0 0 16 16">
                        <path
                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                    </svg>
                </div>
            </div>

        </div>
        <div class="inline-flex overflow-hidden  mb-2 w-full bg-white  shadow-md">
            <div class="flex justify-center items-center w-1 bg-blue-800">
            </div>

            <div class=" w-full bg-blue-200  px-4   grid grid-cols-2">
                <div class=" grid content-center">
                    <span class="font-semibold text-blue-700"> Santri Putri</span>
                    <p class=" text-blue-800 lg:text-4xl  text-5xl">{{ $p }}</p>Santriwati
                </div>
                <div class=" grid  justify-end content-center  ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                        class="bi bi-people text-pink-600 " viewBox="0 0 16 16">
                        <path
                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                    </svg>
                </div>
            </div>

        </div>
        <div class="inline-flex overflow-hidden  mb-2 w-full bg-white  shadow-md">
            <div class="flex justify-center items-center w-1 bg-blue-800">
            </div>

            <div class=" w-full bg-blue-200  px-4   grid grid-cols-2">
                <div class=" grid content-center">
                    <span class="font-semibold text-blue-700"> Total Santri</span>
                    <p class=" text-blue-800 lg:text-4xl  text-5xl">{{ $putra }}</p>Santriwan
                </div>
                <div class=" grid  justify-end content-center  ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                        class="bi bi-people text-blue-800" viewBox="0 0 16 16">
                        <path
                            d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                    </svg>
                </div>
            </div>

        </div>
        <div class="inline-flex overflow-hidden  mb-2 w-full bg-white  shadow-md">
            <div class="flex justify-center items-center w-1 bg-blue-800">
            </div>

            <div class=" w-full bg-blue-200  px-4   grid grid-cols-2">
                <div class=" grid content-center">
                    <span class="font-semibold text-blue-700"> Asrama</span>
                    <p class=" text-blue-700 lg:text-4xl  text-5xl">{{ $asrama }}</p>Pa :{{ $aslk }} Pi : {{ $aspr }}
                </div>
                <div class=" grid  justify-end content-center  ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="85" height="85" fill="currentColor"
                        class="bi bi-house-fill text-blue-800" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                        <path fill-rule="evenodd"
                            d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>