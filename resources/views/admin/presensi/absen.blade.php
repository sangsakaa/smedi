<x-app-layout>
    <x-slot name="header">
        Presensi Kelas
    </x-slot>
    <div class="p-4 bg-white rounded-lg shadow-xs">
        <div>
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

        <table class=" w-full">
            <thead>
                <tr>
                    <th class=" text-left">
                        Tanggal
                    </th>
                    <th class=" text-left">
                        Kelas
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach($sesi as $sesi)
                <tr>
                    <td>

                        {{ date_format(date_create($sesi->tgl),'d-m-Y') }}
                    </td>
                    <td>
                        <a href="/absen/{{ $sesi->id }}">{{ $sesi->kelas->nama_kelas }}</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>