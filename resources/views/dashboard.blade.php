<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard Utama') }}
    </x-slot>
    <div class=" grid grid-cols-2 sm:grid-cols-4 w-full gap-2 ">
        <div class=" bg-green-200  rounded-md">
            <div class=" py-2 px-4">
                <span class="font-semibold text-green-700"> Santri Putra</span>
                <p class=" text-green-800 lg:text-4xl  text-5xl">{{ $l }}</p>Santriwan
            </div>
        </div>
        <div class=" bg-green-200  rounded-md">
            <div class=" py-2 px-4">
                <span class="font-semibold text-green-700"> Santri Putri</span>
                <p class=" text-green-800 lg:text-4xl  text-5xl">{{ $p }}</p>Santriwan
            </div>
        </div>
        <div class=" bg-green-200  rounded-md">
            <div class=" py-2 px-4">
                <span class="font-semibold text-green-700"> Total Santri</span>
                <p class=" text-green-800 lg:text-4xl  text-5xl">{{ $putra }}</p>Santriwan
            </div>
        </div>
        <div class=" bg-green-200  rounded-md">
            <div class=" py-2 px-4">
                <span class="font-semibold text-green-700"> Total Asrama</span>
                <p class=" text-green-800 lg:text-4xl  text-5xl">{{ $asrama }}</p>Putra Putri
            </div>
        </div>
        @foreach($kelas as $kelas)
        <a href="/kelas">
            <div class=" bg-green-200 px-2 py-2 rounded-md">
                <div class=" grid grid-cols-2">
                    <div>{{ $kelas->nama_kelas }}</div>
                    <div class=" text-right px-2">{{$kelas->hitung}}</div>
                </div>
            </div>
        </a>
        @endforeach

    </div>
</x-app-layout>