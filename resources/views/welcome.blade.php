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
    <div class="bg-white">
        <header class="absolute inset-x-0 top-0 z-50">
            <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
                <div class="flex lg:flex-1">
                    <a href="#" class="-m-1.5 p-1.5">

                    </a>
                </div>
                <div class="flex lg:hidden">
                    <button type="button"
                        class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                        <span class="sr-only">Open main menu</span>
                        <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                            aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
                {{-- <div class="hidden lg:flex lg:gap-x-12">
                    <a href="#" class="text-sm/6 font-semibold text-gray-900">Product</a>
                    <a href="#" class="text-sm/6 font-semibold text-gray-900">Features</a>
                    <a href="#" class="text-sm/6 font-semibold text-gray-900">Marketplace</a>
                    <a href="#" class="text-sm/6 font-semibold text-gray-900">Company</a>
                </div> --}}
                <div class="hidden lg:flex lg:flex-1 lg:justify-end">

                </div>
            </nav>
            <!-- Mobile menu, show/hide based on menu open state. -->
            {{-- <div class="lg:hidden" role="dialog" aria-modal="true">
                <!-- Background backdrop, show/hide based on slide-over state. -->
                <div class="fixed inset-0 z-50"></div>
                <div
                    class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
                    <div class="flex items-center justify-between">
                        <a href="#" class="-m-1.5 p-1.5">
                            <span class="sr-only">Your Company</span>
                            <img class="h-8 w-auto"
                                src="https://tailwindui.com/plus/img/logos/mark.svg?color=indigo&shade=600"
                                alt="">
                        </a>
                        <button type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                            <span class="sr-only">Close menu</span>
                            <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                    <div class="mt-6 flow-root">
                        <div class="-my-6 divide-y divide-gray-500/10">
                            <div class="space-y-2 py-6">
                                <a href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Product</a>
                                <a href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Features</a>
                                <a href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Marketplace</a>
                                <a href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Company</a>
                            </div>
                            <div class="py-6">
                                <a href="#"
                                    class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Log
                                    in</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
        </header>

        <div class="relative isolate px-6 pt-14 lg:px-8">
            <div class="absolute inset-x-0 -top-40 -z-10 transform-gpu overflow-hidden blur-3xl sm:-top-80"
                aria-hidden="true">
                <div class="relative left-[calc(50%-11rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 rotate-[30deg] bg-gradient-to-tr from-blue-600 to-blue-600 opacity-30 sm:left-[calc(50%-30rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
            <div class="mx-auto max-w-2xl py-32 sm:py-48 lg:py-36">
                <div class="hidden sm:mb-8 sm:flex sm:justify-center">
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
                <div class="text-center">
                    <h1 class="text-4xl font-black tracking-tight text-gray-600 sm:text-6xl">LOAN
                        MANAGEMENT SYSTEM</h1>
                    <p class="mt-8 text-pretty text-sm 2xl:text-lg font-medium text-gray-500">An <span
                            class="text-blue-600">loan Management System</span> is a software solution designed to
                        streamline and optimize the
                        process of
                        managing credit accounts for businesses or financial institutions. </p>
                    <div class="mt-10 flex items-center justify-center gap-x-6">
                        <a href="{{ route('login') }}"
                            class=" bg-blue-600 hover:bg-blue-800 px-8 py-3 flex space-x-2 rounded-full text-white">
                            <span>Get Started</span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-arrow-right-to-line">
                                <path d="M17 12H3" />
                                <path d="m11 18 6-6-6-6" />
                                <path d="M21 5v14" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="absolute inset-x-0 top-[calc(100%-13rem)] -z-10 transform-gpu overflow-hidden blur-3xl sm:top-[calc(100%-30rem)]"
                aria-hidden="true">
                <div class="relative left-[calc(50%+3rem)] aspect-[1155/678] w-[36.125rem] -translate-x-1/2 bg-gradient-to-tr from-blue-600 to-gray-400 opacity-30 sm:left-[calc(50%+36rem)] sm:w-[72.1875rem]"
                    style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)">
                </div>
            </div>
        </div>
    </div>

</body>

</html>
