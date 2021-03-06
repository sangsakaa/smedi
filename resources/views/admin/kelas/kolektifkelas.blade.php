<x-app-layout>
    <x-slot name="header">
        {{ __(' Tambah Santri ke Kelas') }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div class=" w-full px-4 py-4 ">
            <div class=" bg-white rounded-lg shadow-xs">
                <form action="/kolektifkelas" method="post">
                    @csrf
                    <select name="kelas_id" id="" class=" border border-green-600 rounded-md px-4 py-1">
                        @foreach ($asrama as $as)
                        <option value="{{ $as->id }}">{{ $as->nama_kelas }} - {{$as->jenjang}}</option>
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
                                            <th class="px-4  py-2"> <input type="checkbox" name="santri[]" id="" onclick="toggle(this)">
                                            </th>
                                            <th class="px-4  py-2">No</th>
                                            <th class="px-4  py-2">Nama Santri</th>
                                            <th class="px-4  py-2">Asrama</th>
                                            <th class="px-4  py-2">JK</th>
                                        </tr>
                                    </thead>

                                    <tbody class="bg-white divide-y capitalize">
                                        @foreach ($list as $santri)
                                        <tr class="text-gray-700 hover:bg-gray-50">
                                            <td class="px-4 py-1 text-sm ">
                                                <input type="checkbox" name="asramasantri[]" id="" value="{{$santri->id}}" onclick="uncheckHeader(this)">
                                            </td>
                                            <td class="px-4  text-sm ">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="px-4  text-sm ">
                                                @if ($santri->santri !== null)
                                                {{ $santri->santri->nama_santri }}
                                                @endif
                                            </td>
                                            <td class="px-4  text-sm ">
                                                @if ($santri->asrama !== null)
                                                {{ $santri->asrama->nama_asrama }}
                                                @endif
                                            </td>

                                            <td class="px-4  text-sm ">
                                                @if ($santri->santri !== null)
                                                {{ $santri->santri->jenis_kelamin }}
                                                @endif
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
    <script language="JavaScript">
        function toggle(source) {
            checkboxes = document.getElementsByName('asramasantri[]');
            for (var i = 0, n = checkboxes.length; i < n; i++) {
                checkboxes[i].checked = source.checked;
            }
        }

        function uncheckHeader(source) {
            checkHeader = document.getElementsByName('santri[]');
            if (!source.checked && checkHeader.checked) {
                checkHeader.checked = false;
            }
        }
    </script>
</x-app-layout>