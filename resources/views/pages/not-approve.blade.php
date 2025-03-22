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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <section class="h-auto bg-white">
        <div class="max-w-7xl mx-auto py-16 px-10 sm:py-24 sm:px-6 lg:px-8 sm:text-center">
            <h2 class="text-base font-semibold text-indigo-600 tracking-wide uppercase"></h2>
            <div class="flex mt-10 justify-center items-end space-x-3">
                <div class="flex items-end space-x-2">
                    <div class="flex items-end">
                        <svg class="w-12 h-12 text-blue-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                            fill="currentColor" aria-hidden="true">
                            <path
                                d="M5 15c-.94 0-1.81.33-2.5.88A3.97 3.97 0 001 19c0 .75.21 1.46.58 2.06A3.97 3.97 0 005 23c1.01 0 1.93-.37 2.63-1 .31-.26.58-.58.79-.94.37-.6.58-1.31.58-2.06 0-2.21-1.79-4-4-4zm2.07 3.57l-2.13 1.97c-.14.13-.33.2-.51.2-.19 0-.38-.07-.53-.22l-.99-.99a.754.754 0 010-1.06c.29-.29.77-.29 1.06 0l.48.48 1.6-1.48c.3-.28.78-.26 1.06.04s.26.78-.04 1.06z">
                            </path>
                            <path
                                d="M19.48 12.95h2.02v-1.44c0-2.07-1.69-3.76-3.76-3.76H6.26c-2.07 0-3.76 1.69-3.76 3.76v4.37A3.999 3.999 0 019 19c0 .75-.21 1.46-.58 2.06-.21.36-.48.68-.79.94h10.11c2.07 0 3.76-1.69 3.76-3.76v-1.19h-1.9c-1.08 0-2.07-.79-2.16-1.87-.06-.63.18-1.22.6-1.63.37-.38.88-.6 1.44-.6z"
                                opacity=".4"></path>
                            <path
                                d="M14.85 3.95v3.8H6.26c-2.07 0-3.76 1.69-3.76 3.76V7.84c0-1.19.73-2.25 1.84-2.67l7.94-3c1.24-.46 2.57.45 2.57 1.78zM22.56 13.97v2.06c0 .55-.44 1-1 1.02H19.6c-1.08 0-2.07-.79-2.16-1.87-.06-.63.18-1.22.6-1.63.37-.38.88-.6 1.44-.6h2.08c.56.02 1 .47 1 1.02zM14 12.75H7c-.41 0-.75-.34-.75-.75s.34-.75.75-.75h7c.41 0 .75.34.75.75s-.34.75-.75.75z">
                            </path>
                        </svg>
                        <h1 class="font-black text-gray-700 text-2xl uppercase">Davao</h1>
                    </div>
                    <h1 class="font-black text-2xl text-blue-600">A+</h1>
                </div>
            </div>
            <p class="mt-20 text-4xl font-extrabold text-blue-600 sm:text-5xl sm:tracking-tight lg:text-6xl">LOAN
                MANAGEMENT SYSTEM</p>
            <p class="max-w-3xl mt-5 mx-auto text-xl text-gray-300">Please hold on while the administrator reviews and
                approves your account.
            </p>
            <div class="mt-5">
                @if (auth()->user()->is_approve == true)
                    <x-button href="{{ route('dashboard') }}" label="Home" blue rounded lg class="font-semibold"
                        right-icon="arrow-uturn-right" />
                @else
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-button href="route('logout')"
                            onclick="event.preventDefault();
                                this.closest('form').submit();"
                            label="Logout" blue rounded lg class="font-semibold" right-icon="arrow-uturn-right" />
                    </form>
                @endif
            </div>
        </div>
    </section>



</body>

</html>
