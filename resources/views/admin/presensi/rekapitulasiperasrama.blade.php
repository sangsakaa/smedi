<x-app-layout>
    <x-slot name="header">
        Rekapitulasi Presensi Kelas
    </x-slot>
    <div class=" w-full ">
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
                    <a href="/rekapitulasiperasrama">
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
                        Cetak Presensi</button>

                </div>
                <div class=" grid justify-items-end">
                    <form action="/rekapitulasiperasrama" method="get">
                        <input class=" border border-green-800 px-2 py-1 rounded-md" id="start_date" type="date"
                            name="start_date" value="{{request('start_date')}}">
                        <input class=" border border-green-800 px-2 py-1 rounded-md" type="date" name="end_date"
                            value="{{request('end_date')}}">
                        <input class=" border border-green-800 px-2 py-1 rounded-md" id="hari_terakhir" type="checkbox"
                            name="hari_terakhir"><label for="hari_terakhir">Hari
                            Terakhir</label>
                        <button class=" bg-green-800 rounded-md px-4 py-1 text-white" type="submit">Cari</button>
                    </form>
                </div>
                
            </div>
        </div>
        <div x class=" w-full">
            <div class="inline-flex overflow-hidden mt-2 bg-white w-full  shadow-md">
                <div class="flex justify-center items-center w-1 bg-green-800">
                </div>
                <div id="div1" class=" w-full  bg-white  shadow-xs px-4  ">
                    <img src="images/04.jpg" alt="">
                    <h1 class=" text-center text-2xl text-green-800">Laporan Rekapitulasi Presentasi Siswa </h1>
                    <h2 class=" text-center text-2xl"> Berdasarkan Asrama</h2>
                    </h2>
                    <table class=" w-full  border border-green-80 mt-4 mb-4">
                        <thead>
                            <tr>
                                <th rowspan="3" class=" text-sm border border-green-800 bg-green-200 ">NO</th>
                                <th rowspan="3" class=" text-sm border border-green-800 bg-green-200 uppercase ">Asrama</th>
                                <th rowspan="3" class=" text-sm border border-green-800 bg-green-200 ">JML</th>
                                <th colspan="9" class=" text-sm border border-green-800 bg-green-200 uppercase ">
                                    Keterangan</th>
                            </tr>
                            <tr class=" uppercase border">
                                <th colspan="2" class=" text-sm border border-green-800 bg-green-200">
                                    Hadir
                                </th>
                                <th colspan="2" class=" text-sm border border-green-800 bg-green-200">
                                    Izin
                                </th>
                                <th colspan="2" class=" text-sm border border-green-800 bg-green-200">
                                    Sakit
                                </th>
                                <th colspan="2" class=" text-sm border border-green-800 bg-green-200">
                                    Alfa
                                </th>
                                <th rowspan="2" class=" text-sm border border-green-800 bg-green-200 ">Tot</th>
                            </tr>
                            <tr class=" uppercase border">
                                <th class=" text-sm border border-green-800 bg-green-200 ">H</th>
                                <th class=" text-sm border border-green-800 bg-green-200 ">%</th>
                                <th class=" text-sm border border-green-800 bg-green-200 ">I</th>
                                <th class=" text-sm border border-green-800 bg-green-200 ">%</th>
                                <th class=" text-sm border border-green-800 bg-green-200 ">S</th>
                                <th class=" text-sm border border-green-800 bg-green-200 ">%</th>
                                <th class=" text-sm border border-green-800 bg-green-200 ">A</th>
                                <th class=" text-sm border border-green-800 bg-green-200  ">%</th>
                            </tr>
                        </thead>
                        <tbody>

                            @if($lisrekap->count())
                            @foreach($lisrekap as $rekap)
                            <tr class=" hover:bg-gray-100 ">
                                <td class="  py-1 text-sm border border-green-800 text-center">{{$loop->iteration}}
                                </td>
                                <td class=" w-1/2 font-semibold text-sm border border-green-800 text-center">
                                    {{ $rekap->nama_asrama }}
                                </td>
                                <td class="  text-sm border border-green-800 text-center">
                                    {{ $rekap->jumlah_santri }}
                                </td>
                                <td class="  text-sm border border-green-800 text-center">
                                    {{ ($rekap->hadir)}}
                                </td>
                                <td class="  text-sm border border-green-800 text-center">
                                    {{ $rekap->hadir ? number_format($rekap->hadir / $rekap->total * 100, 0) : 0}}
                                    %
                                </td>
                                <td class="  text-sm border border-green-800 text-center">{{ $rekap->izin }}
                                </td>
                                <td class="  text-sm border border-green-800 text-center">
                                    {{ $rekap->izin ? number_format(($rekap->izin / $rekap->total * 100), 0) : 0}}
                                    %
                                </td>
                                <td class="  text-sm border border-green-800 text-center">{{ $rekap->sakit }}
                                </td>
                                <td class="  text-sm border border-green-800 text-center">
                                    {{ $rekap->sakit ? number_format(($rekap->sakit / $rekap->total * 100), 0) : 0}} %
                                </td>
                                <td class="  text-sm border border-green-800 text-center">{{ $rekap->alfa }}
                                </td>
                                <td class="  text-sm border border-green-800 text-center">
                                    {{ $rekap->alfa ? number_format(($rekap->alfa / $rekap->total * 100), 0) : 0}} %
                                </td>
                                <td class="  text-sm border border-green-800 text-center">
                                    {{ $rekap->total }}
                                </td>

                            </tr>
                            @endforeach
                            @endif
                            <tr>
                                <td colspan="11"
                                    class=" font-semibold uppercase px-1 text-sm border border-green-800 text-center">
                                    Total
                                </td>
                                <td class=" px-1 text-sm border border-green-800 text-center">
                                    {{ "#error" }}
                                </td>
                            </tr>
                        </tbody>

                    </table>
                    <div class=" mt-4 grid justify-items-end">

                        Kedunglo, <br>
                        Kepala Madin Wustho Wahidiyah <br><br><br><br>
                        Muh. Bahrul Ulum

                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>