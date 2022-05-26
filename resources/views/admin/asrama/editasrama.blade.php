<x-app-layout>
    <x-slot name="header">
        {{ __(' Daftar Data Asrama') }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-600">
        </div>
        <div class="px-4 py-2 -mx-3">
            <div class="mx-3 font-semibold uppercase text-green-600">
                Form Edit Asrama <a href="#"><button class=" bg-green-600 px-2 py-1 text-white rounded-md"><svg
                            xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-plus-fill" viewBox="0 0 16 16">
                            <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                            <path fill-rule="evenodd"
                                d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                        </svg></button></a>
            </div>
        </div>
    </div>

    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-600">
        </div>
        <div class=" w-full px-2 py-4 ">
            <div class="mx-3">
                <div class=" bg-white rounded-lg shadow-xs">
                    <form action="/asrama/{{$asrama->id}}" method="post">
                        @csrf
                        @method('patch')
                        <input value="{{ $asrama->nama_asrama}}" name="nama_asrama" type="text"
                            class=" border border-green-800 rounded-md py-1 px-4" placeholder=" nama_asrama ">
                        <input value="{{ $asrama->kuota_asrama}}" name="kuota_asrama" type="text"
                            class=" border border-green-800 rounded-md py-1 px-4" placeholder=" kuota_asrama ">
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