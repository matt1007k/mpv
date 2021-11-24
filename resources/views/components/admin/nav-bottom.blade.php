<div class="block md:hidden fixed z-10 bottom-0 right-0 left-0 bg-white px-6 py-3">
    <div class="flex items-center justify-between w-full">

        <a href="{{ route('dashboard') }}"
            class="flex items-center justify-center  rounded-full cursor-pointer space-x-2 @if(Request::routeIs('dashboard')) py-3 px-4 bg-indigo-100 text-indigo-500 @else p-3 bg-gray-100 text-gray-400 @endif">
            @if (Request::routeIs('dashboard'))
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M10.707 2.293a1 1 0 0 0-1.414 0l-7 7a1 1 0 0 0 1.414 1.414L4 10.414V17a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-2a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v2a1 1 0 0 0 1 1h2a1 1 0 0 0 1-1v-6.586l.293.293a1 1 0 0 0 1.414-1.414l-7-7z" />
            </svg>
            <span class="font-medium text-xs">Docum...</span>
            @else
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m3 12 2-2m0 0 7-7 7 7M5 10v10a1 1 0 0 0 1 1h3m10-11 2 2m-2-2v10a1 1 0 0 1-1 1h-3m-6 0a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1m-6 0h6" />
            </svg>
            @endif
        </a>

        <a href="{{ route('documents.create')}}"
            class="p-3 flex items-center justify-center bg-black rounded-2xl cursor-pointer space-x-2 text-white">
            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd"
                    d="M10 5a1 1 0 0 1 1 1v3h3a1 1 0 1 1 0 2h-3v3a1 1 0 1 1-2 0v-3H6a1 1 0 1 1 0-2h3V6a1 1 0 0 1 1-1z"
                    clip-rule="evenodd" />
            </svg>
        </a>

        <div class="relative" x-data="{ open: false }">

            <button @click="open = true"
                class="flex items-center justify-center rounded-full cursor-pointer space-x-2 @if(Request::routeIs('documents.create')) py-3 px-4  bg-indigo-100 text-indigo-500 @else p-3 bg-gray-100 text-gray-400 @endif">
                @if (Request::routeIs('documents.create'))
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0zm-4 7a7 7 0 0 0-7 7h14a7 7 0 0 0-7-7z" />
                </svg>
                @else
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0zm-4 7a7 7 0 0 0-7 7h14a7 7 0 0 0-7-7z" />
                </svg>
                @endif
            </button>
            <div x-show="open" x-transition:enter="ease-out duration-300" x-transition:enter-start="opacity-0"
                x-transition:enter-end="opacity-100" x-transition:leave="ease-in duration-200"
                x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                class="fixed inset-0 flex items-end justify-center bg-black/5">
                <div class="bg-white shadow-md rounded-2xl p-6 w-11/12" @click.away="open = false">
                    <div class="flex flex-col items-center justify-between p-20 h-full">
                        <div class="flex flex-col items-center">
                            <div class="
                              flex
                              items-center
                              justify-center
                              p-4
                              rounded-full
                              bg-gray-100
                              text-gray-500
                              dark:text-gray-custom
                              w-20
                              h-20
                            ">
                                <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M16 7a4 4 0 1 1-8 0 4 4 0 0 1 8 0zm-4 7a7 7 0 0 0-7 7h14a7 7 0 0 0-7-7z" />
                                </svg>
                            </div>
                            <div class="mt-3 text-center">
                                <h5 class="font-bold text-black dark:text-white">{{ Auth::user()->name }}</h5>
                                <p class="text-gray-500 dark:text-gray-400">{{ Auth::user()->email }}</p>
                            </div>
                            <div class="mt-12 flex flex-col items-center space-y-6">
                                <a href="{{ route('profile.show') }}"
                                    class="text-xl font-semibold text-black dark:text-white">
                                    Perfil</a>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <a href="{{ route('logout')}}" onclick="event.preventDefault();
                                    this.closest('form').submit();" class="
                                        text-xl
                                        font-semibold
                                        text-black
                                        dark:text-white
                                        cursor-pointer
                                      ">
                                        Salir
                                    </a>
                                </form>

                            </div>
                        </div>

                        <div class="flex flex-col items-center w-full">
                            <button @click="open = false" class="
                              p-3
                              bg-gray-100
                              text-gray-500
                              dark:bg-gray-secondary dark:text-gray-300
                              rounded-full
                              mt-8
                            ">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>