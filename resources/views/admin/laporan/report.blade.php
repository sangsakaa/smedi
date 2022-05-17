<x-app-layout>
    <x-slot name="header">
        {{ __('Report Daily') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <a href="/about">
            <button class=" bg-green-700 text-white px-2 py-1 rounded-md ">about</button>
        </a>
        <form action="/absen/{{$sesi->id}}" method="post">
            <button type="submit" class="mt-2 bg-green-700 rounded-md text-white py-1 px-2">save</button>
            @csrf
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>#</th>
                        <th class=" text-left">Nama</th>
                        <th class=" text-left">Kelas</th>
                        <th class=" text-right">Keterangan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sesi->kelas->kelassantri as $pesertakelas)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $pesertakelas->asramasantri->santri->nama_santri }}</td>
                        <td>{{ $pesertakelas->kelas->nama_kelas }}</td>
                        <td class=" text-right ">
                            <input type="radio" id="keteranganhadir['{{ $pesertakelas->asramasantri_id }}']"
                                name="keterangan[{{ $pesertakelas->asramasantri_id }}]" value="Hadir" checked><label
                                for="keteranganhadir['{{ $pesertakelas->asramasantri_id }}']">Hadir</label>
                            <input type="radio" id="keteranganalfa['{{ $pesertakelas->asramasantri_id }}']"
                                name="keterangan[{{ $pesertakelas->asramasantri_id }}]" value="Alfa"> <label
                                for="keteranganalfa['{{ $pesertakelas->asramasantri_id }}']">Alfa</label>
                            <input type="radio" id="keterangansakit['{{ $pesertakelas->asramasantri_id }}']"
                                name="keterangan[{{ $pesertakelas->asramasantri_id }}]" value="Sakit"> <label
                                for="keterangansakit['{{ $pesertakelas->asramasantri_id }}']">Sakit</label>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </form>

    </div>

</x-app-layout>