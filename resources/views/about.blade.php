<x-app-layout>
    <x-slot name="header">
        {{ __('Rekapitulasi Harian') }}
    </x-slot>
    <div type="text" class=" grid grid-cols-2 sm:grid-cols-2 px-4  bg-white rounded-lg shadow-xs py-2 mb-2">
        <div class="">
            <a href="/absen">
                <button class=" bg-green-700 text-white px-2 py-1 rounded-md ">Presensi</button>
            </a>
            <a href="/kelas">
                <button class=" bg-green-700 text-white px-2 py-1 rounded-md ">Kembali</button>
            </a>
            <a href="/about"><button class=" bg-green-800 py-1 px-2 rounded-md text-white">
                    Reset</button></a>
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
        <div class=" grid grid-cols-1 justify-items-end ">
            <div>
                <form action="/about" method="get">
                    <input type="date" name="cari" value="{{ request('cari') }}"
                        class=" border border-green-800 text-green-800 rounded-md py-1 px-4" placeholder=" Cari ..">
                    <button type="submit" class=" bg-green-800 py-1 px-2 rounded-md text-white">
                        Cari</button>
                </form>

            </div>
        </div>
    </div>
    <div id="div1" class="p-4 bg-white rounded-lg shadow-xs">
        <div>
        </div>
        <h1 class=" text-2xl text-center font-semibold  uppercase text-green-800 "> Madrasah Ibtida'iyah Wahidiyah</h1>
        <hr>
        <p class=" text-center text-sm text-green-800">Alamat : Jln.Gang Pondok, Desa Bandar Lor, Kec. Mojoroto, Bandar
            Lor, Kec.
            Kediri, Jawa
            Timur 64112
        </p>
        <hr>
        <div class=" grid grid-cols-2">
            <div class=" grid  col-span-1">
            </div>
            <div class=" text-sm mt-2 grid grid-cols-4   uppercase text-center  ">
                <div class=" bg-gray-50 px-2 py-1 border ">Total</div>
                <div class=" bg-gray-50 px-2 py-1 border ">Hadir</div>
                <div class=" bg-gray-50 px-2 py-1 border ">Sakit</div>
                <div class=" bg-gray-50  px-2 py-1 border ">Alfa</div>
                <div class=" px-2 py-0 border ">{{ $rekap->where('keterangan')->count()}}</div>
                <div class=" px-2 py-0 border ">
                    {{ $rekap->where('keterangan','Hadir')->count() }}
                </div>
                <div class=" px-2 py-0 border ">{{ $rekap->where('keterangan','Sakit')->count()}}</div>
                <div class=" px-2 py-0 border ">{{ $rekap->where('keterangan','Alfa')->count()}}</div>
                <div class=" px-2 py-0 border ">
                    {{ $rekap->where('keterangan')->count() *100 /$rekap->where('keterangan')->count()}} %
                </div>
                <div class=" px-2 py-0 border ">
                    {{ number_format($rekap->where('keterangan','Hadir')->count() *100 /$rekap->where('keterangan')->count(),0)}}
                    %
                </div>
                <div class=" px-2 py-0 border ">
                    {{ number_format($rekap->where('keterangan','Sakit')->count() *100 /$rekap->where('keterangan')->count(),0)}}
                    %
                </div>
                <div class=" px-2 py-0 border ">
                    {{ number_format($rekap->where('keterangan','Alfa')->count() *100 /$rekap->where('keterangan')->count(),0)}}
                    %
                </div>

            </div>

        </div>

        <div class="">
            <table class="  table-auto mt-4 w-full border">
                <thead class=" text-sm border px-2 ">
                    <tr class=" text-green-800 bg-gray-50 uppercase">
                        <th class=" py-1 text-center border">#</th>
                        <th class=" border text-center ">Tgl</th>
                        <th class=" px-2 border text-left">Nama Santri</th>
                        <th class=" border text-center">Asrama</th>
                        <th class=" border text-center">Kelas MI</th>
                        <th class="  ">Ket</th>
                    </tr>
                </thead>
                <tbody class="  text-xs  ">
                    @if($rekap->count())
                    @foreach ($rekap as $rekap)
                    <tr class=" hover:bg-gray-100 border">
                        <td class=" text-center border ">{{$loop->iteration}}</td>
                        <td class=" text-center border ">
                            {{ date_format(date_create($rekap->sesi->tgl),'d-m-Y') }}
                        </td>
                        <td class=" px-2 border uppercase">
                            {{ $rekap->santri->asramasantri->santri->nama_santri}}
                        </td>
                        <td class=" border text-center">
                            {{ $rekap->santri->asramasantri->asrama->nama_asrama}}
                        </td>
                        <td class=" border text-center">
                            {{ $rekap->santri->kelas->nama_kelas}}
                        </td>

                        <td class=" text-center">
                            @if ($rekap->keterangan === 'Hadir')
                            <p class=" text-green-700">Hadir</p>
                            @elseif ($rekap->keterangan === 'Sakit')
                            <p class=" text-yellow-300">Sakit</p>
                            @else
                            <p class=" text-red-800">Alfa</p>
                            @endif

                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr class=" bg-gray-50  ">
                        <td class=" px-2 col-span-6">Data Berdasarkan Tanggal tidak di temukan</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>