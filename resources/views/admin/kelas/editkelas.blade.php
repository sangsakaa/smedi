<x-app-layout>
    <x-slot name="header">
        {{ __(' Daftar Kelas') }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-600">
        </div>
        <div class=" w-full  px-2 py-4 ">
            <div class="mx-3">
                <div class=" bg-white rounded-lg shadow-xs">
                    <form action="/kelas/{{$kelas->id}}" method="post">
                        @csrf
                        @method('patch')
                        <div class=" gris grid-cols-3">
                            <input name="kode_kelas" type="text" value="{{$kelas->kode_kelas}}"
                                class=" border border-green-800  rounded-md px-2 py-1"
                                placeholder=" masukan Kode Kelas">
                            <input name="nama_kelas" type="text" value="{{$kelas->nama_kelas}}"
                                class=" border border-green-800  rounded-md px-2 py-1"
                                placeholder=" masukan nama Kelas">
                            <button type="submit" class=" bg-green-600 py-1 px-2 rounded-md text-white">
                                Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>