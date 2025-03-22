<x-app-layout>
    <div>
        <h1 class="text-3xl text-gray-700">Reports</h1>
        <div class="mt-10">
            <livewire:admin.report />
            <script>
                function printOut(data) {
                    var mywindow = window.open('', '', 'height=1000,width=1000');
                    mywindow.document.head.innerHTML =
                        '<title></title><link rel="stylesheet" href="{{ Vite::asset('resources/css/app.css') }}" />';
                    mywindow.document.body.innerHTML = '<div>' + data +
                        '</div><script src="{{ Vite::asset('resources/js/app.js') }}"/>';

                    mywindow.document.close();
                    mywindow.focus(); // necessary for IE >= 10
                    setTimeout(() => {
                        mywindow.print();
                        return true;
                    }, 1000);
                }
            </script>
        </div>
    </div>
    <x-slot name="sidebar">
        <div>
            <livewire:admin-sidebar />
        </div>
    </x-slot>
</x-app-layout>
