<div class="wrapper flex items-center justify-between">
    <div class="flex items-center space-x-8">
        <a href="{{ route('dashboard')}}">
            <x-logo width="45" />
        </a>
        {{-- Navlink desktop --}}
        <div class="hidden md:flex items-center space-x-8">
            <a href="{{ route('dashboard')}}"
                class="@if(request()->routeIs('dashboard'))text-white @else text-indigo-300 @endif font-semibold text-base">Documentos</a>
        </div>
    </div>
    <div class="flex items-center space-x-8">
        {{-- Desktop --}}
        <a href="{{ route('documents.create') }}"
            class="hidden md:flex py-3 px-4 bg-black text-white font-semibold rounded-lg">
            Nuevo documento
        </a>
        <div class="hidden md:flex">
            <x-jet-dropdown align="right" width="60">
                <x-slot name="trigger">
                    <div
                        class="w-12 p-3 hidden md:flex items-center justify-center bg-white rounded-full cursor-pointer">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0zm-4 7a7 7 0 0 0-7 7h14a7 7 0 0 0-7-7z" />
                        </svg>
                    </div>
                </x-slot>

                <x-slot name="content">
                    <div class="w-60">
                        <!-- Account Management -->
                        <div class="block px-4 py-2 text-xs text-gray-400">
                            {{ __('Administrar Cuenta') }}
                        </div>

                        <x-jet-dropdown-link href="{{ route('profile.show') }}">
                            {{ __('Perfil') }}
                        </x-jet-dropdown-link>

                        @if (Laravel\Jetstream\Jetstream::hasApiFeatures())
                        <x-jet-dropdown-link href="{{ route('api-tokens.index') }}">
                            {{ __('API Tokens') }}
                        </x-jet-dropdown-link>
                        @endif

                        <div class="border-t border-gray-100"></div>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                {{ __('Salir') }}
                            </x-jet-dropdown-link>
                        </form>

                    </div>
                </x-slot>
            </x-jet-dropdown>
        </div>
    </div>
</div>