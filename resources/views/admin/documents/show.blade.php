<x-app-layout>
    <x-slot name="title">MPV - Detalle del documento</x-slot>
    <x-slot name="description">Ver los detalles del documento.</x-slot>

    <x-slot name="header">
        <div class="wrapper">

            <div class="flex items-center justify-between">
                <div class="flex items-center text-white">
                    <a href="{{ route('dashboard')}}" class="mr-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </a>
                    <h2 class="font-semibold text-2xl text-white leading-tight">
                        {{ __('Detalle') }}
                    </h2>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>