<div class="bg-white rounded-lg shadow-lg p-4">
    <div class="mb-6">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Editar documento
        </h3>
        <p class="mt-1 max-w-2xl text-sm text-gray-500">
            Completa los campos requeridos para editar el usuario. <span class="text-red-500">(*)</span>
        </p>
    </div>



    <form wire:submit.prevent="register">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-5">
            <div class="col-span-1">
                <x-jet-label for="name" value="{{ __('auth.full_name') }}*" />
                <x-jet-input wire:model="name" id="name" class="block mt-1 w-full " type="text" name="name"
                    :value="old('name')" required autofocus />
                <x-jet-input-error for="name"></x-jet-input-error>
            </div>
            <div class="col-span-1">
                <x-jet-label for="email" value="{{ __('auth.email') }}*" />
                <x-jet-input wire:model="email" id="email" class="block mt-1 w-full" type="email" name="email"
                    :value="old('email')" required autofocus />
                <x-jet-input-error for="email"></x-jet-input-error>
            </div>

            <div class="col-span-1">
                <label for="doc_type">{{ __('auth.doc_person')}}*</label>
                <x-form.select id="doc_type" class="block mt-1 w-full" wire:model="doc_type" name="doc_type">
                    <option value="">Seleccionar tipo</option>
                    <option value="dni" {{ old('doc_type')==='dni' ? 'selected' : '' }}>Natural</option>
                    <option value="ruc" {{ old('doc_type')==='ruc' ? 'selected' : '' }}>Juridica</option>
                </x-form.select>
                <x-jet-input-error for="doc_type"></x-jet-input-error>
            </div>

            <div class="col-span-1">
                <x-jet-label for="doc_number" value="{{ __('auth.doc_number') }}*" />
                <x-jet-input wire:model="doc_number" id="doc_number" class="block mt-1 w-full" type="text"
                    name="doc_number" :value="old('doc_number')" required autofocus />
                <x-jet-input-error for="doc_number"></x-jet-input-error>
            </div>
            <div class="col-span-1">
                <label for="role">{{ __('Rol')}}*</label>
                <x-form.select id="role" class="block mt-1 w-full" wire:model="role" name="role">
                    <option value="">Seleccionar rol</option>
                    <option value="admin">Administrador</option>
                    <option value="user">Usuario normal</option>
                </x-form.select>
                <x-jet-input-error for="role"></x-jet-input-error>
            </div>
            <div class="col-span-1">
                <x-jet-label for="password" value="{{ __('auth.password') }}" />
                <x-jet-input wire:model="password" id="password" class="block mt-1 w-full" type="password"
                    name="password" :value="old('password')" autofocus />
                <x-jet-input-error for="password"></x-jet-input-error>
            </div>
        </div>

        <div class="mt-8 flex items-center justify-end space-x-3">
            <x-form.btn size="large" wire:click="cancel">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                </svg>
                <span class="ml-3">
                    Cancelar
                </span>
            </x-form.btn>

            <x-form.btn type="submit" color="primary" size="large">Registar</x-form.btn>
        </div>
    </form>
</div>