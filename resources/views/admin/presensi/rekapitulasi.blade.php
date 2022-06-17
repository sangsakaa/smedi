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
    <div class="inline-flex overflow-hidden  w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div type="text" class=" w-full grid grid-cols-2 bg-white rounded-lg shadow-xs px-4 py-2 ">
            <div class=" grid justify-items-end">
                <table id="div1" class=" w-full border border-green-80">
                    <thead>
                        <tr class=" uppercase border">
                            <th class=" border border-green-800 bg-green-200 ">#</th>
                            <th class=" border border-green-800 bg-green-200 ">Nama Siswa</th>
                            <th class=" border border-green-800 bg-green-200 ">Hadir</th>
                            <th class=" border border-green-800 bg-green-200 ">Izin</th>
                            <th class=" border border-green-800 bg-green-200 ">Sakit</th>
                            <th class=" border border-green-800 bg-green-200 ">Alfa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rekapitulasi as $presensi)
                        <tr class=" hover:bg-gray-200">
                            <td class=" px-2 border border-green-800 text-center">{{$loop->iteration}}</td>
                            <td class=" px-2 border border-green-800 text-left">{{$presensi->nama_santri}}</td>
                            <td class=" px-2 border border-green-800 text-center">{{ $presensi->hadir }}</td>
                            <td class=" px-2 border border-green-800 text-center">{{ $presensi->izin }}</td>
                            <td class=" px-2 border border-green-800 text-center">{{ $presensi->sakit }}</td>
                            <td class=" px-2 border border-green-800 text-center">{{ $presensi->alfa }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>