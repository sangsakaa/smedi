<x-app-layout>
    <x-slot name="header">
        {{ __(' Detail Data Santri') }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-800">
        </div>
        <div class=" grid grid-cols-1 sm:grid-cols-4 py-1 gap-2 px-4 ">
            <div>
                <a href="/histori/{{$santri->id}}">
                    <button class=" px-4 py-1 bg-green-700 rounded-md text-white">Histori</button>
                </a>
                <a href="/historipelanggaran/{{$santri->id}}">
                    <button class=" px-4 py-1 bg-green-700 rounded-md text-white">Histori Pelanggaran</button>
                </a>
            </div>

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
                                    <td class=" w-1/3 sm:px-4 px-2 py-1 text-sm  ">
                                        Nama Lengkap
                                    </td>
                                    <td class="sm:px-4 w px-2 py-1 text-sm">
                                        : {{ $santri->nama_santri }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sm:px-4 px-2 py-1 text-sm">
                                        Jenis Kelamin
                                    </td>
                                    <td class="sm:px-4 px-2 py-1 text-sm">
                                        : {{ $santri->jenis_kelamin }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sm:px-4 px-2 py-1 text-sm">
                                        Agama
                                    </td>
                                    <td class="sm:px-4 px-2 py-1 text-sm">
                                        : {{ $santri->agama }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sm:px-4 px-2 py-1 text-sm">
                                        Tempat
                                    </td>
                                    <td class="sm:px-4 px-2 py-1 text-sm">
                                        : {{ $santri->tempat_lahir}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sm:px-4 px-2 py-1 text-sm">
                                        Tanggal Lahir
                                    </td>
                                    <td class="sm:px-4 px-2 py-1 text-sm">
                                        : {{ $santri->tanggal_lahir}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="sm:px-4 px-2 py-1 text-sm">
                                        Nama Ibu
                                    </td>
                                    <td class="sm:px-4 px-2 py-1 text-sm">
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
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-800">
        </div>
        <div class="  border px-4 py-2 grid grid-cols-2">
            <div class=" border  w-1/2">TGL</div>
            <div class=" border">KELAS</div>
            @foreach($presensi as $presensi)
            {{ $loop->iteration }}
            @endforeach

        </div>
    </div>
</x-app-layout>