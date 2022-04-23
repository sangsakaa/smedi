<x-app-layout>
    <x-slot name="header">
        {{ __(' Detail Data Santri') }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
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
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-800">
        </div>
    </div>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-800">
        </div>
        <div class=" w-full  py-2">
            <div class="mx-3 font-semibold">
                <div class="overflow-hidden mb-2 w-full rounded-lg border shadow-xs">
                    <div class="overflow-x-auto w-full">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-white uppercase bg-green-800  border-b">
                                    <th class=" px-4 py-3">
                                        Detail Data Santri
                                    </th>
                                    <th class=" px-4 py-3">
                                    </th>
                                </tr>
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