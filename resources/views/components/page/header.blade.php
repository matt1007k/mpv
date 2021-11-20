<div class="wrapper flex flex-col md:flex-row items-center justify-start md:justify-center h-full">
    <div class="flex flex-col justify-center w-full sm:w-9/12 md:w-1/2 mt-10 md:mt-0">
        <div class="flex items-center justify-center md:justify-start">
            <h5 class="uppercase text-blue-500 font-semibold text-sm">Bienvenido a nuestra</h5>
            <p class="text-2xl ml-1">👋</p>
        </div>
        <h2 class="text-black w-full md:w-7/12 text-center md:text-left text-3xl md:text-5xl px-14 md:px-0 font-bold">
            Mesa de Partes
            Virtual
        </h2>
        <p class="text-lg font-medium text-gray-500 mt-4 w-full md:w-9/12 text-center md:text-left">No olvides sí
            deseas crear una cuenta, tu
            correo
            electrónico,
            te
            ayudará a ver los documentos que registraste sin tener una cuenta.</p>
        <div class="mt-5 md:mt-10 flex flex-col sm:flex-col md:flex-row items-center gap-4 w-full">
            <a href="{{ route('login') }}"
                class="py-2 px-3 md:py-3 md:px-5 w-full md:w-auto text-center font-semibold rounded-md bg-blue-500 hover:bg-blue-600 text-white border-2 border-blue-500 hover:border-blue-600 transition-all duration-100 ease-linear">Registar
                documento</a>
            <a href="{{ route('register') }}"
                class="py-2 px-3 md:py-3 md:px-5 w-full md:w-auto text-center bg-transparent border-2 border-blue-500 font-semibold text-black rounded-md hover:bg-blue-500 hover:text-white transition-all duration-100 ease-linear">Ingresar
                y
                registrar documento</a>
        </div>
    </div>

    <div class="w-full md:w-1/2 flex justify-center mt-8 md:mt-0 bg-blue-500 md:bg-transparent rounded-lg p-4">
        <img src="{{ asset('img/home-1.png') }}" alt="Home 1" class="w-full">
    </div>
</div>