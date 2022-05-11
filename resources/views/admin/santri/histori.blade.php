<x-app-layout>
    <x-slot name="header">
        {{ __(' Detail Histori Data Santri') }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-800">
        </div>
        <div class="px-4 py-2 -mx-3">
            <div class="mx-3 text-green-800 font-semibold">
                Histori Santri <a href="/santri/{{$santri->id}}"><button
                        class=" bg-green-800 px-2 py-1 text-white rounded-md"><svg xmlns="http://www.w3.org/2000/svg"
                            width="16" height="16" fill="currentColor" class="bi bi-arrow-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd"
                                d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8z" />
                        </svg></button></a>
            </div>
        </div>
    </div>
    <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-800">
        </div>

        <div class=" w-full">
            <div class=" bg-green-50  border sm:text-sm text-sm   px-4 py-2 grid grid-cols-2 sm:grid-cols-2">
                <div>Nama Lengkap</div>
                <div> : {{ $data->nama_santri}}</div>
                <div>Jenis Kelamin</div>
                <div> : {{ $data->jenis_kelamin}}</div>
                <div> Agama</div>
                <div> : {{ $data->agama}}</div>
                <div>Tempat Lahir</div>
                <div> : {{ date_format(date_create($data->tanggal_lahir),'d-m-Y') }}</div>
                <div>Nama Ibu</div>
                <div> : {{ $data->nama_ibu}}</div>
                <div>Angkatan</div>
                <div> : {{ date_format(date_create($data->tanggal_masuk),'Y') }}</div>

            </div>
        </div>
    </div>
    <!-- form input Histori -->
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div class=" w-full  py-4 ">
            <div class="mx-3">
                <div class=" bg-white rounded-lg shadow-xs">
                    <form action="/histori/{{$santri->id}}" method="post">
                        @csrf
                        <div class=" grid grid-cols-1 sm:grid-cols-4 gap-2">
                            <input name="santri_id" type="hidden" value="{{$santri->id}} " class=" px-2  rounded-md">
                            <input type="hidden" name="pondok_id" value="1"
                                class=" border border-green-800 px-2  rounded-md" placeholder="nama_pondok">
                            @if($santri)
                            <input name="nis" type="text" class="sm:py-1 py-2 border border-green-800  px-2  rounded-md"
                                placeholder=" Nomor Induk Santri" value="{{ $santri->nis }}">
                            @else
                            <input name="nis" type="text" class="  px-2  rounded-md" placeholder=" Nomor Induk Santri"
                                value="">
                            @endif
                            <input name="tanggal_masuk" type="date"
                                class=" sm:py-1 py-2 border border-green-800  px-2  rounded-md">
                            <select name="status_pendaftaran"
                                class="sm:py-1 py-2 border border-green-800 rounded-md   px-2">
                                <option value="">-Pilih Status-</option>
                                <option value="Santri Baru">Santri Baru</option>
                                <option value="Pindahan">Pindahan</option>
                            </select>
                            <button type="submit"
                                class=" rounded-md text-white sm:py-1 py-2 bg-green-800">simpan</button>
                        </div>
                    </form>
                    <div class=" mt-2 bg-gray-50">
                        <div class="overflow-hidden mb-2 w-full rounded-lg border shadow-xs">
                            <div class="overflow-x-auto w-full">
                                <table class="w-full whitespace-no-wrap">
                                    <thead>
                                        <tr
                                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                                            <th class="px-4 py-3">#</th>
                                            <th class="px-4 py-3"> Status Pendaftar</th>
                                            <th class="px-4 py-3"> Nomor Induk Santri</th>
                                            <th class="px-4 py-3">Nama Santri</th>
                                            <th class="px-4 py-3">Tanggal Masuk</th>
                                            <th class="px-4 py-3">Pondok / Instansi</th>
                                            <th class="px-4 py-3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y">
                                        @foreach ($h as $histori)
                                        <tr class="text-gray-700">
                                            <td class="px-4 py-3 text-sm">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{$histori->status_pendaftaran }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{$histori->santri->nis }}
                                            </td>

                                            <td class="px-4 py-3 text-sm">
                                                {{$histori->santri->nama_santri }}

                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{$histori->tanggal_masuk }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                {{$histori->pondok->nama_pondok }}
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <form action="/histori/{{$histori->id}}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit"
                                                        class=" rounded-md text-green-800  py-1 px-2 "><svg
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
                                {{ $h->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>