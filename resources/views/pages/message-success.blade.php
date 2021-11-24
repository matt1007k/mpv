<x-page-layout>
    <x-slot name="title">MPV - Registro con éxito</x-slot>
    <x-slot name="description">Se registro el documento con éxito en la mesa de partes virtual de la DREA.</x-slot>
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
    <div class="wrapper px-6 sm:px-8 md:px-40 mt-4 flex justify-center">
        <div class="w-full md:w-1/2 bg-white shadow border border-gray-100 p-5 rounded-xl">
            <div class="flex items-center justify-center text-green-500 mb-6">
                <svg class="w-20 h-20" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
            </div>
            <h4 class="text-center">Registro completado con éxito</h4>
            <p class="mt-3 mb-10 text-center">Estaremos revisando el documento, en breves momentos te
                comunicaremos
                mediante
                un correo.</p>
            <a href="{{ route('index') }}"
                class="flex items-center justify-center px-4 py-2 bg-blue-500 hover:bg-blue-600 text-white text-base font-medium rounded w-full">Registrar
                otro</a>
        </div>
    </div>
</x-page-layout>