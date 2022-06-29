<x-app-layout>
    <x-slot name="header">
        {{ __(' Daftar Kelas') }}
    </x-slot>
    <div class="inline-flex overflow-hidden mb-2 w-full bg-white  shadow-md">
        <div class="flex justify-center items-center w-1 bg-green-600">
        </div>
        <div class=" w-full  px-2 py-4 ">
            <div class="mx-3">
                <div class=" bg-white  shadow-xs">
                    <form action="" method="post">
                        @csrf
                        @method('patch')
                        <div class=" gris grid-cols-3">

                            <button type="submit" class=" bg-green-600 py-1 px-2 rounded-md text-white">
                                Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>