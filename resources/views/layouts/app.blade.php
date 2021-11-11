<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'MPV - Inicio'}}</title>
    <meta name="description" content="{{ $description ?? 'Mesa de partes virtual - DREA'}}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    @livewireStyles

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased relative">
    <x-jet-banner />
    <x-admin.nav-bottom />

    <div class="min-h-screen bg-white">
        <header class="bg-gradient-to-t from-blue-500 to-indigo-600 py-8">

            <x-admin.navbar />

            <!-- Page Heading -->
            @if (isset($header))
            <div class="mt-10 wrapper">
                {{ $header }}
            </div>
            @endif
        </header>

        <!-- Page Content -->
        <main class="mb-28 md:mb-0 h-full">
            <div style="background: url({{asset('img/Cube-2.png')}}); background-repeat: no-repeat; background-size: cover;"
                class="h-full w-full">
                <div class="bg-white bg-opacity-80 backdrop-filter backdrop-blur-3xl h-full w-full">
                    {{ $slot }}
                </div>
            </div>
        </main>
    </div>

    @stack('modals')

    @livewireScripts
    @stack('js')
</body>

</html>