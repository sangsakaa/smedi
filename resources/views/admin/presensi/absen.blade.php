<x-app-layout>
    <x-slot name="header">
        Presensi Kelas
    </x-slot>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div type="text" class=" bg-white rounded-lg shadow-xs px-4 py-2 ">
            <a href="/about">
                <button class=" bg-green-700 text-white px-2 py-1 rounded-md ">Kembali</button>
            </a>
        </div>
    </div>
    <div class="inline-flex overflow-hidden mb-2 mt-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div class=" px-4 py-1">
            <form action="/absen" method="post">
                @csrf
                <label for="">Tanggal</label>
                <input class=" border border-green-600 rounded-md px-2 py-1" placeholder=" masukan data" type="date"
                    name="tgl">
                <label for="">Kelas</label>
                <select name="kelas_id" id="" class=" border border-green-800 px-2 py-1 rounded-md">
                    <option value=""> -- Pilih Kelas --</option>
                    @foreach ($kelas as $kelas)
                    <option value="{{$kelas->id}} "> {{ $kelas->nama_kelas  }}</option>
                    @endforeach
                </select>
                <button type="submit" class=" bg-green-600 text-white px-2 py-1 rounded-md">Sesi</button>
            </form>
        </div>
    </div>
    <div class="inline-flex overflow-hidden mb-2 mt-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div class=" w-full px-4">
            <label for="" class=" py-4 font-semibold">SESI KELAS</label>
            <table class=" mt-2 mb-4 w-1/2 table border rounded-md">
                <thead class=" border rounded-md ">
                    <tr class=" bg-gray-50">
                        <th class="px-2 py-1 text-center border">
                            #
                        </th>
                        <th class="px-2 py-1 text-left border">
                            Tanggal
                        </th>
                        <th class="px-2 py-1 text-left">
                            Kelas
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($sesi as $sesi)
                    <tr>
                        <td class=" border text-center">{{$loop->iteration}}</td>
                        <td class=" border px-2 py-1">
                            {{ date_format(date_create($sesi->tgl),'d-m-Y') }}
                        </td>
                        <td class=" border px-2 py-1">
                            <a href="/absen/{{ $sesi->id }}">{{ $sesi->kelas->nama_kelas }}</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>