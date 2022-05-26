<x-app-layout>
    <x-slot name="header">
        {{ __(' Daftar Kelas Santri') }}
    </x-slot>

    <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-600">
        </div>
        <div class="px-4 py-2 -mx-3">
            <div class="mx-3 font-semibold uppercase text-green-600">

                <form action="/kelas" method="get">
                    <input type="text" name="cari" value="{{ request('cari') }}"
                        class=" text-green-600 rounded-md py-1 px-4" placeholder=" Cari ..">
                    <button type="submit" class=" bg-green-600 py-1 px-2 rounded-md text-white">
                        Cari</button>
                </form>
            </div>
        </div>
    </div>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-600">
        </div>
        <div class=" w-full px-2 py-4 ">
            <div class="mx-3">
                <div class=" bg-white rounded-lg shadow-xs">
                    <form action="/kelas" method="post">
                        @csrf
                        <input autofocus name="nama_kelas" type="text" class=" w-1/4 rounded-md px-2 py-1"
                            placeholder=" masukan nama Kelas">
                        <button type="submit" class=" bg-green-600 py-1 px-2 rounded-md text-white">
                            Kelas</button>
                    </form>
                    <div class=" bg-gray-50 mt-2">
                        <div class="overflow-hidden mb-2 w-full rounded-lg border shadow-xs">
                            <div class="overflow-x-auto w-full">
                                <table class="w-full whitespace-no-wrap" id="#myTable">
                                    <thead>
                                        <tr
                                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                                            <th class="px-4 py-3">#</th>
                                            <th class="px-4 py-3"> KelasX </th>

                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y capitalize">
                                        @if($kelas->count())
                                        @foreach($kelas as $kelas)
                                        <tr class="text-gray-700 hover:bg-gray-100">
                                            <td class="px-4 py-1 text-sm ">
                                                {{ $loop->iteration }}
                                            </td>
                                            <td class="px-4 py-1 text-sm ">
                                                <a href="/kelas/{{$kelas->id}}">{{$kelas->nama_kelas}}</a>
                                            </td>

                                        </tr>
                                        @endforeach
                                        @else
                                        <tr class="bg-gray-50">
                                            <td class="  px-4 py-2 text-sm text-center font-semibold">Data tidak
                                                tersedia !!!</td>
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
                </div>
            </div>
        </div>
    </div>

</x-app-layout>