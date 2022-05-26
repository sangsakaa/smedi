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
                        <th class="px-2 py-1 text-left border">
                            Tanggal
                        </th>
                        <th class="px-2 py-1 text-left">
                            Kelas
                        </th>
                        <th class="px-2 py-1 text-left">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sesi as $sesikelas)
                    <tr class=" hover:bg-gray-100">
                        <td class=" border text-center">{{$loop->iteration}}</td>
                        <td class=" border px-2 py-1">
                            {{ date_format(date_create($sesikelas->tgl),'d-m-Y') }}
                        </td>
                        <td class=" border px-2 py-1">
                            <a href="/absen/{{ $sesikelas->id }}">{{ $sesikelas->kelas->nama_kelas }}</a>
                        </td>
                        <td class=" border px-2 py-1">

                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class=" py-1  ">

            </div>
        </div>
    </div>
</x-app-layout>