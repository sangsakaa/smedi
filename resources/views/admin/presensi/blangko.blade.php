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
        <div id="div1" class=" w-full px-4 py-1">
            <div class="  w-full text-center">
                <h1 class=" text-4xl  uppercase text-center py-1 font-semibold text-green-800">madrasah diniyah wustha
                    wahidiyah</h1>
                <hr>
                <span class=" text-green-800 text-2xl uppercase semi">Tahun Pelajaran {{ date('Y') }}/2023</span>
            </div>
            <div class=" grid grid-cols-2">
                
                <div class=" flex  content-end  font-semibold text-2xl">
                    Bulan : {{ $bulan->monthName }}
                </div>
                <div class=" grid justify-items-end font-semibold text-4xl">{{ $data_kelas?->nama_kelas }}</div>

            </div>
            <table class=" w-full">
                <thead>

                    <tr class=" border">
                        <th class=" border border-green-800 px-1" style="width: {{ 70/($periodeBulan->count()+1) }}%" rowspan="2">
                            No
                        </th>
                        <th class=" border border-green-800" class="" style="width: 20%" rowspan="2">Nama Siswa</th>
                        <th class=" border border-green-800 px-1" class="" rowspan="2" style="width: 2%">KLS</th>
                        <th class=" border border-green-800" colspan="{{ $periodeBulan->count() }}">
                            Tanggal
                        </th>
                    </tr>
                    <tr class="border">
                        @foreach($periodeBulan as $hari)
                        <th class=" border border-green-800 {{ $hari->isThursday() ? 'bg-green-200' : '' }}">{{ $hari->day }}</th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @if($kelas)
                    @foreach($kelasSantri as $kelassantri)
                    <tr class=" border border-green-800">
                        <td class=" border border-green-800 font-semibold px-1 py-1 text-center text-xs">
                            {{ $loop->iteration }}
                        </td>
                        <td class=" border border-green-800 px-2 text-xs">
                            {{ $kelassantri->AsramaSantri->santri->nama_santri }}
                        </td>
                        <td class=" border border-green-800 px-0 text-xs text-center font-semibold">
                            {{ $kelassantri->kelas->nama_kelas }}
                        </td>
                        @foreach($periodeBulan as $hari)
                        <td class=" border border-green-800 {{ $hari->isThursday() ? 'bg-green-200' : '' }}"
                            style="width: {{ 70/($periodeBulan->count()+1) }}%"></td>
                        @endforeach
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

</x-app-layout>
