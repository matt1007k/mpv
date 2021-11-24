<x-page-layout>
    <x-slot name="title">MPV - Registrar documento</x-slot>
    <x-slot name="description">Registrar un documento en la mesa de partes virtual de la DREA.</x-slot>
    <x-slot name="header">
        <div class="wrapper flex items-center py-4">
            <a href="{{ route('index')}} ">
                <x-logo class="w-12" />
            </a>
            @auth
            <div class="flex items-center ml-4 mr-auto">
                <a href="{{ route('dashboard')}}"
                    class="@if(request()->routeIs('dashboard'))text-white @else text-gray-600 @endif font-semibold text-base hover:text-gray-500">Documentos</a>
            </div>
            @endauth
        </div>
    </x-slot>
    <div class="wrapper px-6 md:px-32 mt-4 mb-8">
        <livewire:documents.create />
    </div>
</x-page-layout>