<x-app-layout>
    <x-slot name="header">
        {{ __(' Detail Kelas') }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white  shadow-md">
        <div class="flex  justify-end items-center  w-1/4   px-2 py-2 bg-green-800">
            <div class="  flex  text-white font-semibold">
                <a href="/kelas">
                    {{ $kelas->nama_kelas }} | Madin {{ $kelas->jenjang }}
                </a>

            </div>
        </div>
        <div class=" w-full mt-2 ">
            <marquee behavior="" direction="" class=" capitalize"> informati ini bisa berubah sewaktu waktu </marquee>
        </div>
    </div>
    <div class="inline-flex overflow-hidden mb-2 w-full  bg-green-200  shadow-md">
        <div class="flex  justify-end items-center  w-1   py-2 bg-green-800">
        </div>
        <div class=" px-4 py-1 grid-cols-2">
            <div class="">
                <label for="" class=" text-green-800 font-semibold"> Info Penting !!</label>
                <br>
                <div class=" px-2">
                    1. Harus ada Rekomendasi dari Kepala atau Bagian Kesiswaan
                </div>
            </div>
        </div>

    </div>
    <form action="/kelas/create" method="post">
        @csrf
        <div class=" grid grid-cols-1 sm:grid-cols-3 gap-2">
            <input name="kelas_id" type="hidden" value="{{$kelas->id}}" class=" px-1 py-1 rounded-md mr-2">
            <input name="asramasantri_id" class="form-control px-2 py-1 border border-green-800 rounded-md "
                list="datalistOptions" id="exampleDataList" placeholder="Type to search..." autofocus>
            <datalist id="datalistOptions">
                <option value="">pilih Anggota Kelas</option>
                @foreach($DataAsrama as $as)
                <option value="{{$as->id}}">{{$as->santri->nama_santri}}</option>
                @endforeach
            </datalist>
            <button type="submit" class=" bg-green-800 px-1  w-1/4 text-white rounded-md">KELAS</button>
    </form>
    <div class=" grid  justify-end w-full px-2 ">
        <a href="/kolektifkelas" class=" py-1 px-4 bg-green-800 text-white rounded-md">
            Kolektif Kelas
        </a>
    </div>
    </div>
    <div class=" bg-gray-50 mt-2">
        <div class="overflow-hidden mb-2 w-full  border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="w-full whitespace-no-wrap" id="#myTable">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                            <th class="px-4 py-3 text-center">#</th>
                            <th class="px-4 py-3 text-center"> Nama Santri </th>
                            <th class="px-4 py-3 text-center"> Asrama </th>
                            <th class="px-4 py-3 text-center"> Kelas </th>
                            <th class="px-4 py-3 text-center"> Jenjang </th>
                            <th class="px-4 py-3 text-center"> Aksi </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y capitalize">

                        @foreach($kelasSantri as $as)
                        <tr class="text-gray-700 hover:bg-gray-50">
                            <td class="px-4 border text-center py-1 text-sm ">
                                {{ $loop->iteration}}
                            </td>
                            <td class="px-4 border  py-1 text-sm ">
                                @if ($as->Asramasantri !== null)
                                {{ $as->Asramasantri->santri->nama_santri }}
                                @endif
                            </td>
                            <td class="px-4 border text-center py-1 text-sm ">
                                @if ($as->Asramasantri !== null)
                                {{ $as->Asramasantri->asrama->nama_asrama }}
                                @endif
                            </td>
                            <td class="px-4 border text-center py-1 text-sm  ">
                                {{ $as->kelas->nama_kelas }}
                            </td>
                            <td class="px-4 border text-center py-1 text-sm ">
                                {{ $as->kelas->jenjang }}
                            </td>
                            <td class="px-4 text-center py-1 text-sm flex ">
                                <form action="/kelas/{{$as->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class=" text-green-800"
                                        onclick="return confirm (' Apakah Anda Ingin Menghapus Data ini : ')"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash inline-block" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg></button>
                                </form>
                                <a href="/kelas/{{$as->id}}/edit"
                                    onclick="return confirm (' Apakah Anda Ingin Merubah Kelas : {{$kelas->nama_kelas}} ')">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-pencil-square ml-1 text-green-800 inline-block "
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                        <path fill-rule="evenodd"
                                            d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                    </svg>
                                </a>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class=" px-4 py-1 text-xs font-semibold tracking-wide text-gray-500 bg-gray-50 border-t
                                                sm:grid-cols-9">
                {{$kelasSantri->links()}}
            </div>
        </div>
    </div>
</x-app-layout>