<x-app-layout>
    <x-slot name="header">
        {{ __(' Detail Kelas') }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex  justify-end items-center  w-1/4   px-2 py-2 bg-green-800">
            <div class="  flex  text-white font-semibold">
                <a href="/kelas">
                    {{ $kelas->nama_kelas }}
                </a>
            </div>
        </div>
        <div class=" w-full mt-2 ">
            <marquee behavior="" direction=""> informati ini bisa berubah sewaktu waktu </marquee>
        </div>
    </div>
    <form action="/kelas/create" method="post">
        @csrf
        <div class=" grid grid-cols-1 sm:grid-cols-2 gap-2">
            <input name="kelas_id" type="hidden" value="{{$kelas->id}}" class=" px-1 py-1 rounded-md mr-2">
            <input name="asramasantri_id" class="form-control px-2 py-1 border border-green-800 rounded-md "
                list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
            <datalist id="datalistOptions">
                <option value="">pilih Anggota Kelas</option>
                @foreach($DataAsrama as $as)
                <option value="{{$as->id}}">{{$as->santri->nama_santri}}</option>
                @endforeach
            </datalist>
            <button type="submit" class=" bg-green-800 px-1  w-1/4 text-white rounded-md">KELAS</button>
    </form>
    </div>
    <div class=" bg-gray-50 mt-2">
        <div class="overflow-hidden mb-2 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="w-full whitespace-no-wrap" id="#myTable">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                            <th class="px-4 py-3">#</th>
                            <th class="px-4 py-3"> Nama Santri </th>
                            <th class="px-4 py-3"> Asrama </th>
                            <th class="px-4 py-3"> Kelas MI </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y capitalize">
                        @if($kelasSantri !== null)
                        @foreach($kelasSantri as $as)
                        <tr class="text-gray-700">
                            <td class="px-4 py-2 text-sm ">
                                {{ $loop->iteration}}
                            </td>
                            <td class="px-4 py-2 text-sm ">
                                {{ $as->Asramasantri->santri->nama_santri }}
                            </td>
                            <td class="px-4 py-2 text-sm ">
                                {{ $as->Asramasantri->asrama->nama_asrama }}
                            </td>
                            <td class="px-4 py-2 text-sm ">
                                {{ $as->kelas->nama_kelas }}
                            </td>
                            <td class="px-4 py-2 text-sm ">
                                <form action="/kelassantri/{{$as->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class=" text-green-800"
                                        onclick="return confirm (' Apakah Anda Ingin Menghapus Data ini : ')"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @else
                        <tr
                            class=" text-red-600 text-center font-semibold tracking-wide text-left text-gray-500  bg-gray-50 border-b">
                            <td>
                                data tidak ada / sudah terhapus !!!
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class=" px-4 py-1 text-xs font-semibold tracking-wide text-gray-500 bg-gray-50 border-t
                                                sm:grid-cols-9">
            </div>
        </div>
    </div>
</x-app-layout>