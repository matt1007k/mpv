<div class="mb-4 flex justify-between md:justify-end items-center">
    <span class="font-semibold text-gray-500 mr-3">Ordernar por:</span>

    <div x-data="{open: false}" class="relative">
        <div class="flex items-center cursor-pointer py-3 px-5 bg-white shadow-md rounded-full" @click="open = !open">
            <span class="font-medium mr-3">Recientes</span>
            <svg class="w-6 h-6 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7" />
            </svg>
        </div>
        <div x-show="open" x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            class="absolute z-50 mt-2  rounded-md shadow-lg origin-top-right right-0" style="display: none;"
            @click="open = false">
            <div class="rounded-md ring-1 ring-black ring-opacity-5 w-60">
                <div class="option-item flex justify-between {{ $sortBy === 'desc' ? 'active' : ''}}"
                    wire:click="onSortBy('desc')">
                    <span>
                        Recientes
                    </span>
                    <svg class="w-6 h-6 {{ $sortBy === 'desc' ? 'flex' : 'hidden'}}" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 13 4 4L19 7" />
                    </svg>
                </div>
                <div class="option-item flex justify-between {{ $sortBy === 'asc' ? 'active' : ''}}"
                    wire:click="onSortBy('asc')">
                    <span>
                        Antiguos
                    </span>
                    <svg class="w-6 h-6 {{ $sortBy === 'asc' ? 'flex' : 'hidden'}}" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m5 13 4 4L19 7" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>