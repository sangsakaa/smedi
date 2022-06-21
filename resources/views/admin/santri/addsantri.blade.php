<x-app-layout>
    <x-slot name="header">
        {{ __(' Form Tambah Santri') }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-800">
        </div>
        <div class="px-4 py-2 w-full">
            <form action="/santri" method="post">
                @csrf
                <div class=" w-full flex">
                    <label for="" class=" text-green-700 capitalize mr-2"> Nama Lengkap</label>
                </div>
                <input name="nama_santri" type="text" class=" border border-green-700 py-1 px-2 w-1/4  rounded-md"
                    placeholder=" Masuk nama Lengkap " value="{{old('nama_santri')}}" required>
                <div class=" w-full flex">
                    <label for="" class=" text-green-700 mr-2"> Jenis Kelamin</label>
                </div>
                <select name="jenis_kelamin" id="" class=" border border-green-700 py-1 px-2 w-1/4 rounded-md  "
                    required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L">Laki Laki</option>
                    <option value="P">Perempuan</option>
                </select>
                <div class=" w-full flex">
                    <label for="" class=" text-green-700 mr-2">Agama </label>
                </div>
                <select name="agama" id="" class=" border border-green-700 py-1 px-2 w-1/4 rounded-md" required>
                    <option value="">Pilih Agama</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                </select>
                <div class=" w-full flex">
                    <label for="" class=" text-green-700 mr-2"> Tempat Lahir</label>
                </div>
                <input name="tempat_lahir" type="text" class=" border border-green-700 py-1 px-2 w-1/4 rounded-md"
                    placeholder=" Masuk tempat lahir " required> <br>
                <div class=" w-full flex">
                    <label for="" class=" text-green-700 mr-2"> Tanggal Lahir </label>
                </div>
                <input name="tanggal_lahir" type="date" class=" border border-green-700 py-1 px-2 w-1/4  rounded-md"
                    placeholder=" Masuk tempat lahir " required>
                <div class=" w-full flex">
                    <label for="" class=" text-green-700 mr-2"> Tanggal Masuk </label>
                </div>
                <input name="tanggal_masuk" type="date" class=" border border-green-700 py-1 px-2 w-1/4  rounded-md"
                    placeholder=" Masuk tempat lahir " required>
                <br>
                <div class=" w-full flex">
                    <label for="" class=" text-green-700 mr-2"> Nama Ibu </label>
                </div>
                <input name="nama_ibu" type="text" class=" border border-green-700 py-1 px-2 w-1/4  rounded-md"
                    placeholder=" Masuk nama ibu " required>
                <div class=" w-full flex">
                    <label for="" class=" text-green-700 mr-2"> Asal Kota </label>
                </div>
                <input name="asal_kota" type="text" class="  border border-green-700 py-1 px-2 w-1/4  rounded-md"
                    placeholder=" Asal Kota " required>
                <div class="  grid grid-cols-2 w-1/4 gap-2 ">
                    <button class=" mt-1   bg-green-700 py-1 px-2  d-block  mb-2 text-white rounded-md">
                        Simpan
                    </button>
                    <a href="/santri"
                        class=" mt-1 text-center   bg-red-700 py-1 px-2 d-block  mb-2 text-white rounded-md">
                        Batal
                    </a>
                </div>
            </form>

        </div>
    </div>
</x-app-layout>