<x-app-layout>
    <x-slot name="header">
        {{ __(' List Daftar Kelas') }}
    </x-slot>

    <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-800">
        </div>
        <div class="px-4 py-2 -mx-3">
            <div class="mx-3 font-semibold uppercase text-green-800">

                <form action="/kelas" method="get">
                    <input type="text" name="cari" value="{{ request('cari') }}"
                        class=" text-green-800 rounded-md py-1 px-4" placeholder=" Cari ..">
                    <button type="submit" class=" bg-green-800 py-1 px-2 rounded-md text-white">
                        Cari</button>
                </form>
            </div>
        </div>
    </div>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div class=" w-full px-2 py-4 ">
            <div class="mx-3">
                <div class=" bg-white rounded-lg shadow-xs">
                    <form action="/kelas" method="post">
                        @csrf
                        <input autofocus name="nama_kelas" type="text" class=" w-1/4 rounded-md px-2 py-1"
                            placeholder=" masukan nama Kelas">
                        <button type="submit" class=" bg-green-800 py-1 px-2 rounded-md text-white">
                            Kelas</button>
                    </form>
                    <div class=" bg-gray-50 mt-2">
                        <div class="overflow-hidden mb-2 w-full rounded-lg border shadow-xs">
                            <div class="overflow-x-auto w-full">
                                <table class="w-full whitespace-no-wrap" id="#myTable">
                                    <thead>
                                        <tr
                                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                                            <th class="px-4 py-3"> <input type="checkbox" name="id[]" id=""></th>
                                            <th class="px-4 py-3"> Kode Kelas</th>
                                            <th class="px-4 py-3">Kelas</th>
                                            <th class="px-4 py-3">Peserta</th>
                                            <th class="px-4 py-3">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y capitalize">
                                        @foreach ($list as $siswa)
                                        <tr class="text-gray-700">
                                            <td class="px-4 py-2 text-sm ">
                                                <input type="checkbox" name="id[]" id="">
                                            </td>
                                            <td class="px-4 py-2 text-sm ">
                                                {{ $siswa->santri->nama_santri }}
                                            </td>
                                            <td class="px-4 py-2 text-sm ">
                                            </td>
                                            <td class="px-4 py-2 text-sm ">
                                            </td>
                                            </td>
                                            <td class=" px-4 py-2 text-sm">
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class=" px-4 py-1 text-xs font-semibold tracking-wide text-gray-500 bg-gray-50 border-t
                                                sm:grid-cols-9">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>