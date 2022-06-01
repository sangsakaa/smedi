<x-app-layout>
    <x-slot name="header">
        Presensi Kelas
    </x-slot>
    <div class="inline-flex overflow-hidden  w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div type="text" class=" w-full grid grid-cols-2 bg-white rounded-lg shadow-xs px-4 py-2 ">
            <div>
                <a href="/about">
                    <button class=" bg-green-700 text-white px-2 py-1 rounded-md ">Kembali</button>
                </a>
                <a href="/about">
                    <button class=" bg-green-700 text-white px-2 py-1 rounded-md ">Rekapitulasi</button>
                </a>
                <a href="/absen">
                    <button class=" bg-green-700 text-white px-2 py-1 rounded-md ">Reset</button>
                </a>
            </div>
            <div class=" grid justify-items-end">
                <form action="/absen" method="get">
                    <input type="date" name="cari" value="{{ request('cari') }}"
                        class="border border-green-800 text-green-800 rounded-md py-1 px-4" placeholder=" Cari ..">
                    <button type="submit" class=" bg-green-800 py-1 px-2 rounded-md text-white">
                        Cari</button>
                </form>
            </div>
        </div>
    </div>
    <div class="inline-flex overflow-hidden mb-1 mt-1 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div>

        </div>
        <div class=" sm:w-1/2 w-full px-4 py-1">
            <form action="/absen" method="post">
                @csrf
                <div class=" w-full grid sm:grid-cols-3 grid-cols-1 gap-2">
                    <input class=" border border-green-600 rounded-md px-2 py-1" placeholder=" masukan data" type="date"
                        name="tgl">
                    <select name="kelas_id" id="" class=" border border-green-800 px-2 py-1 rounded-md">
                        <option value=""> -- Pilih Kelas --</option>
                        @foreach ($kelas as $kelas)
                        <option value="{{$kelas->id}} "> {{ $kelas->nama_kelas  }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class=" bg-green-600 text-white px-2 py-1 rounded-md">Sesi</button>
                </div>
            </form>
        </div>
    </div>
    <div class="inline-flex overflow-hidden mb-1 mt-1 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div class=" w-full px-4">
            <div class=" font-semibold mt-4">
                SESI KELAS
            </div>
            <table class=" mt-2 mb-4 sm:w-1/2 w-full table border rounded-md">
                <thead class=" border rounded-md ">
                    <tr class=" bg-gray-50">
                        <th class="px-2 py-1 text-center border">
                            #
                        </th>
                        <th class="px-2 py-1 text-center border">
                            Tanggal
                        </th>
                        <th class="px-2 py-1 text-center">
                            Kelas
                        </th>
                        <th class=" border px-1 py-1 text-center">
                            Status
                        </th>
                        <th class=" border  text-center">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @if($sesi->count())
                    @foreach($sesi as $sesikelas)
                    <tr class=" hover:bg-gray-100">
                        <td class=" border text-center">{{$loop->iteration}}</td>
                        <td class=" border text-center px-2 py-1">
                            {{ date_format(date_create($sesikelas->tgl),'d-m-Y') }}
                        </td>
                        <td class=" border px-2 py- text-center">
                            <a href="/absen/{{ $sesikelas->id }}">{{ $sesikelas->kelas->nama_kelas }}</a>
                        </td>
                        <td class=" border  text-center">
                            @if (!$sesikelas->presensi->count())


                            <div class=" inline-block">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-calendar-  text-center inline-table text-red-600" viewBox="0 0 16 16">
                                    <path
                                        d="M6.146 7.146a.5.5 0 0 1 .708 0L8 8.293l1.146-1.147a.5.5 0 1 1 .708.708L8.707 9l1.147 1.146a.5.5 0 0 1-.708.708L8 9.707l-1.146 1.147a.5.5 0 0 1-.708-.708L7.293 9 6.146 7.854a.5.5 0 0 1 0-.708z" />
                                    <path
                                        d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z" />
                                </svg>
                            </div>


                            @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-check2-square text-green-600  inline-block text-center"
                                viewBox="0 0 16 16">
                                <path
                                    d="M3 14.5A1.5 1.5 0 0 1 1.5 13V3A1.5 1.5 0 0 1 3 1.5h8a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v10a.5.5 0 0 0 .5.5h10a.5.5 0 0 0 .5-.5V8a.5.5 0 0 1 1 0v5a1.5 1.5 0 0 1-1.5 1.5H3z" />
                                <path
                                    d="m8.354 10.354 7-7a.5.5 0 0 0-.708-.708L8 9.293 5.354 6.646a.5.5 0 1 0-.708.708l3 3a.5.5 0 0 0 .708 0z" />
                            </svg>
                            @endif
                        </td>
                        <td class=" border px-2 py-1 text-center">
                            <button class=" bg-red-600 rounded-md text-white px-2 py-1"> Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td class=" text-red-600 px-4 py-1">Data Berdasakan Tanggal Tidak di Temukan !!!</td>
                    </tr>
                    @endif
                </tbody>
            </table>
            <div class=" py-1  ">

            </div>
        </div>
    </div>
</x-app-layout>