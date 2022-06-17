<x-app-layout>
    <x-slot name="header">
        {{ __('Rekapitulasi Harian') }}
    </x-slot>
    <div class="inline-flex overflow-hidden  mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div class=" px-4 py-1">
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
            <button class="text-white rounded-md  bg-green-800 px-2 py-1 " onclick="printContent('div1')">
                Cetak Presensi</button>
        </div>
    </div>
    <div type="text" class=" w-full bg-white  grid grid-cols-1   px-4  rounded-md shadow-xs py-2 mb-2">
        <form action="/about" method="get">
            <label for="cari_tanggal">Tanggal</label>
            <input type="date" id="cari_tanggal" name="cari" value="{{ request('cari') }}"
                class=" border border-green-800 text-green-800 rounded-md py-1 px-4" placeholder=" Cari ..">
            <label for="cari_asrama">Asrama</label>
            <select class=" border border-green-800 rounded-md py-1 px-4" id="cari_asrama" name="asrama"
                value="{{ request('asrama') }}">
                <option value="">Semua</option>

                <option value="Ula" {{ request('asrama')  }}>
                    Ula
                </option>
                <option value="Wustha" {{ request('asrama')  }}>
                    Wustha
                </option>

            </select>
            <label for="cari_keterangan">Keterangan</label>
            <select class=" border border-green-800 rounded-md py-1 px-4" id="cari_keterangan" name="keterangan"
                value="{{ request('keterangan') }}">
                <option value="">Semua</option>
                <option value="Hadir" {{ request('keterangan') == 'Hadir' ? "selected" : "" }}>Hadir</option>
                <option value="Izin" {{ request('keterangan') == 'Izin' ? "selected" : "" }}>Izin</option>
                <option value="Sakit" {{ request('keterangan') == 'Sakit' ? "selected" : "" }}>Sakit</option>
                <option value="Alfa" {{ request('keterangan') == 'Alfa' ? "selected" : "" }}>Alfa</option>
            </select>
            <button type="submit" class=" bg-green-800 py-1 px-2 rounded-md text-white">
                Cari</button>
        </form>

    </div>

    <div id="div1" class="p-4 bg-white rounded-lg shadow-xs">

        <img src="images/04.jpg" alt="">
        <h1 class=" py-2 text-2xl text-center font-semibold  uppercase text-green-800 "> LAPORAN HARIAN
            <hr>
        </h1>
        <div class=" grid grid-cols-2  ">
            <div></div>
            <div class="     text-sm  grid grid-cols-5 font-semibold   uppercase text-center  ">
                <div class=" bg-green-800 text-white px-2 py-1 border border-green-700 ">Total</div>
                <div class=" bg-green-800 text-white px-2 py-1 border border-green-700 ">Hadir</div>
                <div class=" bg-green-800 text-white px-2 py-1 border border-green-700 ">Izin</div>
                <div class=" bg-green-800 text-white px-2 py-1 border border-green-700 ">Sakit</div>
                <div class=" bg-green-800 text-white  px-2 py-1 border border-green-700 ">Alfa</div>
                <div class=" px-2 py-0 border border-green-700 ">{{ $rekap->where('keterangan')->count()}}</div>
                <div class=" px-2 py-0 border border-green-700 ">
                    {{ $rekap->where('keterangan','Hadir')->count() }}
                </div>
                <div class=" px-2 py-0 border  border-green-700 ">
                    {{ $rekap->where('keterangan','Izin')->count() }}
                </div>
                <div class=" px-2 py-0 border  border-green-700 ">{{ $rekap->where('keterangan','Sakit')->count()}}
                </div>
                <div class=" px-2 py-0 border  border-green-700 ">{{ $rekap->where('keterangan','Alfa')->count()}}</div>
                @if ($rekap->where('keterangan')->count())
                <div class=" px-2 py-0 border  border-green-700 ">
                    {{ $rekap->where('keterangan')->count()*100/$rekap->where('keterangan')->count() }} %
                </div>
                <div class=" px-2 py-0 border  border-green-700 ">
                    {{ number_format($rekap->where('keterangan','Hadir')->count()*100/$rekap->where('keterangan')->count(),0) }}
                    %
                </div>
                <div class=" px-2 py-0 border  border-green-700 ">
                    {{ number_format($rekap->where('keterangan','Izin')->count()*100/$rekap->where('keterangan')->count(),0) }}
                    %
                </div>
                <div class=" px-2 py-0 border  border-green-700 ">
                    {{ number_format($rekap->where('keterangan','Sakit')->count()*100/$rekap->where('keterangan')->count(),0) }}
                    %
                </div>
                <div class=" px-2 py-0 border  border-green-700 ">
                    {{ number_format($rekap->where('keterangan','Alfa')->count()*100/$rekap->where('keterangan')->count(),0) }}
                    %
                </div>
                @endif
            </div>
        </div>

        <div class="">
            <table class="  table-auto mt-4 w-full border border-green-700">
                <thead class="  text-sm border px-2 ">
                    <tr class=" bg-green-800 text-white  border-green-700 border  uppercase">
                        <th class=" py-1 text-center border border-green-700">#</th>
                        <th class=" border border-green-700 text-center ">Tgl</th>
                        <th class=" px-2 border border-green-700 text-left">Nama Santri</th>
                        <th class=" border border-green-700 text-center">Asrama</th>
                        <th class=" border border-green-700 text-center">Kelas</th>
                        <th class=" border border-green-700 text-center">Jejang</th>
                        <th class="border border-green-700  ">Ket</th>
                        <th class=" border border-green-700  ">Alasan</th>
                    </tr>
                </thead>
                <tbody class="  text-xs  ">
                    @if($rekap->count())
                    @foreach ($rekap as $rekap)
                    <tr class=" hover:bg-gray-100  border border-green-700">
                        <td class=" text-center border  border-green-700">{{$loop->iteration}}</td>
                        <td class=" text-center border  border-green-700">
                            {{ date_format(date_create($rekap->sesi->tgl),'d-m-Y') }}
                        </td>
                        <td class=" px-2  border border-green-700 uppercase">
                            {{ $rekap->santri->asramasantri->santri->nama_santri}}
                        </td>
                        <td class="  border border-green-700 text-center">
                            {{ $rekap->santri->asramasantri->asrama->nama_asrama}}
                        </td>
                        <td class="  border border-green-700 text-center">
                            {{ $rekap->santri->kelas->nama_kelas}}
                        </td>
                        <td class="  border border-green-700 text-center">
                            {{ $rekap->santri->kelas->jenjang}}
                        </td>

                        <td class=" border border-green-700 text-center">
                            {{ $rekap->keterangan }}

                        </td>
                        <td class="  border border-green-700 px-2">
                            {{ $rekap->alasan }}
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
            <div class=" mt-4 grid justify-items-end">
                @if($rekap->count())
                Kedunglo, {{ $rekap->tgl}} <br>
                Kepala Madin Wustho Wahidiyah <br><br><br><br>
                Muh. Bahrul Ulum
                @endif
            </div>
        </div>
    </div>
</x-app-layout>