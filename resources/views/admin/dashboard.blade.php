<x-app-layout>
    <div class="">
        <h1 class="text-3xl text-gray-700">Hi, {{ auth()->user()->name }}! Welcome Back.</h1>
        <div class="mt-10 grid grid-cols-3 gap-5">
            <div
                class="bg-gray-100 hover:bg-blue-600/80 group hover:text-white cursor-pointer hover:scale-95 px-5 py-2 rounded-2xl text-gray-700">
                <div class="flex space-x-2 items-center">
                    <div class="h-10 w-10 bg-gray-200 group-hover:text-gray-700 rounded-full grid place-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-users">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                    </div>
                    <h1 class="">Total Members</h1>
                </div>
                <div class="mt-2 px-2 text-center ">
                    <p class="text-2xl font-semibold">
                        {{ \App\Models\User::where('user_type', 'member')->where('is_approve', true)->count() }}
                    </p>
                </div>
            </div>
            <div
                class="bg-gray-100 hover:bg-blue-600/80 group hover:text-white cursor-pointer hover:scale-95 px-5 py-2 rounded-2xl text-gray-700">
                <div class="flex space-x-2 items-center">
                    <div class="h-10 w-10 bg-gray-200 group-hover:text-gray-700 rounded-full grid place-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-users">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                    </div>
                    <h1 class="">Today's Credit</h1>
                </div>
                <div class="mt-2 px-2 text-center ">
                    <p class="text-2xl font-semibold">&#8369;{{ number_format(124548, 2) }}</p>
                </div>
            </div>
            <div
                class="bg-gray-100 hover:bg-blue-600/80 group hover:text-white cursor-pointer hover:scale-95 px-5 py-2 rounded-2xl text-gray-700">
                <div class="flex space-x-2 items-center">
                    <div class="h-10 w-10 bg-gray-200 group-hover:text-gray-700 rounded-full grid place-content-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-users">
                            <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg>
                    </div>
                    <h1 class="">Today's Collection</h1>
                </div>
                <div class="mt-2 px-2 text-center ">
                    <p class="text-2xl font-semibold">&#8369;{{ number_format(56312, 2) }}</p>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="sidebar">
        <div>
            <livewire:admin-sidebar />
        </div>
    </x-slot>
</x-app-layout>
