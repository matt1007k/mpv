<div class="wrapper py-6 flex justify-between items-center">
    <x-logo class="w-6 md:w-12" />
    <div class="flex items-center space-x-2 ml-auto">
        @auth
        <a href="{{ route('dashboard')}}"
            class="@if(request()->routeIs('dashboard'))text-white @else text-blue-50 @endif font-semibold text-base hover:text-white">Ir
            a Documentos</a>
        @else
        <a href="{{ route('login') }}"
            class="py-2 px-3 md:py-3 md:px-5 font-semibold rounded-md bg-blue-500 hover:bg-blue-600 text-white border-2 border-blue-500 hover:border-blue-600 transition-all duration-100 ease-linear">Ingresar</a>
        <a href="{{ route('register') }}"
            class="py-2 px-3 md:py-3 md:px-5  bg-transparent border-2 border-blue-500 md:border-white font-semibold text-black md:text-white rounded-md hover:bg-white hover:text-black transition-all duration-100 ease-linear">Registrarse</a>
        @endauth
    </div>
</div>