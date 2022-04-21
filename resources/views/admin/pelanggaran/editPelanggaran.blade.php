<x-app-layout>
    <x-slot name="header">
        {{ __(' Daftar Data Pelanggaran') }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1  bg-purple-600">
        </div>
        <div class="px-4 py-2 -mx-3">
            <div class="mx-3 font-semibold uppercase text-purple-600">
                Daftar List Santri <form action="" method="get">
                    <input type="text" name="cari" value="{{ request('cari') }}"
                        class=" text-purple-600 rounded-md py-1 px-4" placeholder=" Cari .." autofocus>
                    <button class=" bg-purple-600 py-1 px-2 rounded-md text-white">
                        Cari</button>
                </form>
            </div>
        </div>
    </div>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-purple-600">
        </div>
        <div class=" w-full px-2 py-4 ">
            <div class="mx-3">
                <div class=" bg-white rounded-lg shadow-xs">
                    <form action="/pelanggaran/{{$pelanggaran->id}}" method="post">
                        @csrf
                        @method('patch')
                        <input name="pelanggaran" type="text" value="{{$pelanggaran->pelanggaran}}"
                            class=" rounded-md py-1 px-4" placeholder=" Contoh : Bolos Sekolah ">
                        <select name="level" id="" class="text-purple-600 py-1 px-2 w-1/4 rounded-md  " required>
                            <option {{old('level',$pelanggaran->level)=="Rendah"? 'selected':''}} value="Rendah">
                                Rendah </option>
                            <option {{old('level',$pelanggaran->level)=="Sedang"? 'selected':''}} value="Sedang">
                                Sedang </option>
                            <option {{old('level',$pelanggaran->level)=="Berat"? 'selected':''}} value="Berat">
                                Berat </option>
                        </select>
                        <input name="poin" type="number" value="{{$pelanggaran->poin}}" class=" rounded-md py-1 px-4"
                            placeholder=" Contoh Poin : 1-00 ">
                        <button type="submit" class="  bg-purple-600 py-1 px-2 rounded-md text-white" onClick="swal()">
                            Pelanggaran</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>