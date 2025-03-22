<div>
    <div class="border rounded-3xl ">
        <div class="py-3 px-5 border-b">
            <h1 class="text-xl text-gray-700">Add Payment</h1>
        </div>
        <div class="px-5 py-5 border-b">
            {{$this->form}}
        </div>
        <div class="p-5">
            @if ($payment)
                <div>
                    <h1 class="text-sm">TOTAL REMAINING: <strong
                            class="text-lg text-main">&#8369;{{number_format($total_remaining, 2)}}</strong></h1>
                </div>
                <div class="mt-5">
                    <h1 class="text-sm">DUE DATE:
                        <strong
                            class="text-lg text-gray-600">{{\Carbon\Carbon::parse($payment->due_date)->format('F d,Y')}}</strong>
                    </h1>
                    <h1 class="text-sm">AMOUNT:
                        <strong
                            class="text-lg text-gray-600">&#8369;{{number_format($payment->monthly_payment + $payment->interest, 2)}}</strong>
                    </h1>
                </div>
                <div class="mt-5">
                    <x-button label="Done Payment" squared slate class="font-medium" wire:click="donePayment"
                        spinner="donePayment" right-icon="banknotes" />
                </div>
            @else
                <div class="flex justify-center items-center">
                    <x-shared.payment class="h-40" />
                </div>
            @endif
        </div>
    </div>
</div>