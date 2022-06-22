<x-app-layout>
    <x-slot name="header">
        {{ __(' Form Tambah Pendidik') }}
    </x-slot>
    <div class="inline-flex overflow-hidden  w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1  bg-green-800">
        </div>
        <div class=" w-full py-4">
            <form action="/ustadz" method="post">
                @csrf
                <div class=" w-1/2 grid grid-cols-1 px-4   ">
                    <input name="nama_ustadz" type="text" class=" border border-green-800 py-1 px-2   rounded-md"
                        placeholder=" Masuk nama Lengkap " value="{{old('nama_ustadz')}}" required>
                    <div class=" py-2 grid grid-cols-2 gap-2">
                        <div class=" w-full">
                            <select name="jenis_kelamin" id=""
                                class="border w-full border-green-800 py-1 px-2  rounded-md  " required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L">Laki Laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                        <div>
                            <select name="agama" id="" class=" w-full border border-green-800 py-1 px-2  rounded-md"
                                required>
                                <option value="">Pilih Agama</option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                            </select>
                        </div>
                    </div>
                    <div class=" py-2  grid grid-cols-2 gap-2">
                        <div>
                            <input name="tempat_lahir" type="text"
                                class=" w-full border border-green-800 py-1 px-2  rounded-md"
                                placeholder=" Masuk tempat lahir " required>
                        </div>
                        <div class="  ">
                            <input name="tanggal_lahir" type="date"
                                class="border w-full border-green-800 py-1 px-4   rounded-md"
                                placeholder=" Masuk tempat lahir " required>
                        </div>
                    </div>
                    <input name="tanggal_masuk" type="date" class="border  border-green-800 py-1 px-2   rounded-md"
                        placeholder=" Masuk tempat lahir " required>
                    <input name="no_hp" type="text" class="border w-full mt-2 border-green-800 py-1 px-2   rounded-md"
                        placeholder=" Nomor Hp / WhatApp ">

                    <div class=" py-2 grid-cols-2 grid gap-2">
                        <div class="">
                            <select name="nama_bank" id=""
                                class="  border w-full border-green-800 py-1 px-2  rounded-md  " required>
                                <option value="">Pilih Bank</option>
                                <option value="BRI">BRI</option>
                                <option value="BNI">BNI</option>
                                <option value="BCA">BCA</option>
                            </select>
                        </div>
                        <div>
                            <input name="no_rekening" type="text"
                                class="border w-full border-green-800 py-1 px-2   rounded-md"
                                placeholder=" Nomor Rekening ">
                        </div>
                    </div>
                    <input name="alamat" type="text" class="border border-green-800 py-1 px-2   rounded-md"
                        placeholder=" Alamat Singkat ">
                    <div class=" py-2 grid grid-cols-2 gap-2">
                        <div>
                            <button class=" mt-1  bg-green-800 py-1 px-2 w-full  d-block   text-white rounded-md">
                                Simpan
                            </button>
                        </div>
                        <div>
                            <button type="reset"
                                class=" mt-1  bg-green-800 py-1 px-2  d-block w-full   text-white rounded-md">
                                Reset
                            </button>
                        </div>
                    </div>
            </form>
        </div>
    </div>
</x-app-layout>