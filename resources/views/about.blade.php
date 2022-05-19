<x-app-layout>
    <x-slot name="header">
        {{ __('About us') }}
    </x-slot>
    <div type="text" class="p-4 bg-white rounded-lg shadow-xs py-4 mb-2">

    </div>
    <div class="p-4 bg-white rounded-lg shadow-xs">
        <a href="/absen">
            <button class=" bg-green-700 text-white px-2 py-1 rounded-md ">Presnsi</button>
        </a>
        <div>

        </div>
        <table class=" w-full">
            <thead>
                <tr>
                    <th class=" text-left">Tgl</th>
                    <th class=" text-left">Nama Santri</th>
                    <th class=" text-left">Asrama</th>
                    <th class=" text-left">Keterangan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rekap as $rekap)
                <tr>
                    <td>

                        {{ date_format(date_create($rekap->created_at),'d-m-Y') }}
                    </td>
                    <td>
                        {{ $rekap->kelassantri_id}}
                    </td>
                    <td>
                    </td>
                    <td>
                        {{ $rekap->keterangan }}
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>







    </div>
</x-app-layout>