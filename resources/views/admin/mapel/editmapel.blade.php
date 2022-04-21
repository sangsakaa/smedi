<x-app-layout>
    <x-slot name="header">
        {{ __(' Update Mata Pelajaran') }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-800">
        </div>
        <div class=" w-full px-2 py-4 ">
            <div class="mx-3">
                <div class=" bg-white rounded-lg shadow-xs">
                    <form action="/mapel/{{$mapel->id}}" method="post">
                        @csrf
                        @method('patch')
                        <input name="kode_mapel" type="text" value="{{$mapel->kode_mapel}}"
                            class=" border border-green-700 text-green-700 w-1/5 rounded-md px-2 py-1"
                            placeholder=" masukan Kode mapel">
                        <input name="nama_mapel" type="text" value="{{$mapel->nama_mapel}}"
                            class=" border border-green-700 text-green-700 w-1/4 rounded-md px-2 py-1"
                            placeholder=" masukan nama mapel">
                        <input name="keterangan" type="text" value="{{$mapel->keterangan}}"
                            class=" border border-green-700 text-green-700 w-1/4 rounded-md px-2 py-1"
                            placeholder=" masukan nama mapel">
                        <button type="submit" class=" bg-green-800  py-1 px-2 rounded-md text-white">
                            Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>