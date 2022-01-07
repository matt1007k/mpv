<div>
    <livewire:users.header-list :total="$users->count()" />

    <div class="py-8 wrapper mb-6">
        <livewire:users.sort-by :sortBy="$orderBy" />
        <div class="w-full mt-10">
            <div class="hidden md:grid grid-cols-9 gap-8  justify-between items-center p-3 border-b border-gray-300">
                <div class="flex font-medium text-gray-500 uppercase text-xs  whitespace-nowrap col-span-3 gap-5">
                    <div class="flex items-center justify-center">
                        #
                    </div>
                    <span>
                        Nombre completo
                    </span>
                </div>
                <div class="flex font-medium text-gray-500 uppercase text-xs  whitespace-nowrap col-span-3">
                    Correo electrónico
                </div>
                <div class="flex font-medium text-gray-500 uppercase text-xs  whitespace-nowrap col-span-2">
                    Rol
                </div>
                <div class="flex font-medium text-gray-500 uppercase text-xs  whitespace-nowrap col-span-1">
                    Fecha
                </div>
            </div>

            @forelse ($users as $user)
            <div
                class="group w-full grid grid-cols-3 md:grid-cols-9 gap-8 hover:bg-gray-100 px-0 py-3 sm:px-3 sm:py-4 rounded-lg cursor-default text-sm">
                <div class="flex items-center gap-5 whitespace-nowrap col-span-2 md:col-span-3">
                    <div class="font-semibold text-center">{{ $user->id }}</div>
                    <div class="flex flex-col">
                        <h6 class="font-medium truncate">{{ $user->name }}</h6>
                        <p class="text-gray-500">{{ strtoupper($user->doc_type)}} {{ $user->doc_number }}</p>
                    </div>
                </div>
                <div class="hidden sm:flex text-gray-500 truncate self-center md:col-span-3">
                    <p class="truncate"> {{ $user->email }}</p>
                </div>
                <div class="hidden md:flex text-gray-500 truncate self-center md:col-span-2">
                    <span class="p-2 rounded-md bg-blue-500 text-white">{{ $user->role }}</span>
                </div>
                <div
                    class="flex items-center justify-between justify-self-end whitespace-nowrap self-center col-span-1">
                    <span class="hidden md:flex mr-4 text-gray-500">{{ $user->createdAtFormat }}</span>

                    <div>
                        <livewire:users.user-option wire:key="{{ $user->id }}" :user="$user" />
                    </div>
                </div>


            </div>
            @empty
            <div class="py-8 flex items-center justify-center">
                <div class="flex flex-col items-center justify-center text-center">
                    <img src="{{ asset('img/empty.svg')}}" class="-mt-20" />
                    @if($search != '' && $users->count() == 0)
                    <h4 class="font-medium text-gray-400 mt-0 md:-mt-28">Lo sentimos, sin resultados de búsqueda con:
                    </h4>
                    <h4 class="font-semibold text-gray-700">{{ $search }}</h4>
                    @else
                    <h4 class="font-medium text-gray-400 mt-0 md:-mt-28">Lo sentimos, no hay useros registrados.</h4>
                    <a href="{{ route('users.create') }}"
                        class=" mt-4 text-blue-500 font-medium hover:underline">Registrar usero</a>
                    @endif
                </div>
            </div>
            @endforelse


        </div>
        <div class="mt-6 mb-14 flex items-center justify-between">
            {{ $users->links('vendor.pagination.tailwind-lw') }}
        </div>

    </div>

</div>
{{-- @push('js')
<script>
    user.addEventListener('DOMContentLoaded', () => { 
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
            url += hashParams;
            window.open(url, '_blank');
        })    
	this.livewire.on('download', filePath => {
		// window.open(filePath, '_blank');
		fetch(filePath)
        .then(res => res.blob())
        .then(response => {
			 const url = window.URL.createObjectURL(
			    new Blob([response])
			);
			const link = user.createElement("a");
            const date = new Date().getTime();
			const name_file = `${date}-usero.pdf`
			link.href = url;
			link.setAttribute("download", name_file); //or any other extension
			user.body.appendChild(link);
			link.click();

		});
	});
    })
</script>
@endpush --}}