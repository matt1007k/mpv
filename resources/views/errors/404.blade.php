<x-guest-layout>
    <div class="bg-white min-h-full px-4 py-16 sm:px-6 sm:py-24 md:grid md:place-items-center lg:px-8 h-screen">
        <div class="max-w-max mx-auto">
            <main class="sm:flex">
                <p class="text-4xl font-extrabold text-blue-600 sm:text-5xl">404</p>
                <div class="sm:ml-6">
                    <div class="sm:border-l sm:border-gray-200 sm:pl-6">
                        <h1 class="text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">Página no
                            encontrado</h1>
                        <p class="mt-1 text-base text-gray-500">Verifique la URL en la barra de direcciones y vuelva a
                            intentarlo.
                        </p>
                    </div>
                    <div class="mt-10 flex space-x-3 sm:border-l sm:border-transparent sm:pl-6">
                        <a href="{{ route('index') }}"
                            class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-500 hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                            Regresar al inicio
                        </a>

                    </div>
                </div>
            </main>
        </div>
    </div>
</x-guest-layout>