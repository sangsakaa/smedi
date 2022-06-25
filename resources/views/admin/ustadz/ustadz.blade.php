<x-app-layout>
    <x-slot name="header">
        {{ __(' Daftar Data Ustadz') }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white  shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div class=" w-full px-2 py-4 ">
            <div class="mx-3">
                <div class="  bg-white  shadow-xs">
                    <div class="  grid grid-cols-2 ">
                        <div>
                            <form action="/ustadz" method="get">
                                <input type="text" autofocus name="cari" value="{{ request('cari') }}"
                                    class=" border text-green-800 rounded-md py-1 px-4" placeholder=" Cari ..">
                                <button type="submit" class=" bg-green-800 py-1 px-2 rounded-md text-white">
                                    Cari</button>
                            </form>

                        </div>
                        <div class=" w-full grid justify-items-end">
                            <a href="/ustadz/create"><button class=" bg-green-800 px-2 py-1 text-white rounded-md"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-person-plus-fill inline-block" viewBox="0 0 16 16">
                                        <path
                                            d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                                        <path fill-rule="evenodd"
                                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                                    </svg> Pedidik </button></a>
                        </div>
                    </div>

                    <div class=" bg-gray-50 mt-2">
                        <div class="overflow-hidden mb-2 w-full  border shadow-xs">
                            <div class="overflow-x-auto w-full">
                                <table class="w-full whitespace-no-wrap" id="#myTable">
                                    <thead>
                                        <tr
                                            class="text-xs font-semibold tracking-wide text-left  text-white  uppercas bg-green-800  border-b">
                                            <th class="px-4 py-3">#</th>
                                            <th class="px-4 py-3">Nama Ustadz</th>
                                            <th class="px-4 py-3">Jenis Kelamin</th>
                                            <th class="px-4 py-3">Nomor Hp </th>
                                            <th class="px-4 py-3">Rekening </th>
                                            <th class="px-4 py-3">Tahun Masuk</th>
                                            <th class="px-4 py-3">Masa Khidmat</th>
                                            <th class="px-4 py-3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y capitalize">
                                        @if($ustadz->count())
                                        @foreach( $ustadz as $ustadz)
                                        <tr class="text-gray-700">
                                            <td class=" border px-4 py-1 text-sm ">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class=" border px-4 py-1 text-sm ">
                                                {{ $ustadz->nama_ustadz }}
                                            </td>
                                            <td class=" border px-4 py-1 text-sm ">
                                                {{ $ustadz->jenis_kelamin }}
                                            </td>
                                            <td class=" border px-4 py-1 text-sm ">
                                                {{ $ustadz->no_hp }}
                                            </td>
                                            <td class=" border px-4 py-1 text-sm ">
                                                {{ $ustadz->nama_bank }} - {{ $ustadz->no_rekening }}
                                            </td>
                                            <td class=" border px-4 py-1 text-sm  ">
                                                {{ date_format(date_create($ustadz->tanggal_masuk),'Y') }}
                                            </td>
                                            <td class=" border px-4 py-1 text-sm  ">
                                                {{ $ustadz->Khitmad}} Tahun
                                            </td>
                                            <td class=" border  px-4 py-1 text-sm">
                                                <div class=" flex">
                                                    <div class="flex">
                                                        <form action="/ustadz/{{$ustadz->id}}" method="post">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" class=" text-green-800"
                                                                onclick="return confirm (' Apakah Anda Ingin Menghapus Data ini : ')"><svg
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
                                                        <a href="/ustadz/{{$ustadz->id}}/edit">
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
                                                    <div class=" flex">
                                                        <a href="/ustadz/{{$ustadz->id}}">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16"
                                                                height="16" fill="currentColor"
                                                                class="bi bi-eye-fill ml-1 text-green-800"
                                                                viewBox="0 0 16 16">
                                                                <path
                                                                    d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                                <path
                                                                    d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                            </svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr class="bg-gray-50">
                                            <td class="  px-4 py-2 text-sm text-center font-semibold">Data tidak
                                                tersedia !!!</td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class=" px-4 py-1 text-xs font-semibold tracking-wide text-gray-500 bg-gray-50 border-t
                                                sm:grid-cols-9">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>