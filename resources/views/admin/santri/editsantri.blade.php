<x-app-layout>
    <x-slot name="header">
        {{ __(' Form Update Santri') }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-800">
        </div>
        <div class="px-4 py-2 w-full">
            <form action="/santri/{{$santri->id}}" method="post">
                @csrf
                @method('patch')
                <div class=" w-full flex">
                    <label for="" class=" capitalize mr-2"> Nama Lengkap</label>
                </div>
                <input name="nama_santri" type="text" class="text-green-800 py-1 px-1 w-1/4  rounded-md"
                    placeholder=" Masuk nama Lengkap " value="{{$santri->nama_santri}}" required>
                <div class=" w-full flex">
                    <label for="" class=" mr-2"> Jenis Kelamin</label>
                </div>
                <select name="jenis_kelamin" id="" class="text-green-800 py-1 px-2 w-1/4 rounded-md  " required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option {{old('jenis_kelamin',$santri->jenis_kelamin)=="L"? 'selected':''}} value="L">
                        Laki Laki</option>
                    <option {{old('jenis_kelamin',$santri->jenis_kelamin)=="P"? 'selected':''}} value="P">
                        Perempuan</option>
                </select>
                <div class=" w-full flex">
                    <label for="" class=" mr-2">Agama </label>
                </div>
                <select name="agama" id="" class="text-green-800 py-1 px-2 w-1/4 rounded-md" value="{{$santri->agama}}"
                    required>
                    <option {{old('agama',$santri->agama)=="Islam"? 'selected':''}} value="Islam">
                        Islam</option>

                </select>
                <div class=" w-full flex">
                    <label for="" class=" mr-2"> Tempat Lahir</label>
                </div>
                <input name="tempat_lahir" type="text" class=" text-green-800 py-1 px-1 w-1/4 rounded-md"
                    placeholder=" Masuk tempat lahir " value="{{$santri->tempat_lahir}}" required> <br>
                <div class=" w-full flex">
                    <label for="" class=" mr-2"> Tanggal Lahir </label>
                </div>
                <input name="tanggal_lahir" type="date" class=" text-green-800 py-1 px-1 w-1/4  rounded-md"
                    placeholder=" Masuk tempat lahir " value="{{$santri->tanggal_lahir}}" required>
                <div class=" w-full flex">
                    <label for="">Tanggal Masuk</label>
                </div>
                <input name="tanggal_masuk" type="date" class=" text-green-800 py-1 px-1 w-1/4  rounded-md"
                    placeholder=" Masuk tempat lahir " value="{{$santri->tanggal_masuk}}" required>
                <br>
                <div class=" w-full flex">
                    <label for="" class=" mr-2"> Nama Ibu </label>
                </div>
                <input name="nama_ibu" type="text" class=" text-green-800 py-1 px-1 w-1/4  rounded-md"
                    placeholder=" Masuk nama ibu " value="{{$santri->nama_ibu}}" required>
                <div class=" w-full flex">
                    <label for="" class=" mr-2"> Asal Kota </label>
                </div>
                <input name="asal_kota" type="text" class="text-green-800 py-1 px-1 w-1/4  rounded-md"
                    placeholder=" Masuk nama Lengkap " value="{{$santri->asal_kota}}" required>
                <div class=" w-full flex">
                    <div class=" w-full flex">
                        <button class=" mt-1  bg-green-800 py-1 px-1 w-1/4 d-block  mb-2 text-white rounded-md">
                            Update
                        </button>
                    </div>
            </form>
        </div>
    </div>
</x-app-layout>