<x-app-layout>
    <x-slot name="header">
        {{ __(' Form Edit Ustadz') }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-4 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1  bg-purple-600">
        </div>
        <div class="px-4 py-2 w-full">
            <form action="/ustadz/{{$ustadz->id}}" method="post">
                @csrf
                @method('patch')
                <div class=" w-full flex">
                    <label for="" class=" capitalize mr-2"> Nama Lengkap</label>
                </div>
                <input name="nama_ustadz" type="text" class=" py-1 px-2 w-1/4  rounded-md"
                    placeholder=" Masuk nama Lengkap " value="{{$ustadz->nama_ustadz}}" required>
                <div class=" w-full flex">
                    <label for="" class=" mr-2"> Jenis Kelamin</label>
                </div>
                <select name="jenis_kelamin" id="" class=" py-1 px-2 w-1/4 rounded-md  " required>
                    <option value="">Pilih Jenis Kelamin</option>
                    <option {{old('jenis_kelamin',$ustadz->jenis_kelamin)=="L"? 'selected':''}} value="L">
                        Laki Laki</option>
                    <option {{old('jenis_kelamin',$ustadz->jenis_kelamin)=="P"? 'selected':''}} value="P">
                        Perempuan</option>
                </select>
                <div class=" w-full flex">
                    <label for="" class=" mr-2">Agama </label>
                </div>
                <select name="agama" id="" class=" py-1 px-2 w-1/4 rounded-md" required>
                    <option {{old('agama',$ustadz->agama)=="Islam"? 'selected':''}} value="Islam">
                        Islam</option>
                </select>
                <div class=" w-full flex">
                    <label for="" class=" mr-2"> Tempat Lahir</label>
                </div>
                <input name="tempat_lahir" type="text" class=" py-1 px-2 w-1/4 rounded-md"
                    placeholder=" Masuk tempat lahir " value="{{$ustadz->tempat_lahir}}" required>
                <div class=" w-full flex">
                    <label for="" class=" mr-2"> Tanggal Lahir </label>
                </div>
                <input value="{{$ustadz->tanggal_lahir}}" name="tanggal_lahir" type="date"
                    class=" py-1 px-2 w-1/4  rounded-md" placeholder=" Masuk tempat lahir " required>
                <div class=" w-full flex">
                    <label for="" class=" mr-2"> Tanggal Masuk </label>
                </div>
                <input value="{{$ustadz->tanggal_masuk}}" name="tanggal_masuk" type="date"
                    class=" py-1 px-2 w-1/4  rounded-md" placeholder=" Masuk tempat lahir " required>
                <div class=" w-full flex">
                    <label for="" class=" mr-2"> Nomor Hp </label>
                </div>
                <input value="{{$ustadz->no_hp}}" name="no_hp" type="text" class=" py-1 px-2 w-1/4  rounded-md"
                    placeholder=" Nomor Hp / WhatApp ">

                <div class=" w-full flex">
                    <label for="" class=" mr-2"> Nama Bank</label>
                </div>
                <select name="nama_bank" id="" class=" py-1 px-2 w-1/4 rounded-md  " required>
                    <option value="">Pilih Bank</option>
                    <option {{old('nama_bank',$ustadz->nama_bank)=="BRI"? 'selected':''}} value="BRI">
                        BRI</option>
                    <option {{old('nama_bank',$ustadz->nama_bank)=="BCA"? 'selected':''}} value="BCA">
                        BCA</option>
                    <option {{old('nama_bank',$ustadz->nama_bank)=="BNI"? 'selected':''}} value="BNI">
                        BNI</option>

                </select>
                <div class=" w-full flex">
                    <label for="" class=" mr-2"> Nomor Rekening </label>
                </div>
                <input value="{{$ustadz->no_rekening}}" name="no_rekening" type="text"
                    class=" py-1 px-2 w-1/4  rounded-md" placeholder=" Nomor Rekning ">
                <div class=" w-full flex">

                    <button class=" mt-1  bg-purple-600 py-1 px-2 w-1/4 d-block  mb-2 text-white rounded-md">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>
</x-app-layout>