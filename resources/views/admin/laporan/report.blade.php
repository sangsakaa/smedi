<x-app-layout>
    <x-slot name="header">
        {{ __('Report Daily') }} Kelas {{ $sesi->kelas->nama_kelas }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div type="text" class=" bg-white rounded-lg shadow-xs px-4 py-2 ">
            <a href="/absen">
                <button class=" bg-green-700 text-white px-2 py-1 rounded-md ">Kembali</button>
            </a>
        </div>
    </div>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div class=" w-full px-4">
            <div class=" py-1">
                Tanggal : {{ $sesi->tgl }}
            </div>
            <form action="/absen/{{$sesi->id}}" method="post">
                <button type="submit" class="mt-2 bg-green-700 rounded-md text-white py-1 px-2">save</button>
                @if (!$presensi)
                Belum diabsen
                @endif
                @csrf

                <table class="border w-full mb-2 mt-2">
                    <thead>
                        <tr class="">
                            <th class=" border">#</th>
                            <th class=" px-4 text-left">Nama</th>
                            <th class=" px-4 border ">Kelas</th>
                            <th class=" px-4 text-right">Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sesi->kelas->kelassantri as $kelassantri)
                        <tr class=" border hover:bg-gray-100">
                            <td class=" border text-center">{{$loop->iteration}}</td>
                            <td>{{ $kelassantri->asramasantri->santri->nama_santri }}</td>
                            <td class=" text-center border">{{ $kelassantri->kelas->nama_kelas }}</td>
                            <td class=" text-right px-2 ">
                                <input type="radio" id="keteranganhadir[{{ $kelassantri->id }}]"
                                    name="keterangan[{{ $kelassantri->id }}]" value="Hadir"
                                    {{ array_key_exists($kelassantri->id, $presensi) && $presensi[$kelassantri->id] === 'Hadir' || !$presensi ? 'checked' : ''}}><label
                                    for="keteranganhadir[{{ $kelassantri->id }}]">&nbsp;Hadir</label>&nbsp;
                                <input type="radio" id="keterangansakit[{{ $kelassantri->id }}]"
                                    name="keterangan[{{ $kelassantri->id }}]" value="Sakit"
                                    {{ array_key_exists($kelassantri->id, $presensi) && $presensi[$kelassantri->id] === 'Sakit' ? 'checked' : '' }}><label
                                    for="keterangansakit[{{ $kelassantri->id }}]">&nbsp;Sakit</label>
                                <input type="radio" id="keteranganalfa[{{ $kelassantri->id }}]"
                                    name="keterangan[{{ $kelassantri->id }}]" value="alfa"
                                    {{ array_key_exists($kelassantri->id, $presensi) && $presensi[$kelassantri->id] === 'alfa' ? 'checked' : '' }}><label
                                    for="keteranganalfa[{{ $kelassantri->id }}]">&nbsp;alfa</label>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>

    </div>

</x-app-layout>