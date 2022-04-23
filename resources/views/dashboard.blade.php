<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>
    <div class=" flex w-full gap-2 sm:col-span-2">
        <!-- str -->
        <div class="  w-1/4">
            <div class="inline-flex overflow-hidden mb-4 w-full bg-green-200 rounded-lg shadow-md">
                <div class="flex justify-center items-center w-1 bg-green-800">
                </div>
                <div class=" w-full  px-2 py-2">
                    <div class=" grid grid-cols-2 gap-2 w-full">
                        <div class=" py-2 px-2">
                            <span class="font-semibold text-green-800"> Santri Putra</span>
                            <p class=" text-red-700  text-5xl">{{ $l }}</p>Santriwan
                        </div>
                        <div class=" bg-green-800 rounded-md px-4 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                                class="bi bi-people-fill text-white " viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                <path fill-rule="evenodd"
                                    d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end -->
        <!-- str -->
        <div class="  w-1/4">
            <div class="inline-flex overflow-hidden mb-4 w-full bg-green-200 rounded-lg shadow-md">
                <div class="flex justify-center items-center w-1 bg-green-800">
                </div>
                <div class=" w-full  px-2 py-2">
                    <div class=" grid grid-cols-2 gap-2 w-full">
                        <div class=" py-2 px-2">
                            <span class="font-semibold text-green-800"> Santri Putri</span>
                            <p class=" text-red-700  text-5xl">{{ $p }}</p>Santriwati
                        </div>
                        <div class=" bg-green-800 rounded-md px-4 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                                class="bi bi-people-fill text-white " viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                <path fill-rule="evenodd"
                                    d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end -->
        <!-- str -->
        <div class="  w-1/4">
            <div class="inline-flex overflow-hidden mb-4 w-full bg-green-200 rounded-lg shadow-md">
                <div class="flex justify-center items-center w-1 bg-green-800">
                </div>
                <div class=" w-full  px-2 py-2">
                    <div class=" grid grid-cols-2 gap-2 w-full">
                        <div class=" py-2 px-2">
                            <span class="font-semibold text-green-800"> Total</span>
                            <p class=" text-red-700  text-5xl">{{ $putra }}</p>Santri
                        </div>
                        <div class=" bg-green-800 rounded-md px-4 py-2">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                                class="bi bi-people-fill text-white " viewBox="0 0 16 16">
                                <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                <path fill-rule="evenodd"
                                    d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                                <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end -->
        <!-- str -->
        <div class="  w-1/4">
            <div class="inline-flex overflow-hidden mb-4 w-full bg-green-200 rounded-lg shadow-md">
                <div class="flex justify-center items-center w-1 bg-green-800">
                </div>
                <div class=" w-full  px-4 py-2">
                    <div class=" grid grid-cols-2 gap-2 w-full">
                        <div class="  py-2 px-1">
                            <span class="font-semibold text-green-800"> Total Asrama</span>
                            <div class="  grid grid-cols-3  ">
                                <small>Pa :{{$aslk}}</small>
                                <small> Pi :{{$aspr}}</small>
                            </div>
                            <div class=" grid grid-cols-2">
                                <p class=" text-red-700  text-5xl">{{$asrama}}</p>
                            </div>
                        </div>
                        <div class=" bg-green-800 rounded-md px-4 py-2 ">
                            <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor"
                                class="bi bi-bank2 text-white  ml-3 mt-2" viewBox="0 0 16 16">
                                <path
                                    d="M8.277.084a.5.5 0 0 0-.554 0l-7.5 5A.5.5 0 0 0 .5 6h1.875v7H1.5a.5.5 0 0 0 0 1h13a.5.5 0 1 0 0-1h-.875V6H15.5a.5.5 0 0 0 .277-.916l-7.5-5zM12.375 6v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zm-2.5 0v7h-1.25V6h1.25zM8 4a1 1 0 1 1 0-2 1 1 0 0 1 0 2zM.5 15a.5.5 0 0 0 0 1h15a.5.5 0 1 0 0-1H.5z" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end -->
    </div>

</x-app-layout>