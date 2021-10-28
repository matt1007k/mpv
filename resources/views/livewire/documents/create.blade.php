<div>
    <div class="mb-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Registrar documento
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
            Completa los campos requeridos para registrar tu documento.
        </p>
    </div>

    <nav aria-label="Progress" class="mb-8">
        <ol role="list" class="space-y-4 md:flex md:space-y-0 md:space-x-8">
            <li class="md:flex-1">
                <!-- Completed Step -->
                <a wire:click="goStep(1)"
                    class="cursor-pointer group pl-4 py-2 flex flex-col border-l-4 @if($currentStep >= 1) border-indigo-600 group-hover:border-indigo-800 @else border-gray-200 group-hover:border-gray-300 @endif md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                    <span
                        class="text-xs @if($currentStep >= 1) text-indigo-600 group-hover:text-indigo-800 @else text-gray-500 group-hover:text-gray-700 @endif font-semibold tracking-wide uppercase">Paso
                        1</span>
                    <span class="text-sm font-medium">Mis datos</span>
                </a>
            </li>

            <li class="md:flex-1">
                <!-- Current Step -->
                <a wire:click.prevent="goStep(2)"
                    class="cursor-pointer group pl-4 py-2 flex flex-col border-l-4 @if($currentStep >= 2) border-indigo-600 group-hover:border-indigo-800 @else border-gray-200 group-hover:border-gray-300 @endif md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4"
                    aria-current="step">
                    <span
                        class="text-xs @if($currentStep >= 2) text-indigo-600 group-hover:text-indigo-800 @else text-gray-500 group-hover:text-gray-700 @endif font-semibold tracking-wide uppercase">PASO
                        2</span>
                    <span class="text-sm font-medium">Mi dirección</span>
                </a>
            </li>

            <li class="md:flex-1">
                <!-- Upcoming Step -->
                <a wire:click="goStep(3)"
                    class="cursor-pointer group pl-4 py-2 flex flex-col border-l-4 @if($currentStep >= 3) border-indigo-600 hover:border-indigo-800 @else border-gray-200 group-hover:border-gray-300 @endif md:pl-0 md:pt-4 md:pb-0 md:border-l-0 md:border-t-4">
                    <span
                        class="text-xs text-gray-500 font-semibold tracking-wide uppercase group-hover:text-gray-700">PASO
                        3</span>
                    <span class="text-sm font-medium">Adjuntar archivo</span>
                </a>
            </li>
        </ol>
    </nav>

    <form wire:submit.prevent="register">

        @if($currentStep == 1)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
            <div class="col-span-1">
                <x-jet-label for="full_name" value="{{ __('auth.full_name') }}" />
                <x-jet-input wire:model="full_name" id="full_name" class="block mt-1 w-full " type="text"
                    name="full_name" :value="old('full_name')" required autofocus />
                <x-jet-input-error for="full_name"></x-jet-input-error>
            </div>
            <div class="col-span-1">
                <x-jet-label for="email" value="{{ __('auth.email') }}" />
                <x-jet-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email')" required autofocus />
                <x-jet-input-error for="email"></x-jet-input-error>
            </div>
            <div class="col-span-1">
                <x-jet-label for="dni" value="{{ __('auth.dni') }}" />
                <x-jet-input wire:model="dni" maxlength="8" id="dni" class="block mt-1 w-full" type="text" name="dni"
                    :value="old('dni')" required autofocus />
                <x-jet-input-error for="dni"></x-jet-input-error>
            </div>
            <div class="col-span-1">
                <x-jet-label for="cell_phone" value="{{ __('auth.cell_phone') }}" />
                <x-jet-input wire:model="cell_phone" id="cell_phone" class="block mt-1 w-full" type="text"
                    name="cell_phone" :value="old('cell_phone')" maxlength="9" required autofocus />
                <x-jet-input-error for="cell_phone"></x-jet-input-error>
            </div>
        </div>
        @endif

        @if($currentStep == 2)
        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
            <div class="col-span-1">
                <x-jet-label for="address" value="{{ __('auth.address') }}" />
                <x-jet-input wire:model="address" id="address" class="block mt-1 w-full" type="text" name="address"
                    :value="old('address')" required autofocus />
                <x-jet-input-error for="address"></x-jet-input-error>
            </div>
            <div class="col-span-1">
                <x-jet-label for="origin_place" value="{{ __('auth.origin_place') }}" />
                <x-jet-input wire:model="origin_place" id="origin_place" class="block mt-1 w-full" type="text"
                    name="origin_place" :value="old('origin_place')" required autofocus />
                <x-jet-input-error for="origin_place"></x-jet-input-error>
            </div>
            <div class="col-span-1">
                <x-jet-label for="subject" value="{{ __('auth.subject') }}" />
                <x-jet-input wire:model="subject" id="subject" class="block mt-1 w-full" type="text" name="subject"
                    :value="old('subject')" required autofocus />
                <x-jet-input-error for="subject"></x-jet-input-error>
            </div>
        </div>
        @endif

        @if($currentStep == 3)
        <div class="flex flex-col items-center">
            <p class="text-xs text-gray-500 px-0 md:px-16 mb-6">ADJUNTAR EL DOCUMENTO ESCANEADO PARA QUE INICIE EL
                TRAMITE DEL PROCEDIMIENTO ADMINISTRATIVO. SOLO SE ACEPTA ARCHIVOS PDF, QUE NO EXCEDA 20 MB, ADEMAS EL
                NOMBRE DEL ARCHIVO NO DEBE CONTENER CARACTERES ESPECIALES O TILDES. EJEMPLO (oficio_001_2021.pdf)</p>
            @error('file')
            <div class="text-red-500 font-medium mb-2">{{ $message }}</div>
            @enderror
            <input type="file" wire:model="file" name="file" id="file">
            <button type="button"
                class="flex items-center justify-center py-3 px-6 bg-red-500 text-white font-medium text-base rounded hover:bg-red-600">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"></path>
                </svg>
                <span class="ml-2">
                    Subir archivo
                </span>
            </button>
            <div class="mt-4 p-4 rounded bg-gray-100 flex items-center">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z">
                    </path>
                </svg>
                <span class="mx-4">oficio_001_2021.pdf</span>
                <svg class="w-6 h-6 cursor-pointer text-red-500 hover:text-red-600" fill="none" stroke="currentColor"
                    viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </div>
        </div>
        @endif

        <div class="mt-8 flex items-center justify-end space-x-3">

            @if($currentStep == 2 || $currentStep == 3)
            <x-form.btn size="large" wire:click="previousStep">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                </svg>
                <span class="ml-3">
                    Regresar
                </span>
            </x-form.btn>
            @endif

            @if($currentStep == 1 || $currentStep == 2)
            <x-form.btn color="primary" size="large" wire:click="nextStep">Siguiente</x-form.btn>
            @endif

            @if($currentStep == 3)
            <x-form.btn type="submit" color="primary" size="large">Registar</x-form.btn>
            @endif
        </div>
    </form>
</div>