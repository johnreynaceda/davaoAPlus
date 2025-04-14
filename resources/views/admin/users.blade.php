<x-app-layout>
    <div>
        <h1 class="text-3xl text-gray-700">Managers</h1>
        <div class="mt-10">
            <livewire:admin.manager-list />
        </div>
    </div>
    <x-slot name="sidebar">
        <div>
            <livewire:admin-sidebar />
        </div>
    </x-slot>
</x-app-layout>
