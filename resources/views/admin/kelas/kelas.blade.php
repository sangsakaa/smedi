<x-app-layout>
    <x-slot name="header">
        {{ __(' Daftar Kelas') }}
    </x-slot>

    <div class="inline-flex overflow-hidden mb-4 w-full bg-white  shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-800">
        </div>
        <div class="px-4 py-2 w-full  ">
            <div class=" w-full font-semibold uppercase text-green-800">
                <div class=" grid grid-cols-1 sm:grid-cols-2 gap-2">
                    <div>
                        <a href="/about">
                            <button class="  bg-green-700 py-1 px-4 text-white rounded-md ">
                                Presensi Kelas
                            </button>
                        </a>
                        <a href="/kolektifkelas">
                            <button class="  bg-green-700 py-1 px-4 text-white rounded-md ">
                                Kolektif Kelas
                            </button>
                        </a>

                    </div>
                    <div class=" grid justify-items-end">
                        <form action="/kelas" method="get">
                            <select name="cari" value="{{ request('cari') }}"
                                class="border border-green-800 text-green-800 rounded-md py-1 px-4">

                                <option value="Wustha">Madin Whusto</option>
                                <option value="Ula">Madin Ula</option>
                            </select>
                            <button type="submit" class=" bg-green-800 py-1 px-2 rounded-md text-white">
                                Cari</button>
                        </form>

                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="inline-flex overflow-hidden  w-full bg-white  shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div class=" w-full px-2 py-4 ">
            <div class="">
                <div class=" bg-white rounded-lg shadow-xs">
                    <form action="/kelas" method="post">
                        @csrf
                        <input name="nama_kelas" type="text" class=" border border-green-800 w-1/4 rounded-md px-2 py-1"
                            placeholder=" masukan nama Kelas">
                        <select name="jenjang" id="" class=" border border-green-800 py-1 px-2 rounded-md">
                            <option value="">-- Pilih Jenjang --</option>
                            <option value="Ula">Ula</option>
                            <option value="Whusto">Whusto</option>
                        </select>
                        <button type="submit" class="  bg-green-800 py-1 px-2 rounded-md text-white">
                            Kelas</button>
                    </form>
                    <div class=" w-full sm:w-1/2  bg-gray-50 mt-2">
                        <div class="overflow-hidden  rounded-lg border shadow-xs ">
                            <div class="overflow-x-auto ">
                                <table class=" w-full whitespace-no-wrap" id="#myTable">
                                    <thead>
                                        <tr
                                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                                            <th class="px-4 py-2">#</th>

                                            <th class="px-4 py-2">Kelas</th>
                                            <th class="px-4 py-2">Jenjang</th>
                                            <th class="px-4 py-2 text-center">Peserta</th>

                                            <th class="px-4 py-2">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y capitalize">
                                        @if($datakelas->count())
                                        @foreach( $datakelas as $kelas)
                                        <tr class="text-gray-700 hover:bg-gray-50">
                                            <td class="px-4 py-1 text-sm ">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="px-4 py-1 text-sm ">
                                                <a href="/kelas/{{$kelas->id}}">
                                                    {{ $kelas->nama_kelas }}
                                                </a>
                                            </td>
                                            <td class="px-4 py-1 text-sm ">
                                                {{ $kelas->jenjang }}
                                            </td>
                                            <td class="px-4 py-1 text-sm text-center ">
                                                {{ $kelas->hitung }}
                                            </td>
                                            </td>
                                            <td class=" px-4 py-1 text-sm">
                                                <div class=" flex">
                                                    <div class="flex">
                                                        <form action="/kelas/{{$kelas->id}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class=" text-green-800"
                                                                onclick="return confirm (' Apakah Anda Ingin Menghapus Kelas : {{$kelas->nama_kelas}} ')"><svg
                                                                    xmlns="http://www.w3.org/2000/svg" width="16"
                                                                    height="16" fill="currentColor" class="bi bi-trash"
                                                                    viewBox="0 0 16 16">
                                                                    <path
                                                                        d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                                    <path fill-rule="evenodd"
                                                                        d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                                </svg></button>
                                                        </form>
                                                    </div>
                                                    <div class=" flex">
                                                        <a href="/kelas/{{$kelas->id}}/edit"
                                                            onclick="return confirm (' Apakah Anda Ingin Merubah Kelas : {{$kelas->nama_kelas}} ')">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-pencil-square ml-1 text-green-800 "
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
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr class="bg-gray-50">
                                            <td colspan="5" class="  px-4 py-2 text-sm text-center font-semibold">Data
                                                tidak
                                                tersedia !!!</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class=" px-4 py-1 text-xs font-semibold tracking-wide text-gray-500 bg-gray-50 border-t
                                                sm:grid-cols-9">
                                {{ $datakelas->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>