<x-app-layout>
    <x-slot name="header">
        {{ __('Rekapitulasi Harian') }}
    </x-slot>
    <div type="text" class="p-4 bg-white rounded-lg shadow-xs py-4 mb-2">
        <a href="/absen">
            <button class=" bg-green-700 text-white px-2 py-1 rounded-md ">Presensi</button>
        </a>
        <a href="/kelas">
            <button class=" bg-green-700 text-white px-2 py-1 rounded-md ">Kembali</button>
        </a>
    </div>
    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div>
        </div>
        <table class=" w-full border">
            <thead class=" border px-2 py-2">
                <tr class=" uppercase">
                    <th class=" text-left">#</th>
                    <th class=" text-left">Tgl</th>
                    <th class=" text-left">Nama Santri</th>
                    <th class=" text-left">Asrama</th>
                    <th class=" text-left">Kelas MI</th>
                    <th class="  ">Keterangan</th>
                </tr>
            </thead>
            <tbody class=" ">
                @foreach ($rekap as $rekap)
                <tr class=" border">
                    <td>{{$loop->iteration}}</td>
                    <td>
                        {{ date_format(date_create($rekap->created_at),'d-m-Y') }}
                    </td>
                    <td>
                        {{ $rekap->santri->asramasantri->santri->nama_santri}}
                    </td>
                    <td>
                        {{ $rekap->santri->asramasantri->asrama->nama_asrama}}
                    </td>
                    <td>
                        {{ $rekap->santri->kelas->nama_kelas}}
                    </td>

                    <td class=" text-center">

                        {{ $rekap->keterangan }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>