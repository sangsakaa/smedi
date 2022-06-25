<x-app-layout>
    <x-slot name="header">
        {{ __(' Daftar Data Asrama') }}
    </x-slot>


    <div class="inline-flex overflow-hidden mb-2 w-full bg-white rounded-lg shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-600">
        </div>
        <div class=" w-full px-2 py-4 ">
            <div class=" bg-white rounded-lg shadow-xs">
                <div class=" grid grid-cols-1 gap-2 w-1/4 px-2">
                    <form action="/asrama/{{$asrama->id}}" method="post">
                        @csrf
                        @method('PATCH')
                        <div>
                            <label for="">Nama Asrama</label>
                            <input value="{{ $asrama->nama_asrama}}" name="nama_asrama" type="text"
                                class=" mb-2  border border-green-800 rounded-md py-1 px-4 w-full"
                                placeholder=" nama_asrama ">
                        </div>
                        <div>
                            <label for=""> Kuota Asrama</label>
                            <input value="{{ $asrama->kuota_asrama}}" name="kuota_asrama" type="text"
                                class=" mb-2  border border-green-800 rounded-md py-1 px-4 w-full"
                                placeholder=" kuota_asrama ">
                        </div>
                        <div>
                            <label for=""> Jenjang</label>
                            <select name="ket_asrama" id=""
                                class=" mb-2  border border-green-800  py-1 px-4  w-full rounded-md">
                                <option value=""> Pilih Type Asrama </option>
                                <option {{old('ket_asrama',$asrama->ket_asrama)=="SMP"? 'selected':''}} value="SMP">
                                    Asrama SMP</option>
                                <option {{old('ket_asrama',$asrama->ket_asrama)=="SMA"? 'selected':''}} value="SMA">
                                    Asrama SMA</option>
                            </select>
                        </div>
                        <div>
                            <label for=""> Kelas</label>
                            <input value="{{ $asrama->kelas_smt}}" name="kelas_smt" type="text"
                                class=" mb-2  border border-green-800 rounded-md py-1 px-4 w-full"
                                placeholder=" nama_asrama ">
                        </div>
                        <div>
                            <label for=""> Tipe Asrama</label>
                            <select name="type_asrama" id=""
                                class=" mb-2  border border-green-800  py-1 px-4 w-full  rounded-md">
                                <option value=""> Pilih Type Asrama </option>
                                <option {{old('type_asrama',$asrama->type_asrama)=="Putra"? 'selected':''}}
                                    value="Putra">
                                    Asrama Putra</option>
                                <option {{old('type_asrama',$asrama->type_asrama)=="Putri"? 'selected':''}}
                                    value="Putri">
                                    Asrama Putri</option>
                            </select>
                        </div>
                        <div class=" grid-cols-2 grid gap-2">
                            <div><button type="submit"
                                    class=" mb-2  bg-green-600 py-1 px-2 w-full rounded-md text-white" onClick="swal()">
                                    Update</button></div>
                        </div>
                    </form>
                    <div>
                        <button type="submit" class=" mb-2  bg-green-600 py-1 px-2 w-full rounded-md text-white"
                            onClick="swal()">
                            Update</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>