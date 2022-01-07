<x-app-layout>
    <x-slot name="title">MPV - Detalles del usuario</x-slot>
    <x-slot name="description">Ver los detalles del usuario.</x-slot>
    <x-slot name="header">
        <div class="wrapper">

            <div class="flex items-center justify-between">
                <div class="flex items-center text-white">
                    <a href="{{ route('admin.users.index')}}" class="mr-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </a>
                    <h2 class="font-semibold text-2xl text-white leading-tight">
                        {{ __('Detalles del usuario') }}
                    </h2>
                </div>
            </div>
        </div>
    </x-slot>
    <div class="wrapper mt-8 mb-10 px-0 md:px-40">
        <div class="
                bg-white
                dark:bg-gray-secondary
                dark:border-gray-secondary
                dark:border-opacity-50
                shadow
                overflow-hidden
                sm:rounded-lg
              ">
            <div class="
                  border-t border-gray-200
                  dark:border-gray-custom dark:border-opacity-50
                  px-6
                  py-5
                  mb-20
                  md:mb-0
                ">
                <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2">
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            Nombre completo
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                            {{ $user->name }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            {{ strtoupper($user->doc_type) }}
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                            {{ $user->doc_number }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            Correo electrónico
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                            {{ $user->email }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            Fecha de registro
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                            {{ $user->created_at->format('d-m-Y h:m:s') }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            Rol
                        </dt>
                        <dd class="mt-3 text-sm text-gray-900 dark:text-white">
                            <span class="p-2 rounded-md bg-blue-500 text-white">{{ $user->role }}</span>
                        </dd>
                    </div>

            </div>
        </div>
    </div>
</x-app-layout>