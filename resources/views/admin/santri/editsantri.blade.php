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
                <div class=" grid grid-cols-1 sm:grid-cols-1 w-full sm:w-1/4">
                    <label for="" class=" capitalize mr-2"> Nomor Induk Santri</label>
                    <input name="nis" type="text" class=" border border-green-800 text-green-800 py-1 px-2   rounded-md" placeholder=" Masuk nama Lengkap " value="{{$santri->nis}}" required>
                    <label for="" class=" capitalize mr-2"> Nama Lengkap</label>
                    <input name="nama_santri" type="text" class=" border border-green-800 text-green-800 py-1 px-2   rounded-md" placeholder=" Masuk nama Lengkap " value="{{$santri->nama_santri}}" required>
                    <label for="" class=" mr-2"> Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="" class="border border-green-800  text-green-800 py-1 px-2  rounded-md  " required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option {{old('jenis_kelamin',$santri->jenis_kelamin)=="L"? 'selected':''}} value="L">
                            Laki Laki</option>
                        <option {{old('jenis_kelamin',$santri->jenis_kelamin)=="P"? 'selected':''}} value="P">
                            Perempuan</option>
                    </select>
                    <label for="" class=" mr-2">Agama </label>
                    <select name="agama" id="" class="border border-green-800 text-green-800 py-1 px-2  rounded-md" value="{{$santri->agama}}" required>
                        <option {{old('agama',$santri->agama)=="Islam"? 'selected':''}} value="Islam">
                            Islam</option>
                    </select>
                    <label for="" class=" mr-2"> Tempat Lahir</label>
                    <input name="tempat_lahir" type="text" class=" border border-green-800 text-green-800 py-1 px-2  rounded-md" placeholder=" Masuk tempat lahir " value="{{$santri->tempat_lahir}}" required>
                    <label for="" class=" mr-2"> Tanggal Lahir </label>
                    <input name="tanggal_lahir" type="date" class="border border-green-800 text-green-800 py-1 px-2   rounded-md" placeholder=" Masuk tempat lahir " value="{{$santri->tanggal_lahir}}" required>
                    <label for="">Tanggal Masuk</label>
                    <input name="tanggal_masuk" type="date" class="border border-green-800 text-green-800 py-1 px-2   rounded-md" placeholder=" Masuk tempat lahir " value="{{$santri->tanggal_masuk}}" required>
                    <label for="" class=" mr-2"> Nama Ibu </label>
                    <input name="nama_ibu" type="text" class="border border-green-800 text-green-800 py-1 px-2   rounded-md" placeholder=" Masuk nama ibu " value="{{$santri->nama_ibu}}" required>
                    <label for="" class=" mr-2"> Asal Kota </label>
                    <input name="asal_kota" type="text" class="border border-green-800 text-green-800 py-1 px-2   rounded-md" placeholder=" Masuk nama Lengkap " value="{{$santri->asal_kota}}" required>
                    <label for="" class=" mr-2"> Status</label>
                    <select name="status_santri" id="" class="border border-green-800  text-green-800 py-1 px-2  rounded-md  " required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option {{old('status_santri',$santri->status_santri)=="aktif"? 'selected':''}} value="aktif">
                            Aktif</option>
                        <option {{old('status_santri',$santri->status_santri)=="lulus"? 'selected':''}} value="lulus">
                            Lulus</option>
                    </select>
                    <div class=" w-full  grid grid-cols-2  gap-2 ">
                        <button class=" mt-1  bg-green-800 py-1 px-1    mb-2 text-white rounded-md">
                            Update
                        </button>
                        <a href="/santri">
                            <button class=" mt-1 w-full  bg-green-800 py-1 px-1    mb-2 text-white rounded-md">
                                Kembali
                            </button>
                        </a>
                    </div>
                </div>
        </div>
    </div>
    </form>
    </div>
    </div>
</x-app-layout>