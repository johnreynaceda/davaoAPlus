<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    @filamentStyles
    @vite('resources/css/app.css')
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-white">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main class="max-w-7xl mx-auto py-10 px-4 sm:px-6 lg:px-8">
            {{-- {{ $slot }} --}}
            <div class="grid 2xl:grid-cols-6 grid-cols-1 gap-10">
                <div class="2xl:col-span-4 col-span-6">

                    {{ $slot }}
                </div>
                <div class="2xl:col-span-2 col-span-6">
                    {{ $sidebar ?? '' }}
                </div>
            </div>
        </main>
    </div>
    @filamentScripts
    @vite('resources/js/app.js')
</body>

</html>
