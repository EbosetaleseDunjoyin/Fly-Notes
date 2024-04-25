<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        <div class="relative min-h-screen bg-gray-100 bg-center sm:flex sm:justify-center sm:items-center bg-dots-darker dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <livewire:welcome.navigation />
            @endif

            <div class="p-6 mx-auto max-w-7xl lg:p-8">
                <div class="flex flex-col items-center justify-center gap-12">
                    <a href="{{ route('home') }}" wire:navigate>
                        <x-application-logo class="block w-auto h-20 text-gray-800 fill-current dark:text-gray-200" />
                    </a>
                    <x-button href="{{ route('home') }}" primary>Get Started</x-button>
                </div>

                
            </div>
        </div>
    </body>
</html>
