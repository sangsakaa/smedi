<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard Utama') }}
    </x-slot>
    <div class=" grid w-full gap-2  grid-cols-1 sm:grid-cols-4 sm:text-sm">
        <!-- str -->
        <div class=" grid grid-cols-1 w-full">
            <div class="inline-flex overflow-hidden mb-2 bg-gray-100 rounded-lg shadow-md">
                <div class="flex justify-center items-center w-1 bg-blue-800">
                </div>
                <div class=" w-full  px-2 py-2">
                    <div class=" grid grid-cols-2 gap-2 w-full">
                        <div class=" py-4 px-2">
                            <span class="font-semibold text-green-800"> Santri Putra</span>
                            <p class=" text-purple-800 lg:text-4xl  text-5xl">{{ $l }}</p>Santriwan
                        </div>
                        <div class=" grid  grid-cols-1    ">
                            <div
                                class=" bg-blue-400 lg:px-2 lg:py-1    px-8 py-2   lg:grid-cols-1 sm:grid-cols-1  rounded-lg ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="110" height="110" fill="currentColor"
                                    class="bi bi-people-fill text-purple-800 " viewBox="0 0 16 16">
                                    <path
                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd"
                                        d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                </svg>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end -->
        <!-- str -->
        <div class=" grid grid-cols-1 sm:grid-cols-1 w-full">
            <div class="inline-flex overflow-hidden mb-2  bg-gray-150 rounded-lg shadow-md">
                <div class="flex justify-center items-center w-1 bg-blue-800">
                </div>
                <div class=" w-full  px-2 py-2">
                    <div class=" grid grid-cols-2 gap-2 w-full">
                        <div class=" py-4 px-2">
                            <span class="font-semibold text-green-800"> Santri Putri</span>
                            <p class=" text-purple-800 lg:text-4xl  text-5xl">{{ $p }}</p>Santriwati
                        </div>
                        <div class=" grid  grid-cols-1    ">
                            <div
                                class=" bg-blue-800 lg:px-2 lg:py-1  px-8   lg:grid-cols-1 sm:grid-cols-1  rounded-lg ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="110" height="110" fill="currentColor"
                                    class="bi bi-people-fill text-purple-800 " viewBox="0 0 16 16">
                                    <path
                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd"
                                        d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                </svg>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end -->
        <!-- str -->
        <div class=" grid grid-cols-1 w-full">
            <div class="inline-flex overflow-hidden mb-2  bg-gray-150 rounded-lg shadow-md">
                <div class="flex justify-center items-center w-1 bg-blue-800">
                </div>
                <div class=" w-full  px-2 py-2">
                    <div class=" grid grid-cols-2 gap-2 w-full">
                        <div class=" py-4 px-2">
                            <span class="font-semibold text-green-800 text-sm sm:text-sm"> Total Putra
                                Putri</span>
                            <p class=" text-purple-800 lg:text-4xl  text-5xl">{{ $putra }}</p>Santriwan
                        </div>
                        <div class=" grid  grid-cols-1    ">
                            <div
                                class=" bg-purple-200 lg:px-2 lg:py-1 px-8   lg:grid-cols-1 sm:grid-cols-1  rounded-lg ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="110" height="110" fill="currentColor"
                                    class="bi bi-people-fill text-purple-800 " viewBox="0 0 16 16">
                                    <path
                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd"
                                        d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                </svg>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end -->
        <!-- str -->
        <div class=" grid grid-cols-1 w-full">
            <div class="inline-flex overflow-hidden mb-2  bg-blue-400 rounded-lg shadow-md">
                <div class="flex justify-center items-center w-1 bg-blue-800">
                </div>
                <div class=" w-full  px-2 py-2">
                    <div class=" grid grid-cols-2 gap-2 w-full">
                        <div class=" py-4 px-2">
                            <span class="font-semibold text-green-800"> Total Asrama</span>
                            <p class=" text-purple-800 lg:text-4xl  text-5xl">{{$asrama}}</p>Putra Putri
                        </div>
                        <div class=" grid  grid-cols-1    ">
                            <div class=" bg-blue-800 lg:px-2 lg:py-1 px-8   lg:grid-cols-1 sm:grid-cols-1  rounded-lg ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="110" height="110" fill="currentColor"
                                    class="bi bi-people-fill text-purple-800 " viewBox="0 0 16 16">
                                    <path
                                        d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                    <path fill-rule="evenodd"
                                        d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                                </svg>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- end -->
    </div>
    <!-- str -->
    <div class=" grid w-full gap-2  md:grid-cols-2 sm:grid-cols-1 sm:text-sm">
        <!-- str -->
        <div class=" grid grid-cols-1 w-full">
            <div class="inline-flex overflow-hidden mb-2  bg-gray-150 rounded-lg shadow-md">
                <div class="flex justify-center items-center w-1 bg-blue-800">
                </div>
                <div class=" w-full  px-2 py-2">
                    <div class=" grid grid-cols-1 text-2xl gap-2 w-full">
                        @foreach($as as $as)
                        <a href="/asrama/{{ $as->id}}">
                            <div class="  bg-blue-300 px-2 py-2  text-purple-800 rounded-md">
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
            <div class="inline-flex overflow-hidden mb-2  bg-gray-150 rounded-lg shadow-md">
                <div class="flex justify-center items-center w-1 bg-blue-800">
                </div>
                <div class=" w-full  px-2 py-2">
                    <div class=" grid grid-cols-1 text-2xl gap-2 w-full">
                        @foreach($asi as $as)
                        <a href="/asrama/{{ $as->id}}">
                            <div class="   bg-blue-400 px-2 py-2  text-purple-800 rounded-md">
                                {{ $as->nama_asrama  }} <span class=" float-right">{{$as->hitung}}</span>
                            </div>
                        </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- end -->
    </div>
    <!-- end -->
</x-app-layout>