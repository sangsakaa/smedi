<x-app-layout>
    <x-slot name="header">
        {{ __(' Form Tambah Data Anggota Asrama') }}
    </x-slot>
    <div class="inline-flex overflow-hidden  w-full bg-white rounded-lg shadow-md">
        <div class="  text-white px-4  w-1/3  text-right  bg-green-800 font-semibold  uppercase">
            <span class=" text-2xl py-4 text-left"><a href="/asrama">
                    INFO TERBARU
                </a></span>
        </div>
        <div class=" w-full flex py-1 px-4  text-green-800 font-semibold">
            <marquee> Bacalah selalu dalam hati "Yaa sayyidii Yaa rasulallah"</marquee>
        </div>
    </div>
    <div class="inline-flex overflow-hidden mb-1 mt-2 w-full bg-white rounded-lg shadow-md">
        <div class=" w-1/3 grid grid-cols-1 text-white text-right    bg-green-800 font-semibold px-4 py-2 uppercase">
            <div>Kepengurusan</div>
            <div>Asrama - {{ $asrama->nama_asrama }}</div>
        </div>
        <div class=" w-1"></div>
        <div class="flex justify-center items-center w-2  bg-green-800">
        </div>
        <div class="px-2 mt-1 text-green-800  w-full font-semibold ">
            <table class=" ">
                <thead>
                    <tr class=" text-left ">
                        <th class=" w-1/4     ">Ketua Asrama</th>
                        <th class=" w-1/4  ">
                            : {{ $listpengurus['Ketua Asrama']->pengurusSantri->nama_santri ?? " - " }}</th>
                        <th class=" w-1/4    ">Jama'ah & Pengajian</th>
                        <th class=" w-1/4    ">
                            : {{ $listpengurus['Jama\'ah dan Pengajian']->pengurusSantri->nama_santri ?? "-" }}
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="   ">Keamanan dan Kebersihan</td>
                        <td class="  ">:
                            {{ $listpengurus['Keamanan dan Kebersihan']->pengurusSantri->nama_santri ?? " - " }}
                        </td>
                        <td class="  ">Koordinasi asrama</td>
                        <td class="  ">:
                            {{ $listpengurus['Koordinator Asrama']->pengurusSantri->nama_santri ?? "-" }}
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
    <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-800">
        </div>
    </div>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div class=" w-full px-2 py-4 ">
            <div class=" w-full ">
                <div class=" w-full bg-white rounded-lg shadow-xs">
                    <form action="/asramasantri" method="post">
                        @csrf
                        <div class=" w-full gap-2  grid grid-cols-4">
                            <input autofocus name="santri_id"
                                class=" border-green-800 form-control  py-1 px-2 rounded-md  border"
                                list="datalistOptions" id="exampleDataList" placeholder="Type to search...">
                            <datalist id="datalistOptions">
                                <option value=""> Pilih Anggota Asrama </option>
                                @foreach($datasantri as $santri)
                                <option class="text-green-800" value="{{$santri->id}}">{{$santri->nama_santri}}
                                </option>
                                @endforeach
                            </datalist>
                            <input name="asrama_id" type="hidden" value="{{$asrama->id}}"
                                class="border-green-800 rounded-md py-1" placeholder=" asrama_id">
                            <input name="histori_id" type="hidden" value="1"
                                class=" px-4 border border-green-800 rounded-md py-1" placeholder=" histori_id">
                            <input name="tanggal_masuk" type="date" value="1"
                                class=" px-4 border border-green-800 rounded-md py-1" placeholder=" tanggal_masuk">
                            <input name="tanggal_keluar" type="date" value="1"
                                class=" px-4 border border-green-800 rounded-md py-1" placeholder=" tanggal_keluar">
                            <button type="submit" class="  bg-green-800 py-1 px-2 rounded-md text-white">
                                Anggota Asrama</button>
                    </form>
                </div>
                <div class=" bg-gray-50 mt-2">
                    <div class="overflow-hidden mb-2 w-full rounded-lg border shadow-xs">
                        <div class="overflow-x-auto w-full">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-white uppercase bg-green-800 border-b">
                                        <th class="px-2 py-2 text-center">#</th>
                                        <th class="px-2 py-2 text-center">Nama Anggota Asrama</th>
                                        <th class="px-2 py-2 text-center">JK</th>
                                        <th class="px-2 py-2 text-center">Asal Kota</th>
                                        <th class="px-2 py-2 text-center">Nama Asrama</th>
                                        <th class="px-2 py-2 text-center">Type Asrama</th>
                                        <th class="px-2 py-2 text-center">Tanggal Masuk</th>
                                        <th class="px-2 py-2 text-center">Tanggal Keluar</th>
                                        <th class="px-2 py-2 text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y">

                                    @if($anggota->count())
                                    @foreach ( $anggota as $item)
                                    <tr class=" hover:bg-gray-50 text-gray-700  text-xs ">
                                        <td class="px-2 border py-1  text-sm text-center  ">
                                            {{ $loop->iteration }}
                                        </td>
                                        <td class="px-2 border py-1  text-sm  ">
                                            @if($item->santri !== null)
                                            {{ $item->santri->nama_santri}}
                                            @endif
                                        </td>

                                        <td class="px-2 border py-1  text-sm text-center  ">
                                            @if($item->santri !== null)
                                            {{ $item->santri->jenis_kelamin}}
                                            @endif
                                        </td>
                                        <td class="px-2 border py-1  text-sm  ">
                                            @if($item->santri !== null)
                                            {{ $item->santri->asal_kota}}
                                            @endif
                                        </td>
                                        <td class="px-2 border py-1  text-sm text-center ">
                                            @if($item->asrama !== null)
                                            {{$item->asrama->nama_asrama }}
                                            @endif
                                        </td>
                                        <td class="px-2 border py-1  text-sm  text-center">
                                            @if($item->asrama !== null)
                                            {{$item->asrama->type_asrama }}
                                            @endif
                                        </td>
                                        <td class="px-2 border py-1  text-sm text-center ">
                                            {{$item->tanggal_masuk }}
                                        </td>
                                        <td class="px-2 border py-1  text-sm text-center ">
                                            {{$item->tanggal_keluar }}
                                        </td>

                                        <td class="px-2 border py-1  text-sm flex  content-center ">
                                            <form action="/asramasantri/{{$item->id}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class=" text-green-800"
                                                    onclick="return confirm (' Apakah Anda Ingin Menghapus Data ini :  ')"><svg
                                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                        fill="currentColor" class="bi bi-trash " viewBox="0 0 16 16">
                                                        <path
                                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                                        <path fill-rule="evenodd"
                                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                                    </svg></button>
                                            </form>
                                            <a href="/asramasantri/{{$item->id}}/edit">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                    fill="currentColor" class="  bi bi-pencil-square text-green-800 "
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
                                    @else
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500  bg-gray-50 border-b">
                                        <td class="px-4 py-2 text-red-600 text-sm font-semibold capitalize">
                                            tidak ada anggota !!!
                                        </td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                        <div
                            class="px-4 py-1 text-xs font-semibold tracking-wide text-gray-500  bg-gray-50 border-t sm:grid-cols-9">
                            {{$anggota->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</x-app-layout>