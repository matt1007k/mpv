<x-app-layout>
    <x-slot name="title">MPV - Detalle del documento</x-slot>
    <x-slot name="description">Ver los detalles del documento.</x-slot>
    <x-slot name="header">
        <div class="wrapper">

            <div class="flex items-center justify-between">
                <div class="flex items-center text-white">
                    <a href="{{ route('dashboard')}}" class="mr-2">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                    </a>
                    <h2 class="font-semibold text-2xl text-white leading-tight">
                        {{ __('Detalle') }}
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
                            {{ $document->full_name }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            {{ strtoupper($document->doc_type) }}
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                            {{ $document->doc_number }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            Celular
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                            {{ $document->cell_phone }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            Correo electrónico
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                            {{ $document->email }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            Dirección
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                            {{ $document->address }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            Lugar de origen
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                            {{ $document->origin_place }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            Asunto
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                            {{ $document->subject }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            Fecha de registro
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                            {{ $document->created_at->format('d-m-Y h:m:s') }}
                        </dd>
                    </div>
                    <div class="sm:col-span-1">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            Estado
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                            <x-documents.status :status="$document->status" />
                        </dd>
                    </div>

                    @if($document->file)
                    <div class="sm:col-span-2">
                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                            Archivo adjunto
                        </dt>
                        <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                            <ul role="list" class="
                          border border-gray-200
                          dark:border-gray-custom dark:border-opacity-50
                          rounded-md
                          divide-y divide-gray-200
                          dark:divide-gray-custom dark:divide-opacity-50
                        ">
                                <li class="
                            pl-3
                            pr-4
                            py-3
                            flex
                            items-center
                            justify-between
                            text-sm
                          ">
                                    <div class="w-0 flex-1 flex items-center">
                                        <svg class="flex-shrink-0 h-5 w-5 text-gray-400"
                                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor"
                                            aria-hidden="true">
                                            <path fill-rule="evenodd"
                                                d="M8 4a3 3 0 00-3 3v4a5 5 0 0010 0V7a1 1 0 112 0v4a7 7 0 11-14 0V7a5 5 0 0110 0v4a3 3 0 11-6 0V7a1 1 0 012 0v4a1 1 0 102 0V7a3 3 0 00-3-3z"
                                                clip-rule="evenodd" />
                                        </svg>
                                        <span class="ml-2 flex-1 w-0 truncate">
                                            {{ $document->fileName() }}
                                        </span>
                                    </div>
                                    <div class="ml-4 flex-shrink-0">
                                        <a href="{{ $document->filePath() }}" class="
                                font-medium
                                text-blue-600
                                hover:text-blue-500
                                dark:text-white dark:hover:text-gray-100
                                hover:underline
                              " target="_blank">
                                            Descargar
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </dd>
                    </div>
                    @else
                    <div class="sm:col-span-2">
                        <p class="text-gray-500 dark:text-gray-400">
                            No hay ningún archivo adjunto.
                        </p>
                    </div>
                    @endif
                </dl>
            </div>
        </div>
        @if(auth()->user()->isAdmin() || auth()->user()->isPersonal() && !$document->hasResponse())
        <livewire:responses.answer-document-form :document="$document" />
        @endif
        @if($document->hasResponse())
        <div class="
        bg-white
        dark:bg-gray-secondary
        dark:border-gray-secondary
        dark:border-opacity-50
        shadow
        overflow-hidden
        sm:rounded-lg mt-5 p-6">
            <div class="flex item-center justify-between">
                <h5>Asunto: {{ $document->subject }}</h5>
                {{-- <a href="" class="text-blue-500 hover:underline font-semibold">Editar</a> --}}
            </div>
            @if($document->response->type === 'success')
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2 mt-4">
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Registro de documento
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                        {{ $document->response->document_number }}
                    </dd>
                </div>
                <div class="sm:col-span-1">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Registro de expediente
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                        {{ $document->response->file_number }}
                    </dd>
                </div>
            </dl>
            @else
            <dl class="grid grid-cols-1 gap-x-4 gap-y-8 sm:grid-cols-2 mt-4">
                <div class="sm:col-span-2">
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">
                        Observación
                    </dt>
                    <dd class="mt-1 text-sm text-gray-900 dark:text-white">
                        {{ $document->response->observation }}
                    </dd>
                </div>
            </dl>
            @endif
        </div>
        @else
        <div class="text-gray-500 text-lg mt-5 p-6 text-center">No hay ninguna respuesta para este documento.</div>
        @endif
    </div>
</x-app-layout>