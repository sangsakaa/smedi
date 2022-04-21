<x-app-layout>
    <x-slot name="header">
        {{ __(' Detail Detail Perangkat') }}
    </x-slot>

    <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-800">
        </div>
        <div class="px-4 py-2 -mx-3">
            <div class="mx-3 font-semibold uppercase text-green-800">
                <a href="/perangkat">
                    <button class=" bg-green-800 text-white rounded-md px-1">KEMBALI</button>
                </a>

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
                                        : {{ $perangkat->nama_perangkat }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-sm">
                                        Jenis Kelamin
                                    </td>
                                    <td class="px-4 py-2 text-sm">
                                        : {{ $perangkat->jenis_kelamin }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-sm">
                                        Agama
                                    </td>
                                    <td class="px-4 py-2 text-sm">
                                        : {{ $perangkat->agama }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-sm">
                                        Tempat , Tanggal Lahir
                                    </td>
                                    <td class="px-4 py-2 text-sm">
                                        : {{ $perangkat->tempat_lahir}} ,{{ $perangkat->tgl_lahir}}
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