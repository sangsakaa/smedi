<x-app-layout>
    <x-slot name="header">
        {{ __(' Detail Riwayat Pelanggaran') }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-4 w-full bg-white  shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-800">
        </div>
        <div class="px-4 py-2 -mx-3">
            <div class="mx-3 text-green-800 font-semibold">

                <a href="/santri/{{$santri->id}}"><button class=" bg-green-800 px-2 py-1 text-white rounded-md"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-arrow-left inline-block" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                        </svg> Kembali</button></a>
            </div>
        </div>
    </div>
    <div class="inline-flex overflow-hidden mb-4 w-full bg-white  shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-800">
        </div>
        <div class=" w-full py-2">
            <div class="mx-3  font-semibold">
                <div class="overflow-hidden mb-2  border shadow-xs">
                    <div class="overflow-x-auto ">
                        <table class=" w-full  whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-white  uppercase bg-green-800 border-b">
                                    <th class=" px-4 py-3">
                                        Detail Data Santri
                                    </th>
                                    <th class=" px-4 py-3">
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y">
                                <tr class="text-gray-700">
                                    @if( $santri !== null)
                                    <td class="px-4 py-2 text-sm  ">
                                        Nama Lengkap
                                    </td>
                                    <td class="px-4 py-2 text-sm">
                                        : {{ $santri->nama_santri}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-sm">
                                        Jenis Kelamin
                                    </td>
                                    <td class="px-4 py-2 text-sm">
                                        : {{ $santri->jenis_kelamin}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-sm">
                                        Agama
                                    </td>
                                    <td class="px-4 py-2 text-sm">
                                        : {{ $santri->agama}}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="px-4 py-2 text-sm">
                                        Tempat Lahir , Tanggal Lahir
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
                                @endif
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- form input Histori -->
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white  shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>

        <div class=" w-full px-2 py-4 ">
            <div class="mx-3">
                <div class=" bg-white  shadow-xs">
                    <form action="/historipelanggaran/{{$santri->id}}" method="post">
                        @csrf
                        <div class=" grid grid-cols-1 sm:grid-cols-4 gap-2">
                            <input name="santri_id" type="hidden"
                                class=" border border-green-800  px-2 text-sm  rounded-md"
                                placeholder=" Masuk nama Lengkap " value="{{$santri->id}}">
                            <select name="pelanggaran_id" id="" class=" border border-green-800  py-1 px-2  rounded-md">
                                <option value=""> Pilih Jenis Pelanggaran </option>
                                @foreach( $list as $l)
                                <option value="{{$l->id}}">
                                    {{ $l->pelanggaran }}
                                </option>
                                @endforeach
                            </select>
                            <input name="waktu" type="date" class=" border border-green-800  py-1 px-2  rounded-md">
                            <input name="keterangan" type="text" placeholder=" keterangan"
                                class=" border border-green-800  py-1 px-2 rounded-md">
                            <button type="submit" class=" bg-green-800 rounded-md text-white py-1 "> Kasus</button>


                        </div>
                    </form>
                    <div class=" mt-2 bg-gray-50">
                        <div class="overflow-hidden mb-2 w-full  border shadow-xs">
                            <div class="overflow-x-auto w-full">
                                <table class="w-full whitespace-no-wrap">
                                    <thead>
                                        <tr
                                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                                            <th class="px-4 py-3">#</th>
                                            <th class="px-4 py-3">Nama Pelanggar</th>
                                            <th class="px-4 py-3">Jenis Pelanggaran</th>
                                            <th class="px-4 py-3">Level</th>
                                            <th class="px-4 py-3">Poin</th>
                                            <th class="px-4 py-3">Waktu Pelanggaran</th>
                                            <th class="px-4 py-3">Keterangan</th>
                                            <th class="px-4 py-3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y">
                                        @foreach( $pelanggaran as $langgar)
                                        <tr class="text-gray-700">
                                            <td class="px-4 py-3 text-sm">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                @if($langgar->santri !== null)
                                                {{ $langgar->santri->nama_santri}}
                                                @endif
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $langgar->santripelanggaran->pelanggaran }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $langgar->santripelanggaran->level }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $langgar->santripelanggaran->poin }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $langgar->waktu}}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{ $langgar->keterangan}}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <form action="/historipelanggaran/{{$langgar->id}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class=" text-green-800"
                                                        onclick="return confirm (' Apakah Anda Ingin Menghapus Data ini : ')"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                            <path
                                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                            <path fill-rule="evenodd"
                                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                        </svg></button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div
                                class="px-4 py-1 text-xs font-semibold tracking-wide text-gray-500  bg-gray-50 border-t sm:grid-cols-9">
                                {{ $pelanggaran->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>