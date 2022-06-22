<x-app-layout>
    <x-slot name="header">
        {{ __('Pengurus Asrama') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">

        <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
            <div class="flex justify-center items-center w-12 bg-green-500">
                <svg class="w-6 h-6 text-white fill-current" viewBox="0 0 40 40" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M20 3.33331C10.8 3.33331 3.33337 10.8 3.33337 20C3.33337 29.2 10.8 36.6666 20 36.6666C29.2 36.6666 36.6667 29.2 36.6667 20C36.6667 10.8 29.2 3.33331 20 3.33331ZM21.6667 28.3333H18.3334V25H21.6667V28.3333ZM21.6667 21.6666H18.3334V11.6666H21.6667V21.6666Z">
                    </path>
                </svg>
            </div>

            <div class="px-4 py-2 -mx-3">
                <div class="mx-3">
                    <span class="font-semibold text-green-500">Info</span>
                    <p class="text-sm text-gray-600 font-semibold"> Pengurus yang bertugas sesui SK yg berlaku</p>
                </div>
            </div>
        </div>

        <form action="/penugasan" method="post">
            @csrf
            <div class=" grid grid-cols-4 gap-2  ">
                <select name="santri_id" id="" class=" border border-green-800  px-2  rounded-md">
                    <option value="">-- Pilih Petugas Asrama --</option>
                    @foreach( $santri as $santri )
                    <option value="{{$santri->id}}">{{ $santri->nama_santri}} </option>
                    @endforeach
                </select>

                <select name="jabatan_id" id="" class=" border border-green-800  px-2  rounded-md">
                    <option value="">-- Pilih Jabatan Petugas Asrama --</option>
                    @foreach($jabatan as $jabatan)
                    <option value="{{$jabatan->id}}"> {{$jabatan->nama_jabatan}}</option>
                    @endforeach
                </select>

                <select name="asrama_id" id="" class=" border border-green-800  px-4  rounded-md">
                    <option value="">-- Pilih Penempatan Petugas --</option>
                    @foreach($asrama as $asrama)
                    <option value="{{$asrama->id}}"> {{$asrama->nama_asrama}}</option>
                    @endforeach
                </select>
                <div>
                    <button type="submit" class="  bg-green-600 px-2 py-1 text-white rounded-lg"><svg
                            xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                            class="bi bi-person-plus-fill inline-block" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            <path fill-rule="evenodd"
                                d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                        </svg> Petugas</button>
                </div>
            </div>

        </form>
        <div class="overflow-hidden mt-2 w-full rounded-lg border shadow-xs">
            <div class="overflow-x-auto w-full">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase bg-gray-50 border-b">
                            <th class="px-4 py-1">#</th>
                            <th class="px-4 py-1">Jabatan</th>
                            <th class="px-4 py-1">Petugas</th>
                            <th class="px-4 py-1">Lokasi Tugas</th>
                            <th class="px-4 py-1">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y">
                        @if($pengurus->count())
                        @foreach( $pengurus as $item)
                        <tr class="text-gray-700">
                            <td class="px-4 py-1 text-sm">
                                {{ $loop->iteration }}
                            </td>
                            <td class=" px-4 py-1 text-sm">
                                {{ $item->pengurusJabatan->nama_jabatan }}
                            </td>
                            <td class="px-4 py-1 text-sm">
                                {{ $item->pengurusSantri->nama_santri}}
                            </td>
                            <td class="px-4 py-1 text-sm">
                                {{ $item->pengurusAsrama->nama_asrama}}
                            </td>
                            <td class="px-4 py-1 text-sm">
                                <form action="/penugasan/{{$item->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class=" text-purple-600"
                                        onclick="return confirm (' Apakah Anda Ingin Menghapus Data  {{$item->id}} : ')"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                            <path
                                                d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                                            <path fill-rule="evenodd"
                                                d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                                        </svg></button>
                                </form>
                            </td>
                            @endforeach
                            @else

                        </tr>
                        <tr>
                            <td colspan="5" class=" text-center px-4 font-semibold text-red-600">
                                Belum ada Penugasan !!!
                            </td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div
                class="px-4 py-1 text-xs font-semibold tracking-wide text-gray-500  bg-gray-50 border-t sm:grid-cols-9">
                {{ $pengurus->links() }}
            </div>
        </div>
    </div>
</x-app-layout>