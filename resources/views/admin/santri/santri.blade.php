<x-app-layout>
    <x-slot name="header">
        {{ __(' Daftar Data Santri') }}
    </x-slot>
    <div class="inline-flex overflow-hidden  w-full bg-white  shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div class=" w-full px-2 py-2 ">
            <div class=" bg-white  shadow-xs">
                <div class=" bg-gray-50 ">
                    <div class="overflow-hidden mb-2 w-full  border shadow-xs">
                        <div class="overflow-x-auto w-full">
                            <div class=" w-full px-2 grid grid-cols-2  ">
                                <div class=" py-1 font-semibold  text-green-800">
                                    <a href="/santri/create"><button
                                            class="px-2 py-1 inline-block bg-green-800  text-white rounded-md"><svg
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" class="  inline-block bi bi-person-plus-fill"
                                                viewBox="0 0 16 16">
                                                <path
                                                    d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                                <path fill-rule="evenodd"
                                                    d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                            </svg> Siswa</button></a>
                                </div>
                                <div class="grid justify-items-end grid-cols-1   py-1">
                                    <form action="/santri" method="get">
                                        <input type="text" name="cari" value="{{ request('cari') }}"
                                            class=" border border-green-800 text-green-800 rounded-md py-1 px-4"
                                            placeholder=" Cari ..">
                                        <button type="submit" class="  bg-green-800 py-1 px-2 rounded-md text-white">
                                            Cari</button>
                                    </form>
                                </div>
                            </div>
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="  text-xs font-semibold tracking-wide text-left text-gray-500 capitalize  bg-gray-50 border-b">
                                        <th class="px-1 py-2 border text-center ">Aksi</th>
                                        <th class="px-1 py-2 border text-center  ">ID</th>
                                        <th class="px-1 py-2 border text-center ">#</th>
                                        <th class="px-1 py-2 border text-center  ">Nomor Induk Siswa</th>
                                        <th class="px-1 py-2 border  ">Nama Santri</th>
                                        <th class="px-1 py-2 border   text-center">JK</th>
                                        <th class="px-1 py-2 border   text-center">Tanggal Lahir</th>
                                        <th class="px-1 py-2 border   text-center">Asrama</th>
                                        <th class="px-1 py-2 border   text-center">KLS</th>
                                        <th class="px-1 py-2 border   text-center">Angkatan</th>
                                        <th class="px-1 py-2 border   text-center">Status</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y capitalize">
                                    @if($listSantri->count())
                                    @foreach ($listSantri as $s)
                                    <tr class="text-gray-700 text-xs  hover:bg-gray-50">
                                        <td class=" px-4 py-1 text-sm">
                                            <div class=" flex">
                                                <div class="flex">
                                                    <form action="/santri/{{$s->id}}" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class=" text-green-800"
                                                            onclick="return confirm (' Apakah Anda Ingin Menghapus Data ini : {{$s->nama_santri}}')"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-trash text-red-600" viewBox="0 0 16 16">
                                                                <path
                                                                    d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                <path fill-rule="evenodd"
                                                                    d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                            </svg></button>
                                                    </form>
                                                </div>
                                                <div class=" flex">
                                                    <a href="/santri/{{$s->id}}/edit"
                                                        onclick="return confirm (' Apakah Anda Ingin Mengubah Data ini : {{$s->nama_santri}}')">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                            fill="currentColor"
                                                            class="bi bi-pencil-square text-green-800 "
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                                            <path fill-rule="evenodd"
                                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                                        </svg>
                                                    </a>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-1 py-1 border text-sm  ">
                                            <a href="/santri/{{ $s->id }}">{{ $s->id}}</a>
                                        </td>
                                        <td class="px-1 py-1  text-sm border text-center ">
                                            {{ $loop->iteration}}
                                        </td>
                                        <td class="px-1 py-1 border text-sm text-center ">
                                            @if ($s->historiTerakhir !== null)
                                            {{ $s->historiTerakhir->nis }}
                                            @else
                                            <div class=" text-red-600">
                                                NIS
                                            </div>
                                            @endif
                                        </td>

                                        <td class="px-1 py-1 border text-sm  ">
                                            <a href="/santri/{{ $s->id }}">{{ $s->nama_santri}}</a>
                                        </td>

                                        <td class=" px-2 py-1 border text-sm text-center">
                                            {{ $s->jenis_kelamin }}
                                        </td>

                                        <td class="px-1 py-1 border text-sm text-center">
                                            {{ date_format(date_create($s->tanggal_lahir),'d-m-Y') }}
                                        </td>
                                        <td class=" px-1 py-1 border text-sm text-center ">
                                            <a href="/asrama">
                                                @if($s->asramaTerakhir !== null)
                                                {{ $s->asramaTerakhir->asrama->nama_asrama }}
                                                @else
                                                <div class=" text-red-600">
                                                    "Asrama"
                                                </div>
                                                @endif
                                            </a>
                                        </td>
                                        <td class=" px-1 py-1 border text-sm text-center ">
                                            <a href="/kelas">
                                                @if($s->kelassantriTerakhir !== null)
                                                {{ $s->kelassantriTerakhir}}
                                                @else
                                                <div class=" text-red-600">
                                                    "Asrama"
                                                </div>
                                                @endif

                                            </a>
                                        </td>
                                        <td class=" px-1 py-1 border text-sm text-center">
                                            @if ($s !== null)
                                            <?php
                                            $date = date_create($s->tanggal_masuk);
                                            echo date_format($date, "Y");
                                            ?>
                                            @endif
                                        </td>
                                        <td class=" px-1 py-1 border text-sm text-center">
                                            Aktif
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr class="bg-gray-50">
                                        <td colspan="9" class="   px-1 py-2 text-sm text-center font-semibold">Data
                                            tidak
                                            tersedia !!!</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class=" text-center px-4 py-1 text-xs font-semibold tracking-wide text-gray-500 bg-gray-50 border-t
                                                ">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

</x-app-layout>