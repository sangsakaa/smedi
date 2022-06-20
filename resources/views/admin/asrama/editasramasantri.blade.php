<x-app-layout>
    <x-slot name="header">
        {{ __(' Edit Anggota Asrama ') }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white  shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-600">
        </div>
        <div class=" w-full  px-4 py-4 ">
            <div class=" w-full">
                <div class=" w-full bg-white rounded-lg shadow-xs">
                    <form action="/asramasantri/{{$asramasantri->id}}" method="post">
                        @csrf
                        @method('PATCH')
                        <input value="{{ $asramasantri->santri_id }}" name="santri_id" type="text"
                            class=" w-1/4 border border-green-800 rounded-md py-1 px-4" placeholder=" nama_asrama ">

                        <input value="{{ $asramasantri->asrama_id }}" name="asrama_id" type="text"
                            class=" border border-green-800 rounded-md py-1 px-4" placeholder=" kuota_asrama ">

                        <input value="{{ $asramasantri->asrama->tanggal_masuk }}" name="tanggal_masuk" type="date"
                            class=" border border-green-800 rounded-md py-1 px-4" placeholder=" nama_asrama ">

                        <input value="{{ $asramasantri->asrama->tanggal_masuk }}" name="tanggal_keluar" type="date"
                            class=" border border-green-800 rounded-md py-1 px-4" placeholder=" nama_asrama ">

                        <input hidden value="1" name="histori_id" type="text"
                            class=" border border-green-800 rounded-md py-1 px-4" placeholder=" kuota_asrama ">

                        <button type="submit" class="  bg-green-600 py-1 px-2 rounded-md text-white" onClick="swal()">
                            Update</button>
                    </form>


                    {{ $asramasantri->kelassantri }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>