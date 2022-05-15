<x-app-layout>
    <x-slot name="header">
        {{ __('File PDF us') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        <button class=" px-2 py-2 rounded-md bg-red-800 text-white 0">
            PDF
        </button>
        <ul>
            <!-- @foreach( $data as $dat)
            <li>
                {{ $loop->iteration }} {{ $dat->nama_santri }}
            </li>
            @endforeach -->
        </ul>
    </div>
</x-app-layout>