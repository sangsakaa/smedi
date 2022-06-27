<x-app-layout>
    <x-slot name="header">
        Cetak Blangko Presensi Kelas
    </x-slot>
    <div class="inline-flex overflow-hidden  w-full bg-white  shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div type="text" class=" w-full grid grid-cols-2 bg-white  shadow-xs px-4 py-2 ">
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

                <script>
                function printContent(el) {
                    var fullbody = document.body.innerHTML;
                    var printContent = document.getElementById(el).innerHTML;
                    document.body.innerHTML = printContent;
                    window.print();
                    document.body.innerHTML = fullbody;
                }
                </script>
                <button class="text-white rounded-md  bg-green-800 px-2 py-1 " onclick="printContent('div1')">
                    Centak Blangko</button>
            </div>
            <div class=" grid justify-items-end">
                <form action="/blangko" method="get">
                    <input type="month" name="bulan" value="{{ request('bulan') }}"
                        class="border border-green-800 text-green-800 rounded-md py-1 px-4" placeholder=" Cari ..">
                    <select name="kelas" id="" class=" border border-green-800 rounded-md px-2 py-1">
                        <option value="">-- Pilih Kelas --</option>
                        @foreach ($lisKelas as $kelas)
                        <option value="{{ $kelas->id }}" {{ request('kelas') == $kelas->id ? 'selected' : '' }}>
                            {{ $kelas->nama_kelas . ' ' . $kelas->jenjang }}
                        </option>
                        @endforeach
                    </select>
                    <button type="submit" class=" bg-green-800 py-1 px-2 rounded-md text-white">
                        Cari</button>

                </form>
            </div>
        </div>
    </div>
    <div class="inline-flex overflow-hidden  mt-4 w-full bg-white  shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div id="div1" class=" w-full px-4 py-2">
            <img src="images/04.jpg" alt="">
            <div class=" grid justify-items-end"></div>
            <table class=" w-full">
                <thead>
                    <tr class=" border">
                        <th class=" border border-green-800" style="width: {{ 70/($jumlah_hari+1) }}%" rowspan="2">#
                        </th>
                        <th class=" border border-green-800" class="" style="width: 30%" rowspan="2">Nama</th>
                        <th class=" border border-green-800" colspan="{{ $jumlah_hari }}">
                            Tanggal
                        </th>
                    </tr>
                    <tr class="border">
                        @for($i = 1; $i <= $jumlah_hari; $i++) <th class=" border border-green-800  ">{{ $i }}
                            </th>
                            @endfor
                    </tr>
                </thead>
                <tbody>
                    @if($kelas)
                    @foreach($kelasSantri as $kelassantri)
                    <tr class=" border border-green-800">
                        <td class=" border border-green-800 px-1 py-1 text-center text-xs">
                            {{ $loop->iteration }}
                        </td>
                        <td class=" border border-green-800 px-2 text-xs">
                            {{ $kelassantri->AsramaSantri->santri->nama_santri }}
                        </td>
                        @for($i = 1; $i <= $jumlah_hari; $i++) <td class=" border border-green-800"
                            style="width: {{ 70/($jumlah_hari+1) }}%">
                            </td>
                            @endfor
                    </tr>
                    @endforeach
                    @endif

                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>