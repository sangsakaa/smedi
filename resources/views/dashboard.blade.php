<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard Utama') }}
    </x-slot>
    <div class=" grid grid-cols-1 sm:grid-cols-4 w-full gap-2 ">
        <div class=" bg-green-200  rounded-md  grid grid-cols-2">
            <div class=" py-2 px-4">
                <span class="font-semibold text-green-700"> Santri Putra</span>
                <p class=" text-green-800 lg:text-4xl  text-5xl">{{ $l }}</p>Santriwan
            </div>
            <div class=" grid py-4 justify-end px-4  ">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                    class="bi bi-people" viewBox="0 0 16 16">
                    <path
                        d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z" />
                </svg>
            </div>
        </div>
        <div class=" bg-green-200  rounded-md">
            <div class=" py-2 px-4">
                <span class="font-semibold text-green-700"> Santri Putri</span>
                <p class=" text-green-800 lg:text-4xl  text-5xl">{{ $p }}</p>Santriwati
            </div>
        </div>
        <div class=" bg-green-200  rounded-md grid-cols-2">
            <div class=" py-2 px-4">
                <span class="font-semibold text-green-700"> Total Santri</span>
                <p class=" text-green-800 lg:text-4xl  text-5xl">{{ $putra }}</p>Santriwan
            </div>

        </div>
        <div class=" bg-green-200  rounded-md grid grid-cols-2">
            <div class=" py-2 px-4">
                <span class="font-semibold text-green-700"> Total Asrama</span>
                <p class=" text-green-800 lg:text-4xl  text-5xl">{{ $asrama }}</p>Putra Putri
            </div>
            <div class=" grid py-4 justify-end  ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                </svg>
            </div>
        </div>

    </div>
</x-app-layout>