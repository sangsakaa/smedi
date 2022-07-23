<x-app-layout>
    <x-slot name="header">
        {{ __(' Form Create Asrama') }}
    </x-slot>

    <div class="inline-flex overflow-hidden mb-4 w-full bg-white  shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-800">
        </div>
        <div class=" px-4 py-4">
            <form action="/asrama" method="post">
                @csrf
                <div class=" gap-2 grid grid-cols-1 sm:grid-cols-1">
                    <input name="kelas_smt" type="text" class=" mb-2 border border-green-800 rounded-md py-1 px-4"
                        placeholder=" kelas_smt ">
                    <input name="nama_asrama" type="text" class=" mb-2 border border-green-800 rounded-md py-1 px-4"
                        placeholder=" nama_asrama ">
                    <input name="kuota_asrama" type="text" class=" mb-2 border border-green-800 rounded-md py-1 px-4"
                        placeholder="kuota_asrama ">
                    <select name="type_asrama" id="" class=" mb-2 border border-green-800 py-1 px-2 rounded-md">
                        <option value=""> Pilih Asrama </option>
                        <option value="Putra" @if (old('type_asrama')=="Putra" ) {{ 'selected' }} @endif>
                            Asrama Putra</option>
                        <option value="Putri" @if (old('type_asrama')=="Putri" ) {{ 'selected' }} @endif>
                            Asrama Putri</option>
                    </select>
                    <input name="ket_asrama" type="text" class=" mb-2 border border-green-800 rounded-md py-1 px-4"
                        placeholder="ket_asrama ">

                    <button type="submit" class=" mb-2  bg-green-800 py-1 px-2 rounded-md text-white" onClick="swal()">
                        Asrama</button>


                </div>
            </form>
            <a href="/asrama" class=" grid">
                <button class=" bg-green-800 py-1 px-2 rounded-md text-white">
                    Kembali
                </button>
                
            </a>
        </div>
    </div>
</x-app-layout>