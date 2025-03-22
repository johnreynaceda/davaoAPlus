<div x-data>
    <div class="flex justify-between items-end">
        <div class="w-64">
            {{ $this->form }}
        </div>
        <x-button sm label="Print" right-icon="printer" class="font-medium" slate rounded="lg"
            @click="printOut($refs.printContainer.outerHTML);" />
    </div>
    <div class="mt-5 p-5 border rounded-xl">
        @if ($selected_report == 'Members')
            <div x-ref="printContainer">
                <div class="flex justify-between items-end">
                    <h1 class="uppercase text-gray-600 font-bold"> All Members</h1>
                </div>
                <div class="mt-5">
                    <div class="flex flex-col">
                        <div class=" overflow-x-auto">
                            <div class="min-w-full inline-block align-middle">
                                <div class="overflow-hidden border rounded-lg border-gray-300">
                                    <table class=" min-w-full  rounded-xl">
                                        <thead>
                                            <tr class="bg-gray-50">
                                                <th scope="col"
                                                    class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                                    MEMBER NAME </th>
                                                <th scope="col"
                                                    class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                                    EMAIL </th>

                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-300 ">
                                            @forelse ($reports as $item)
                                                <tr>
                                                    <td
                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                                        {{ $item->name }}</td>
                                                    <td
                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                        {{ $item->email }} </td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        @if ($selected_report == 'Payments')
            <div x-ref="printContainer">
                <div class="flex justify-between items-end">
                    <h1 class="uppercase text-gray-600 font-bold"> All Payments</h1>
                </div>
                <div class="mt-5">
                    <div class="flex flex-col">
                        <div class=" overflow-x-auto">
                            <div class="min-w-full inline-block align-middle">
                                <div class="overflow-hidden border rounded-lg border-gray-300">
                                    <table class=" min-w-full  rounded-xl">
                                        <thead>
                                            <tr class="bg-gray-50">
                                                <th scope="col"
                                                    class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                                    MEMBER NAME</th>
                                                <th scope="col"
                                                    class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                                    MONTHLY PAYMENT</th>
                                                <th scope="col"
                                                    class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                                    MONTHLY INTEREST</th>
                                                <th scope="col"
                                                    class="p-5 text-left text-sm leading-6 font-semibold text-gray-900 capitalize">
                                                    DUE DATE</th>

                                            </tr>
                                        </thead>
                                        <tbody class="divide-y divide-gray-300 ">
                                            @forelse ($reports as $item)
                                                <tr>
                                                    <td
                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900 ">
                                                        {{ $item->loan->user->name }}</td>
                                                    <td
                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                        &#8369;{{ number_format($item->monthly_payment, 2) }} </td>
                                                    <td
                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                        &#8369;{{ number_format($item->interest, 2) }} </td>
                                                    <td
                                                        class="p-5 whitespace-nowrap text-sm leading-6 font-medium text-gray-900">
                                                        {{ \Carbon\Carbon::parse($item->due_date)->format('F d, Y') }}
                                                    </td>
                                                </tr>
                                            @empty
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>
