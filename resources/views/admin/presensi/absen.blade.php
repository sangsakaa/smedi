<x-app-layout>
    <x-slot name="header">
        {{ __('Presensi') }}
    </x-slot>

    <div class="p-4 bg-white rounded-lg shadow-xs">
        {{ $absen }}
    </div>
</x-app-layout>