<div x-data="{ open: @entangle('showDropdown') }" class="relative">
    <svg @click="open = !open"
        class=" w-6 h-6 md:opacity-0 md:group-hover:opacity-100 text-gray-400 hover:text-gray-500 transition-all duration-200 ease-out"
        fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
            d="M5 12h.01M12 12h.01M19 12h.01M6 12a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0zm7 0a1 1 0 11-2 0 1 1 0 012 0z">
        </path>
    </svg>
    <div class="w-60 z-50 absolute origin-top-right right-0 shadow-lg" @click.away="open = false" x-show="open">
        <a href="{{ route('admin.documents.show', $documentId)}}" class="option-item flex justify-between">
            <span>
                Ver detalle
            </span>
        </a>
        <div class="option-item flex justify-between" wire:click="$emit('download', '{{ $filePath }}')">
            <span>
                Descargar archivo
            </span>
        </div>
    </div>
</div>
