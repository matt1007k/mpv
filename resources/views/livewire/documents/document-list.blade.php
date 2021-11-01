<div>
    {{-- <x-slot name="header"> --}}
        <livewire:documents.header-list :total="$documents->count()" />
        {{--
    </x-slot> --}}

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
                <div class="flex font-medium text-gray-500 uppercase text-xs  whitespace-nowrap col-span-3">
                    Dirección
                </div>
                <div class="flex font-medium text-gray-500 uppercase text-xs  whitespace-nowrap col-span-1">
                    Fecha
                </div>
            </div>

            @forelse ($documents as $document)
            <div
                class="group w-full grid grid-cols-3 md:grid-cols-9 gap-8 hover:bg-gray-100 px-0 py-3 sm:px-3 sm:py-4 rounded-lg cursor-default text-sm">
                <div class="flex flex-col  whitespace-nowrap col-span-2">
                    <h6 class="font-medium truncate">{{ $document->full_name }}</h6>
                    <p class="text-gray-500">DNI {{ $document->dni }}</p>
                </div>
                <div class="hidden sm:flex text-gray-500 truncate self-center md:col-span-2">
                    <p class="truncate"> {{ $document->email }}</p>
                </div>
                <div class="hidden md:flex text-gray-500 whitespace-nowrap self-center col-span-1">
                    {{ $document->cell_phone }}
                </div>
                <div class="hidden md:flex text-gray-500 truncate self-center md:col-span-3">
                    <p class="truncate">{{ $document->address }}, {{ $document->origin_place }}</p>
                </div>
                <div
                    class="flex items-center justify-between justify-self-end whitespace-nowrap self-center col-span-1">
                    <span class="hidden md:flex mr-4 text-gray-500">{{ $document->createdAtFormat }}</span>

                    <div>

                        <livewire:documents.document-option wire:key="{{ $document->id }}"
                            :documentId="$document->id" />
                    </div>
                </div>


            </div>
            @empty
            <div class="py-5">
                SIn registros
            </div>

            @endforelse


        </div>

    </div>
</div>