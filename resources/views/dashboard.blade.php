@section('title', 'Documentos')

<x-app-layout>
    <x-slot name="navbar">
        <x-slot name="navLeft">
            <a href="{{ route('dashboard')}}">
                <x-logo width="45" />
            </a>
            {{-- Navlink desktop --}}
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{ route('dashboard')}}"
                    class="@if(request()->routeIs('dashboard'))text-white @else text-indigo-300 @endif font-semibold text-base">Documentos</a>
                <a href="{{ route('profile.show')}}"
                    class="@if(request()->routeIs('profile.show'))text-white @else text-indigo-300 @endif font-semibold text-base">Perfil</a>
            </div>
        </x-slot>
        <x-slot name="navRight">
            {{-- Mobile --}}
            <div class="p-3 flex md:hidden items-center justify-center bg-white rounded-xl cursor-pointer">
                <svg class="w-6 h-6 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16a4 4 0 0 1-.88-7.903A5 5 0 1 1 15.9 6h.1a5 5 0 0 1 1 9.9M9 19l3 3m0 0 3-3m-3 3V10" />
                </svg>
            </div>
            {{-- Desktop --}}
            <a href="#" class="hidden md:flex py-3 px-4 bg-black text-white font-semibold rounded-lg">
                Nuevo documento
            </a>
            <div class="hidden md:flex">
                <x-jet-dropdown align="right" width="60">
                    <x-slot name="trigger">
                        <div
                            class="w-12 p-3 hidden md:flex items-center justify-center bg-white rounded-full cursor-pointer">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0zm-4 7a7 7 0 0 0-7 7h14a7 7 0 0 0-7-7z" />
                            </svg>
                        </div>
                    </x-slot>

                    <x-slot name="content">
                        <div class="w-60">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 text-xs text-gray-400">
                                {{ __('Administrar Cuenta') }}
                            </div>

                            <x-jet-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Perfil') }}
                            </x-jet-dropdown-link>

                            @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                            <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                                {{ __('API Tokens') }}
                            </x-jet-dropdown-link>
                            @endif

                            <div class="border-t border-gray-100"></div>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Salir') }}
                                </x-jet-dropdown-link>
                            </form>

                        </div>
                    </x-slot>
                </x-jet-dropdown>
            </div>

        </x-slot>
    </x-slot>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-2xl text-white leading-tight">
                    {{ __('Documentos') }}
                </h2>
                <p class="text-indigo-200 font-medium">123 registros</p>
            </div>

            <x-jet-dropdown align="right" width="60">
                <x-slot name="trigger">
                    <div
                        class="hidden md:flex items-center justify-center px-5 py-3 rounded-full bg-white hover:bg-gray-50 ml-0 md:ml-4 cursor-pointer">
                        <span class="font-semibold text-gray-600 mr-2">Exportar</span>

                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                        </svg>
                    </div>
                </x-slot>
                <x-slot name="content">
                    <div class="w-60">
                        <div class="option-item flex justify-between">
                            <span>
                                Excel
                            </span>
                        </div>
                        <div class="option-item flex justify-between">
                            <span>
                                PDF
                            </span>
                        </div>
                    </div>
                </x-slot>
            </x-jet-dropdown>
        </div>
        <div class="w-full md:w-3/5 mx-auto mt-8">
            <div class="flex justify-center space-x-2">
                <div class="relative w-full md:w-3/5">
                    <input type="search" name="search" id="search" placeholder="Qué estas buscando?"
                        class="py-3 pl-12 pr-3 text-base rounded-xl border-none focus:outline-none w-full placeholder-gray-500">

                    <svg class="w-6 h-6 text-gray-500 absolute top-3 left-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m21 21-6-6m2-5a7 7 0 1 1-14 0 7 7 0 0 1 14 0z" />
                    </svg>
                </div>
                <div class="w-auto" x-data="{ isOpen: false }">

                    <div class="p-3 md:px-4 flex items-center justify-center bg-red-500 text-red-100 rounded-xl cursor-pointer"
                        @click="isOpen = true">
                        <svg class="w-6 h-6 " fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6V4m0 2a2 2 0 1 0 0 4m0-4a2 2 0 1 1 0 4m-6 8a2 2 0 1 0 0-4m0 4a2 2 0 1 1 0-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 1 0 0-4m0 4a2 2 0 1 1 0-4m0 4v2m0-6V4" />
                        </svg>
                        <span class="hidden md:block ml-1 text-base font-semibold">Filtrar</span>
                    </div>
                    <div class="fixed inset-0 bg-black bg-opacity-20 z-20 flex items-stretch justify-end"
                        x-show="isOpen" @keydown.escape.window="isOpen = false"
                        x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                        x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0">
                        <div class="bg-white w-full sm:w-4/6 md:w-3/12 h-screen p-6" @click.away="isOpen = false">
                            <div class="flex justify-between items-center">
                                <h4>Filtro avanzado</h4>
                                <svg class="w-6 h-6 text-gray-400 hover:text-gray-500 cursor-pointer" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                    @click="isOpen = false">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </div>
                            <div class="mt-8">
                                <div class="grid grid-cols-2 gap-4">
                                    <div class="col-span-1">
                                        <div class="flex flex-col">
                                            <label for="date_from" class="font-semibold text-gray-600 mb-1">Fecha
                                                de</label>
                                            <input type="date"
                                                class="py-2 px-3 rounded-lg border-2 border-gray-300 text-sm">
                                        </div>
                                    </div>

                                    <div class="col-span-1">
                                        <div class="flex flex-col">
                                            <label for="date_from" class="font-semibold text-gray-600 mb-1">Fecha
                                                a</label>
                                            <input type="date"
                                                class="py-2 px-3 rounded-lg border-2 border-gray-300 text-sm">
                                        </div>
                                    </div>

                                </div>

                                <div class="flex items-center justify-between mt-12 space-x-4">
                                    <button
                                        class="py-3 px-4 font-semibold bg-gray-100 hover:bg-gray-200 w-full rounded-lg">Limpiar</button>
                                    <button
                                        class="py-3 px-4 font-semibold bg-indigo-500 hover:bg-indigo-600 text-indigo-50 w-full rounded-lg">Aplicar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-8 wrapper">
        <div class="mb-4 flex justify-between md:justify-end items-center">
            <span class="font-semibold text-gray-500 mr-3">Ordernar por:</span>
            <x-jet-dropdown align="right" width="60">
                <x-slot name="trigger">
                    <div class="flex items-center cursor-pointer py-3 px-5 bg-white shadow-md rounded-full">
                        <span class="font-medium mr-3">Recientes</span>
                        <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
                        </svg>
                    </div>
                </x-slot>
                <x-slot name="content">
                    <div class="w-60">
                        <div class="option-item active flex justify-between">
                            <span>
                                Recientes
                            </span>
                            <svg class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m5 13 4 4L19 7" />
                            </svg>
                        </div>
                        <div class="option-item flex justify-between">
                            <span>
                                Antiguos
                            </span>
                            <svg class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m5 13 4 4L19 7" />
                            </svg>
                        </div>
                    </div>
                </x-slot>
            </x-jet-dropdown>
        </div>

        <div class="w-full mt-10">
            <div class="hidden md:grid grid-cols-9 gap-8  justify-between items-center p-3 border-b border-gray-300">
                <div class="flex font-medium text-gray-500 uppercase text-xs  whitespace-nowrap col-span-2">
                    Nombre completo
                </div>
                <div class="flex font-medium text-gray-500 uppercase text-xs  whitespace-nowrap col-span-2">
                    Correo electrónico
                </div>
                <div class="flex font-medium text-gray-500 uppercase text-xs  whitespace-nowrap col-span-1">
                    Num. celular
                </div>
                <div class="flex font-medium text-gray-500 uppercase text-xs  whitespace-nowrap col-span-2">
                    Dirección
                </div>
                <div class="flex font-medium text-gray-500 uppercase text-xs  whitespace-nowrap col-span-1">
                    Fecha
                </div>
                <div class="flex  whitespace-nowrap col-span-1">
                </div>
            </div>

            <div
                class="w-full grid grid-cols-3 md:grid-cols-9 gap-8 hover:bg-gray-100 px-0 py-3 sm:px-3 sm:py-4 rounded-lg cursor-default">
                <div class="flex flex-col  whitespace-nowrap col-span-2">
                    <h6 class="font-semibold">Max Meza Garcia</h6>
                    <p class="text-gray-500">DNI 87645632</p>
                </div>
                <div class="hidden sm:flex text-gray-500 truncate self-center md:col-span-2">
                    maxmezagarcia_27@gmail.com </div>
                <div class="hidden md:flex text-gray-500 whitespace-nowrap self-center col-span-1">
                    996537652
                </div>
                <div class="hidden md:flex text-gray-500 truncate self-center md:col-span-2">
                    Ayacucho, Huamanga, Jr. Lima 343
                </div>
                <div class="hidden md:flex flex-col text-indigo-800 whitespace-nowrap self-center col-span-1">
                    23/05/2021
                </div>
                <div class="flex justify-end items-center cursor-pointer whitespace-nowrap col-span-1">
                    <svg class="w-6 h-6 text-gray-400 hover:text-gray-500 transition-all duration-100 ease-out"
                        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z">
                        </path>
                    </svg>
                </div>
            </div>



        </div>

    </div>
</x-app-layout>