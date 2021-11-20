<x-page-layout>
    <x-slot name="title">MPV - Inicio</x-slot>
    <x-slot name="description">Bienvenido a nuestra mesa de partes virtual de la DREA.</x-slot>
    <div class="bg-gray-100 h-screen flex flex-col relative z-10">
        <div class="relative">
            <x-page.navbar class="bg-transparent" />
            <x-page.header />
        </div>
        <div class="bg-blue-400 h-full w-1/2 absolute top-0 right-0 hidden md:block" style="z-index: -1;"></div>
    </div>
</x-page-layout>