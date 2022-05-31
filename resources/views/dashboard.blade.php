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
            <div class=" grid py-4 justify-end  ">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
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