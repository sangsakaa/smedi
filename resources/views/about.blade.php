<x-app-layout>
    <x-slot name="header">
        {{ __('Rekapitulasi Harian') }}
    </x-slot>
    <div type="text" class=" grid grid-cols-2 px-4  bg-white rounded-lg shadow-xs py-2 mb-2">
        <div>
            <a href="/absen">
                <button class=" bg-green-700 text-white px-2 py-1 rounded-md ">Presensi</button>
            </a>
            <a href="/kelas">
                <button class=" bg-green-700 text-white px-2 py-1 rounded-md ">Kembali</button>
            </a>
        </div>
        <div class=" grid grid-cols-1 justify-items-end">
            <div>
                <form action="/about" method="get">
                    <input type="date" name="cari" value="{{ request('cari') }}"
                        class=" border border-green-800 text-green-800 rounded-md py-1 px-4" placeholder=" Cari ..">
                    <button type="submit" class=" bg-green-800 py-1 px-2 rounded-md text-white">
                        Cari</button>
                    <button type="reset" class=" bg-green-800 py-1 px-2 rounded-md text-white">
                        Reset</button>
                </form>
            </div>
        </div>
    </div>
    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div>
        </div>
        <h1 class=" text-2xl text-center uppercase"> Rekapitulasi Madrsah Ibtida'iyah Wahidiyah</h1>
        <hr>
        <table class=" table-auto mt-4 w-full border">
            <thead class=" border px-2 py-2">
                <tr class=" uppercase">
                    <th class="text-center border">#</th>
                    <th class=" border text-center ">Tgl</th>
                    <th class=" px-2 border text-left">Nama Santri</th>
                    <th class=" border text-center">Asrama</th>
                    <th class=" border text-center">Kelas MI</th>
                    <th class="  ">Keterangan</th>
                </tr>
            </thead>
            <tbody class=" ">
                @if($rekap->count())
                @foreach ($rekap as $rekap)
                <tr class=" hover:bg-gray-100 border">
                    <td class=" text-center border ">{{$loop->iteration}}</td>
                    <td class=" text-center border ">
                        {{ date_format(date_create($rekap->sesi->tgl),'d-m-Y') }}
                    </td>
                    <td class=" px-2 border">
                        {{ $rekap->santri->asramasantri->santri->nama_santri}}
                    </td>
                    <td class=" border text-center">
                        {{ $rekap->santri->asramasantri->asrama->nama_asrama}}
                    </td>
                    <td class=" border text-center">
                        {{ $rekap->santri->kelas->nama_kelas}}
                    </td>

                    <td class=" text-center">

                        {{ $rekap->keterangan }}
                    </td>
                </tr>

                @endforeach
                @else
                <tr class=" bg-gray-50  ">
                    <td class=" px-2 py-2 col-span-6">Data Berdasarkan Tanggal tidak di temukan</td>
                </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-app-layout>