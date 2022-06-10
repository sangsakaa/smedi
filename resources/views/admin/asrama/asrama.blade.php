<x-app-layout>
    <x-slot name="header">
        {{ __(' Daftar Data Asrama') }}
    </x-slot>


    <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-800">
        </div>
        <div class=" grid grid-cols-1 gap-2 px-4 py-1 sm:grid-cols-2">
            <form action="/asrama" method="get">
                <input type="text" name="cari" value="{{ request('cari') }}" class=" border border-green-800 text-green-800 rounded-md py-1 px-4" placeholder=" Cari ..">
                <button type="submit" class=" bg-green-800 py-1 px-2 rounded-md text-white">
                    Cari</button>
            </form>
            <div>
                <a href="asramasantri/add_many">
                    <button type="submit" class=" bg-green-800 py-1 px-2 rounded-md text-white">
                        Tambah Kolektif</button>
                </a>
            </div>
        </div>
    </div>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div class=" w-full px-2 py-4 ">
            <div class="mx-3">
                <div class=" bg-white rounded-lg shadow-xs">
                    <form action="/asrama" method="post">
                        @csrf
                        <div class=" gap-2 grid grid-cols-1 sm:grid-cols-4">

                            <input name="nama_asrama" type="text" class=" mb-2 border border-green-800 rounded-md py-1 px-4" placeholder=" nama_asrama ">
                            <input name="kuota_asrama" type="text" class=" mb-2 border border-green-800 rounded-md py-1 px-4" placeholder="kuota_asrama ">
                            <select name="type_asrama" id="" class=" mb-2 border border-green-800 py-1 px-2 rounded-md">
                                <option value=""> Pilih Asrama </option>
                                <option value="Putra" @if (old('type_asrama')=="Putra" ) {{ 'selected' }} @endif>
                                    Asrama Putra</option>
                                <option value="Putri" @if (old('type_asrama')=="Putri" ) {{ 'selected' }} @endif>
                                    Asrama Putri</option>
                            </select>
                            <button type="submit" class=" mb-2  bg-green-800 py-1 px-2 rounded-md text-white" onClick="swal()">
                                Asrama</button>
                        </div>
                    </form>
                    <div class=" bg-gray-50 mt-2">
                        <div class="overflow-hidden mb-2 w-full rounded-lg border shadow-xs">
                            <div class="overflow-x-auto w-full">
                                <table class="w-full whitespace-no-wrap">
                                    <thead>
                                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                                            <th class="px-4 py-3">#</th>
                                            <th class="px-4 py-3">Nama Asrama</th>
                                            <th class="px-4 py-3 text-center ">Type Asrama</th>
                                            <th class="px-4 py-3 text-center">Total Anggota</th>
                                            <th class="px-4 py-3 text-center">Qty</th>
                                            <th class="px-4 py-3 text-center">Status Asrama</th>
                                            <th class="px-4 py-3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y">
                                        @if($asrama->count())
                                        @foreach ( $asrama as $as)
                                        <tr class="text-gray-700 hover:bg-gray-50">
                                            <td class="px-4 py-1 text-sm ">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="px-4 py-1 text-sm uppercase ">
                                                <a href="asrama/{{$as->id}}">{{ $as->nama_asrama}}</a>
                                            </td>
                                            <td class="px-4 py-1 text-sm text-center ">
                                                {{ $as->type_asrama}}
                                            </td>
                                            <td class="px-4 py-1 text-sm text-center">
                                                {{ $as->hitung}}
                                            </td>
                                            <td class="px-4 py-1 text-sm text-center">
                                                {{ $as->kuota_asrama}}
                                            </td>
                                            <td class=" px-4 py-1 text-sm text-center">

                                                @if (( $as->hitung) === ($as->kuota_asrama))
                                                <span class="   text-green-800 "> Penuh kuota cuma
                                                    {{ ($as->hitung)}}</span>
                                                @elseif (( $as->hitung) > ($as->kuota_asrama))

                                                <span class=" text-red-600">
                                                    Penus lebih {{ (($as->hitung)-$as->kuota_asrama) }} orang
                                                </span>
                                                @else
                                                <span class=" text-green-500"> Masih Bisa
                                                    {{ ($as->kuota_asrama)-($as->hitung) }} Orang</span>
                                                @endif

                                            </td>

                                            <td class=" px-4 py-1 text-sm">
                                                <div class=" flex">
                                                    <div class=" flex">
                                                        <form action="asrama/{{$as->id}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class=" text-green-800" onclick="return confirm (' Apakah Anda Ingin Menghapus Data ini : ')"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                                </svg></button>
                                                        </form>
                                                    </div>
                                                    <div class=" flex">
                                                        <a href="asrama/{{$as->id}}/edit">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square text-green-800 " viewBox="0 0 16 16">
                                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr class="bg-gray-50">
                                            <td class="  px-4 py-2 text-sm text-center">Data tidak tersedia</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="px-4 py-1 text-xs font-semibold tracking-wide text-gray-500  bg-gray-50 border-t sm:grid-cols-9">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>