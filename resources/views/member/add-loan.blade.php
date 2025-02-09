<x-app-layout>
    <div>
        <h1 class="text-3xl text-gray-700">Create Loan</h1>
        <div class="mt-5"> <livewire:member.add-loan />
        </div>
    </div>
    <x-slot name="sidebar">
        <div>
            <livewire:member-sidebar />
        </div>
    </x-slot>
</x-app-layout>
