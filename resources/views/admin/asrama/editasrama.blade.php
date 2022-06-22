<x-app-layout>
    <x-slot name="header">
        {{ __(' Daftar Data Asrama') }}
    </x-slot>


    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-600">
        </div>
        <div class=" w-full px-2 py-4 ">
            <div class="mx-3">
                <div class=" bg-white rounded-lg shadow-xs">
                    <form action="/asrama/{{$asrama->id}}" method="post">
                        @csrf
                        @method('PATCH')
                        <input value="{{ $asrama->nama_asrama}}" name="nama_asrama" type="text"
                            class=" border border-green-800 rounded-md py-1 px-4" placeholder=" nama_asrama ">

                        <input value="{{ $asrama->kuota_asrama}}" name="kuota_asrama" type="text"
                            class=" border border-green-800 rounded-md py-1 px-4" placeholder=" kuota_asrama ">

                        <input value="{{ $asrama->keterangan}}" name="keterangan" type="text"
                            class=" border border-green-800 rounded-md py-1 px-4" placeholder=" Keterangan ">

                        <select name="type_asrama" id="" class=" border border-green-800  py-1 px-4  rounded-md">
                            <option value=""> Pilih Type Asrama </option>
                            <option {{old('type_asrama',$asrama->type_asrama)=="Putra"? 'selected':''}} value="Putra">
                                Asrama Putra</option>
                            <option {{old('type_asrama',$asrama->type_asrama)=="Putri"? 'selected':''}} value="Putri">
                                Asrama Putri</option>
                        </select>
                        <button type="submit" class="  bg-green-600 py-1 px-2 rounded-md text-white" onClick="swal()">
                            Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>