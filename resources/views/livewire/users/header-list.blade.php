<div class="bg-blue-500 pt-0 pb-8">

    <div class="wrapper">

        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-2xl text-white leading-tight">
                    {{ __('Usuarios') }}
                </h2>
                <p class="text-indigo-200 font-medium">{{ $total }} registros</p>
            </div>

            @can('create', '\App\Models\User')
            <div>
                <a href="{{ route('admin.users.create') }}"
                    class="flex py-3 px-4 bg-white text-black hover:bg-gray-100 font-semibold rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    <span class="ml-2 hidden md:flex">
                        Nuevo usuario
                    </span>
                </a>
            </div>
            @endcan
        </div>

        <div class="w-full md:w-3/5 mx-auto mt-8">
            <div class="flex justify-center space-x-2">
                <div class="relative w-full md:w-3/5">
                    <input type="search" name="search" id="search" placeholder="Qué estas buscando?"
                        class="py-3 pl-12 pr-3 text-base rounded-xl border-none focus:outline-none w-full placeholder-gray-500"
                        wire:model="search">

                    <svg class="w-6 h-6 text-gray-500 absolute top-3 left-4" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m21 21-6-6m2-5a7 7 0 1 1-14 0 7 7 0 0 1 14 0z" />
                    </svg>
                </div>

            </div>

        </div>
    </div>

</div>