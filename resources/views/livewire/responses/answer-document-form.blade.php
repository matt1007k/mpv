<div class="
        bg-white
        dark:bg-gray-secondary
        dark:border-gray-secondary
        dark:border-opacity-50
        shadow
        overflow-hidden
        sm:rounded-lg mt-5 p-6">
    <div class="bg-gray-100 rounded-md flex items-center gap-2 px-2 py-1">
        <div wire:click="toggleSend('success')"
            class="py-3 px-4 w-1/2 rounded-md @if($type === 'success')bg-blue-500 hover:bg-blue-600 text-white @else bg-gray-100  hover:bg-gray-200 text-gray-500 @endif font-semibold text-base text-center cursor-pointer">
            Enviar
            el registro del SISGEDO
        </div>
        <div wire:click="toggleSend('warning')"
            class="py-3 px-4 w-1/2 rounded-md @if($type === 'warning')bg-blue-500 hover:bg-blue-600 text-white @else bg-gray-100  hover:bg-gray-200 text-gray-500 @endif font-semibold text-base text-center cursor-pointer">
            Enviar
            observación</div>
    </div>

    <form wire:submit.prevent="sendAnswer">
        <div class="mt-5 grid grid-cols-2 gap-5">
            <div class="col-span-1">
                <x-jet-label for="subject" value="{{ __('auth.subject') }}" />
                <x-jet-input wire:model="subject" id="subject" class="block mt-1 w-full " type="text" name="subject"
                    :value="old('subject')" required />
                <x-jet-input-error for="subject"></x-jet-input-error>
            </div>
            <div class="col-span-1">
                <x-jet-label for="status" value="{{ __('Estado') }}" />
                <x-form.select id="status" class="block mt-1 w-full" wire:model="status" name="status">
                    <option value="be_processed" {{ old('status')==='be_processed' ? 'selected' : '' }}>Por
                        tramitar</option>
                    <option value="processed" {{ old('status')==='processed' ? 'selected' : '' }}>Tramitado
                    </option>
                </x-form.select>
                <x-jet-input-error for="status"></x-jet-input-error>
            </div>

            @if($type === 'success')
            <div class="col-span-1">
                <x-jet-label for="document_number" value="{{ __('auth.document_number') }}" />
                <x-jet-input wire:model="document_number" id="document_number" class="block mt-1 w-full" type="text"
                    name="document_number" :value="old('document_number')" required autofocus />
                <x-jet-input-error for="document_number"></x-jet-input-error>
            </div>
            <div class="col-span-1">
                <x-jet-label for="file_number" value="{{ __('auth.file_number') }}" />
                <x-jet-input wire:model="file_number" id="file_number" class="block mt-1 w-full" type="text"
                    name="file_number" :value="old('file_number')" required autofocus />
                <x-jet-input-error for="file_number"></x-jet-input-error>
            </div>
            @elseif($type === 'warning')
            <div class="col-span-2">
                <x-jet-label for="observation" value="{{ __('auth.observation') }}" />
                <x-form.textarea wire:model="observation" id="observation" class="block mt-1 w-full" name="observation"
                    required autofocus>{{ old('observation') }}</x-form.textarea>
                <x-jet-input-error for="observation"></x-jet-input-error>
            </div>
            @endif
        </div>
        <div class="mt-5 flex justify-end">
            <x-form.btn type="submit" color="primary" size="large">Enviar</x-form.btn>
        </div>
    </form>
</div>