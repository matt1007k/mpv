<div class="bg-blue-500 pt-0 pb-8">

    <div class="wrapper">

        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-2xl text-white leading-tight">
                    {{ __('Documentos') }}
                </h2>
                <p class="text-indigo-200 font-medium">{{ $total }} registros</p>
            </div>

            <x-jet-dropdown align="right" width="60">
                <x-slot name="trigger">
                    {{-- Mobile --}}
                    <div class="p-3 flex md:hidden items-center justify-center bg-white rounded-xl cursor-pointer">
                        <svg class="w-6 h-6 text-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 0 1-.88-7.903A5 5 0 1 1 15.9 6h.1a5 5 0 0 1 1 9.9M9 19l3 3m0 0 3-3m-3 3V10" />
                        </svg>
                    </div>
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
                        class="py-3 pl-12 pr-3 text-base rounded-xl border-none focus:outline-none w-full placeholder-gray-500"
                        wire:model="search">

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
    </div>
</div>