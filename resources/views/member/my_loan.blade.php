<x-app-layout>
    <div>
        <h1 class="text-3xl text-gray-700">My Loan</h1>
        <div class="mt-5">
            <livewire:member.my-loan />
        </div>
    </div>
    <x-slot name="sidebar">
        <div>
            <livewire:member-sidebar />
        </div>
    </x-slot>
</x-app-layout>
