<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard Utama') }}
    </x-slot>
    <div class=" grid grid-cols-2 sm:grid-cols-4 w-full gap-2 ">
        <div class=" bg-green-200  rounded-md">
            <div class=" py-2 px-2">
                <span class="font-semibold text-green-700"> Santri Putra</span>
                <p class=" text-green-800 lg:text-4xl  text-5xl">{{ $l }}</p>Santriwan
            </div>
        </div>
        <div class=" bg-green-200  rounded-md">
            <div class=" py-2 px-2">
                <span class="font-semibold text-green-700"> Santri Putra</span>
                <p class=" text-green-800 lg:text-4xl  text-5xl">{{ $p }}</p>Santriwan
            </div>
        </div>
        <div class=" bg-green-200  rounded-md">
            <div class=" py-2 px-2">
                <span class="font-semibold text-green-700"> Santri Putra</span>
                <p class=" text-green-800 lg:text-4xl  text-5xl">{{ $putra }}</p>Santriwan
            </div>
        </div>
        <div class=" bg-green-200  rounded-md">
            <div class=" py-2 px-2">
                <span class="font-semibold text-green-700"> Total Asrama</span>
                <p class=" text-green-800 lg:text-4xl  text-5xl">{{ $asrama }}</p>Putra Putri
            </div>
        </div>
    </div>

    <!-- str -->
    <div class=" grid w-full gap-2  md:grid-cols-2 sm:grid-cols-1 sm:text-sm">
        <!-- str -->
        <div class=" grid grid-cols-1 w-full">
            <div class="inline-flex overflow-hidden mt-2  bg-green-200 rounded-lg shadow-md">
                <div class="flex justify-center items-center w-1 ">
                </div>
                <div class=" w-full  px-2 py-2">
                    <div class=" grid grid-cols-1 text-2xl gap-2 w-full">
                        @foreach($as as $as)
                        <a href="/asrama/{{ $as->id}}">
                            <div class="  bg-green-300 px-2 py-2  text-green-800 rounded-md">
                                {{ $as->nama_asrama  }} <span class=" float-right">{{$as->hitung}}</span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- end -->
        <!-- str -->
        <div class=" grid grid-cols-1 w-full">
            <div class="inline-flex overflow-hidden mb-2  bg-green-200 rounded-lg shadow-md">
                <div class="flex justify-center items-center w-1 ">
                </div>
                <div class=" w-full  px-2 py-2">
                    <div class=" grid grid-cols-1 text-2xl gap-2 w-full">
                        @foreach($asi as $as)
                        <a href="/asrama/{{ $as->id}}">
                            <div class="    px-2 py-2  text-green-800 rounded-md">
                                {{ $as->nama_asrama  }} <span class=" float-right">{{$as->hitung}}</span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class=" grid grid-cols-1 w-full">
            <div class="inline-flex overflow-hidden mb-2  bg-green-200 rounded-lg shadow-md">
                <div class="flex justify-center items-center w-1 ">
                </div>
                <div class=" w-full  px-2 py-2">
                    <div class=" grid grid-cols-1 text-2xl gap-2 w-full">

                        <div class="    px-2 py-2  text-green-800 rounded-md">

                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end -->
    </div>
    <!-- end -->
</x-app-layout>