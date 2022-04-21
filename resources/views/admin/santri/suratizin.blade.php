<x-app-layout>
    <x-slot name="header">
        {{ __('Contoh Format Surat Izin Pulang') }}
    </x-slot>

    <script>
    function printContent(el) {
        var fullbody = document.body.innerHTML;
        var printContent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printContent;
        window.print();
        document.body.innerHTML = fullbody;
    }
    </script>
    <div class=" flex">
        <button class="text-white rounded-md mb-2 bg-purple-600 px-2 py-1 " onclick="printContent('div1')">
            Cetak</button>
    </div>
    <div class="inline-flex overflow-hidden m-0  w-full rounded-md bg-white  shadow-md">
        <div class=" mx-4  px-4 " id="div1">
            <div class=" w-full text-green-600 ">
                <div class=" font-semibold w-full">
                    <center>
                        <span class=" text-xl uppercase text-green-600 border-green-900 border-b">
                            SURAT IZIN PULANG
                        </span>
                    </center>
                    <center>
                        <p class=" text-sm text-green-600">Nomor :
                            ___/PKK/PL/___/{{ date_format(date_create(now()),"Y")}}</p>
                    </center>
                </div>
                <div class="flex justify-center items-center w-1  ">
                </div>
                <div class=" w-full  py-2">
                    Dengan ini kami memberikan izin seperlunya kepada :
                    <div class="overflow-hidden mb-1 w-full rounded-lg  shadow-xs">
                        <div class="overflow-x-auto w-full">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                </thead>
                                @if($santri !== null)
                                <tbody class=" ">
                                    <tr class="">
                                        <td class=" px-4 py-1 text-sm  ">
                                            Nama Lengkap
                                        </td>
                                        <td class=" font-semibold px-4 py-1 text-sm">
                                            : {{ $santri->nama_santri }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=" px-4 py-1 text-sm">
                                            Asal Kota
                                        </td>
                                        <td class=" font-semibold px-4 py-1 text-sm">
                                            : {{ $santri->asal_kota }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class=" px-4 py-1 text-sm">
                                            Keperluan
                                        </td>
                                        <td class=" px-4 py-1 text-sm">
                                            :
                                        </td>
                                    </tr>
                                </tbody>
                                @endif
                            </table>
                        </div>
                    </div>
                    <div class=" px-0 mb-2  ">
                        Demikian surat izin ini kami buat, agar dipergunakan mana mestinya dan setelah
                        sampai di
                        pondok di kembalikan kepada Pengurus Pondok dengan biaya admin Rp. 5000
                    </div>
                    <div class=" flex w-full">
                        <div class=" w-full   flex ">
                            <div class=" w-full text-center ">
                                <p class=" text-sm text-green-600">Mengetahui</p>
                                <p class="  text-green-600  ">Pramu Pondok Kedunglo </p><br><br>
                                <p class="  text-green-600 mt-8"> Afif Afandi, S.E </p>
                            </div>
                        </div>
                        <div class=" w-full   flex ">
                            <div class=" w-full  text-center  ">
                                <p class="  text-sm text-green-600">Kedunglo,{{date('d-M-Y')}}</p>
                                <p class="  text-green-600 ">Ketua Keamanan </p><br><br>
                                <p class="  text-green-600 mt-8"> Lugas</p>
                            </div>
                        </div>
                    </div>
                    <center>
                        <div class=" mb-0 ">
                            <p class=" text-sm text-green-600">Menyetujui / ACC</p>
                            <p class="  uppercase text-green-600">Pengasuh Pondok</p>
                            <div class=" w-full"><br><br><br><br>
                                <span class=" border-b uppercase ">Kanjeng Kyai Abdul Majid Ali
                                    Fikri ,R.a</span>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>