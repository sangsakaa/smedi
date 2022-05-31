<x-app-layout>
    <x-slot name="header">
        {{ __('Presensi Harian') }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div type="text" class=" bg-white rounded-lg shadow-xs px-4 py-2 ">
            <a href="/absen">
                <button class=" bg-green-700 text-white px-2 py-1 rounded-md ">Kembali</button>
            </a>
            <a href="/about">
                <button class=" bg-green-700 text-white px-2 py-1 rounded-md ">Rekapitulasi</button>
            </a>
            <script>
            function printContent(el) {
                var fullbody = document.body.innerHTML;
                var printContent = document.getElementById(el).innerHTML;
                document.body.innerHTML = printContent;
                window.print();
                document.body.innerHTML = fullbody;
            }
            </script>

            <button class="text-white rounded-md mb-2 bg-green-800 px-2 py-1 " onclick="printContent('div1')">
                Cetak Presensi</button>

        </div>
    </div>
    <div id="div1" class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div class=" w-full px-4  py-4">
            <div class="  grid grid-cols-2">
                <div class="    font-semibold grid grid-cols-2">
                    <div>Kelas MI</div>
                    <div> : {{ $sesi->kelas->nama_kelas }}</div>
                    <div> Tanggal Presensi</div>
                    <div> : {{ $sesi->tgl }} </div>
                    <div>Status Presensi</div>
                    <div> :@if (!$presensi)
                        <label for="" class=" text-red-600">Belum diabsen</label>
                        @else
                        <label for="" class=" text-green-600">Sudah di Absen</label>
                        @endif
                    </div>
                </div>
                <div class="">
                    <div class=" py-2  rounded-md grid grid-cols-4  sm:grid-cols-4">
                        <div class="font-semibold bg-gray-50 px-2 py-1 border">Total</div>
                        <div class="font-semibold bg-gray-50 px-2 py-1 border">Hadir</div>
                        <div class="font-semibold bg-gray-50 px-2 py-1 border">Sakit</div>
                        <div class="font-semibold bg-gray-50 px-2 py-1 border">Alfa</div>
                        <div class="font-semibold bg-gray-50 px-2 py-1 border">{{$total}}</div>
                        <div class=" px-2 py-1 border">{{$jumlahHadir}}</div>
                        <div class=" px-2 py-1 border">{{$jumlahSakit}}</div>
                        <div class=" px-2 py-1 border">{{$jumlahAlfa}}</div>
                    </div>
                </div>
            </div>
            <hr>
            <form action="/absen/{{$sesi->id}}" method="post">
                <button type="submit" class="mt-2 bg-green-700 rounded-md text-white py-1 px-2">Simpan Presensi</button>

                @csrf

                <table class="border w-full mb-2 mt-2">
                    <thead>
                        <tr class=" uppercase">
                            <th class=" border">#</th>
                            <th class=" px-4 text-left">Nama</th>
                            <th class=" px-4 border ">Asrama</th>
                            <th class=" px-4 border ">Kelas</th>
                            <th class=" px-4 text-right">Keterangan</th>
                            <th class=" px-4 text-left">Alasan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sesi->kelas->kelassantri as $kelassantri)
                        <tr class=" border hover:bg-gray-100 text-xs">
                            <td class=" border text-center">{{$loop->iteration}}</td>
                            <td class=" px-2 border">{{ $kelassantri->asramasantri->santri->nama_santri }}</td>
                            <td class=" text-center border">{{ $kelassantri->asramasantri->asrama->nama_asrama }}</td>
                            <td class=" text-center border">{{ $kelassantri->kelas->nama_kelas }}</td>
                            <td class=" text-right px-2 text-xs ">
                                <input type="radio" id="keteranganhadir[{{ $kelassantri->id }}]"
                                    name="keterangan[{{ $kelassantri->id }}]" value="Hadir"
                                    {{ array_key_exists($kelassantri->id, $presensi) && $presensi[$kelassantri->id]['keterangan'] === 'Hadir' || !$presensi ? 'checked' : ''}}><label
                                    for="keteranganhadir[{{ $kelassantri->id }}]">&nbsp;Hadir</label>&nbsp;
                                <input type="radio" id="keteranganizin[{{ $kelassantri->id }}]"
                                    name="keterangan[{{ $kelassantri->id }}]" value="Izin"
                                    {{ array_key_exists($kelassantri->id, $presensi) && $presensi[$kelassantri->id]['keterangan'] === 'Izin'  ? 'checked' : ''}}><label
                                    for="keteranganizin[{{ $kelassantri->id }}]">&nbsp;Izin</label>&nbsp;
                                <input type="radio" id="keterangansakit[{{ $kelassantri->id }}]"
                                    name="keterangan[{{ $kelassantri->id }}]" value="Sakit"
                                    {{ array_key_exists($kelassantri->id, $presensi) && $presensi[$kelassantri->id]['keterangan'] === 'Sakit' ? 'checked' : '' }}><label
                                    for="keterangansakit[{{ $kelassantri->id }}]">&nbsp;Sakit</label>
                                <input type="radio" id="keteranganalfa[{{ $kelassantri->id }}]"
                                    name="keterangan[{{ $kelassantri->id }}]" value="Alfa"
                                    {{ array_key_exists($kelassantri->id, $presensi) && $presensi[$kelassantri->id]['keterangan'] === 'Alfa' ? 'checked' : '' }}><label
                                    for="keteranganalfa[{{ $kelassantri->id }}]">&nbsp;Alfa</label>
                            </td>
                            <td class=" px-1 py-1 text-xs">
                                <input type="text" id="alasan[{{ $kelassantri->id }}]"
                                    name=" alasan[{{ $kelassantri->id }}]" placeholder="masukan alasan"
                                    class="  w-full rounded-md border border-green-800 px-2 "
                                    value={{ array_key_exists($kelassantri->id, $presensi) ? $presensi[$kelassantri->id]['alasan'] : '' }}>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>

    </div>

</x-app-layout>