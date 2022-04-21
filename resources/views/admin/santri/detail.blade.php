<x-app-layout>
    <x-slot name="header">
        {{ __(' Detail Data Santri') }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-800">
        </div>
        <div class="px-2 py-2 ">
            <div class=" font-semibold">
                <span>
                    Menu Utama :
                </span>
            </div>
            <a href="/histori/{{$santri->id}}">
                <button class=" text-white bg-green-800  py-1 px-2 rounded-md">Histori Santri</button>
            </a>
            <a href="/historipelanggaran/{{$santri->id}}">
                <button class=" text-white bg-green-800  py-1 px-2 rounded-md">Riwayat Pelanggaran</button>
            </a>
            <a href="/suratizin/{{$santri->id}}">
                <button class=" text-white bg-green-800  py-1 px-2 rounded-md">Surat Izin</button>
            </a>
        </div>
    </div>
    <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-800">
        </div>
        <div class="px-4 py-2 -mx-3">
            <div class="mx-3 font-semibold">
                Detail Data Santri <a href="/santri"><button class=" bg-green-800 px-2 py-1 text-white rounded-md"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                        </svg></button></a>
            </div>
        </div>
    </div>

    <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-800">
        </div>
        <div class=" w-full  py-2">
            <div class="mx-3 font-semibold">
                <div class="overflow-hidden mb-2 w-full rounded-lg border shadow-xs">
                    <div class="overflow-x-auto w-full">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                            </thead>
                            <tbody class="bg-white divide-y">
                                <tr class="text-gray-700">
                                    <td class="px-4 py-2 text-sm  ">
                                        Nama Lengkap
                                    </td>
                                    <td class="px-4 py-2 text-sm">
                                        : {{ $santri->nama_santri }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-sm">
                                        Jenis Kelamin
                                    </td>
                                    <td class="px-4 py-2 text-sm">
                                        : {{ $santri->jenis_kelamin }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-sm">
                                        Agama
                                    </td>
                                    <td class="px-4 py-2 text-sm">
                                        : {{ $santri->agama }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-sm">
                                        Tempat , Tanggal Lahir
                                    </td>
                                    <td class="px-4 py-2 text-sm">
                                        : {{ $santri->tempat_lahir}} ,{{ $santri->tanggal_lahir}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-sm">
                                        Nama Ibu
                                    </td>
                                    <td class="px-4 py-2 text-sm">
                                        : {{ $santri->nama_ibu}}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>