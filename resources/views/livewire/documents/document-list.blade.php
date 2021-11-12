<div>
    <livewire:documents.header-list :total="$documents->count()" />

    <div class="py-8 wrapper mb-6">
        <livewire:documents.sort-by />

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
            <div class="py-8 flex items-center justify-center">
                <div class="flex flex-col items-center justify-center">
                    <img src="{{ asset('img/empty.svg')}}" class="-mt-20" />
                    @if($search != '' && $documents->count() == 0)
                    <h4 class="font-medium text-gray-400 -mt-28">Lo sentimos, sin resultados de búsqueda con:
                    </h4>
                    <h4 class="font-semibold text-gray-700">{{ $search }}</h4>
                    @else
                    <h4 class="font-medium text-gray-400 -mt-28">Lo sentimos, no hay documentos registrados.</h4>
                    @endif
                </div>
            </div>
            @endforelse


        </div>
        <div class="mt-6 mb-14 flex items-center justify-between">
            {{ $documents->links('vendor.pagination.tailwind-lw') }}
        </div>

    </div>

</div>
@push('js')
<script>
    document.addEventListener('DOMContentLoaded', () => { 
        this.livewire.on('onReport', type => {
            var params = { 
                search: @this.search,
                dateFrom: @this.dateFrom,
                dateTo: @this.dateTo,
            };
            const hashParams = window.btoa(JSON.stringify(params));
            var url = '/report/'
            if (type === 'pdf'){
                var url = '/report-pdf/'
            }else if(type === 'excel'){
                var url = '/report-excel/'
            }
            url += hashParams
            window.open(url, '_blank')
        })    
    })
</script>
@endpush