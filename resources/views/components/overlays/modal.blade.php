<div x-data="{ show: false }" class="relative w-full md:w-auto">
    <div @click="show = true">
        {{ $trigger}}
    </div>
    <div class="w-full fixed inset-0 flex items-center justify-center bg-black bg-opacity-20 overflow-auto"
        x-show="show" @keydown.escape.window="show = false" x-transition:enter="ease-out duration-300"
        x-transition:enter-start="opacity-0 transform -translate-y-2"
        x-transition:enter-end="opacity-100 transform translate-y-100" x-transition:leave="ease-in duration-200"
        x-transition:leave-start="opacity-100 transform translate-y-0"
        x-transition:leave-end="opacity-0 transform -translate-y-2">
        <div {{ $attributes->merge(['class' => 'bg-white w-full rounded-lg p-6 mt-3']) }} @click.away="show = false">
            <div class="flex justify-between items-center">
                <h4>{{ $title ?? '' }}</h4>
                <svg class="w-6 h-6 text-gray-400 hover:text-gray-500 cursor-pointer" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" @click="show = false">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </div>
            <div class="mt-5">
                {{ $slot }}
            </div>
        </div>
    </div>
</div>