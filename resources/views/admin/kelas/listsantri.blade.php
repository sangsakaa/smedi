<x-app-layout>
    <x-slot name="header">
        {{ __(' Tambah Santri ke Asrama') }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div class=" w-full px-4 py-4 ">
            <div class=" bg-white rounded-lg shadow-xs">
                <form action="/asramasantri/add_many" method="post">
                    @csrf
                    <select name="asrama" id="" class=" border border-green-600 rounded-md px-4 py-1">
                        @foreach ($asrama as $as)
                        <option value="{{ $as->id }}">{{ $as->nama_asrama }}</option>
                        @endforeach
                    </select>
                    <button type="submit" class=" bg-green-800 py-1 px-2 rounded-md text-white">
                        Simpan</button>
                    <div class="overflow-hidden mb-2  mt-4 rounded-lg border shadow-xs">
                        <div class="overflow-x-auto ">
                            <div class=" bg-red-50  w-2/3 sm:w-full grid grid-cols-1 sm:grid-cols-1">
                                <table class="w-full  whitespace-no-wrap" id="#myTable">
                                    <thead>
                                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b ">
                                            <th class="px-4  py-2"> <input type="checkbox" name="santri[]" id="">
                                            </th>
                                            <th class="px-4  py-2">No</th>
                                            <th class="px-4  py-2">Nama Santri</th>
                                            <th class="px-4  py-2">JK</th>
                                            <th class="px-4  py-2  text-center">Anggkatan</th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y capitalize">
                                        @foreach ($list as $santri)
                                        <tr class="text-gray-700 hover:bg-gray-50">
                                            <td class="px-4 py-1 text-sm ">
                                                <input type="checkbox" name="santri[]" id="" value="{{$santri->id}}">
                                            </td>
                                            <td class="px-4  text-sm ">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="px-4  text-sm ">
                                                {{ $santri->nama_santri }}
                                            </td>
                                            <td class="px-4  text-sm ">
                                                {{ $santri->jenis_kelamin }}
                                            </td>
                                            <td class="px-4  text-sm text-center ">

                                                <?php
                                                $date = date_create($santri->tanggal_masuk);
                                                echo date_format($date, "Y");
                                                ?>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class=" px-4 py-1 text-xs font-semibold tracking-wide text-gray-500 bg-gray-50
                                                        border-t sm:grid-cols-9">
                        </div>
                    </div>

                </form>
            </div>

        </div>
    </div>

</x-app-layout>