<div x-data="{
    slideOverOpen: @entangle('payment_modal')
}">
    <div class="border p-5 rounded-[2rem]">
        <div class="bg-gray-600 relative overflow-hidden rounded-2xl p-5">
            <div class="my-2  flex-col flex  space-y-2">
                <div class="flex space-x-3 items-center">
                    <div class="h-20 w-20 rounded-full border-2 bg-transparent p-1  overflow-hidden">
                        <img src="{{ asset('images/sample.png') }}" class="h-full bg-white rounded-full w-full"
                            alt="">
                    </div>
                    <div>
                        <h1 class="text-lg  text-white ">{{ auth()->user()->name }}</h1>
                        <p class="text-gray-300 text-xl ">&#8369;{{ number_format($total_loan, 2) }}</p>
                    </div>
                </div>
                <div>

                </div>

            </div>
            @if ($loan_id)
                <div class="mt-5 relative z-10">
                    <h1 class="text-gray-100 text-sm font-semibold">NEXT PAYMENT</h1>
                    <h1 class=" text-gray-400 mt-3  font-medium">
                        {{ \Carbon\Carbon::parse($monthly_payment->due_date)->format('F d, Y') }}
                    </h1>
                    <h1 class="text-3xl font-semibold text-white">
                        &#8369;{{ number_format($monthly_payment->monthly_payment + $monthly_payment->interest, 2) }}
                    </h1>
                    <p class="text-gray-300 text-xs">Your payment will be debited from your <span
                            class="font-bold text-white">MAIN ACCOUNT.</span></p>
                    @if ($monthly_payment->proof_of_payment != null)
                        <div class="mt-5">
                            <p class="text-red-300   text-xs animate-pulse">Please wait for your payment to approved by
                                administrator.
                            </p>
                        </div>
                    @else
                        <div class="mt-5 flex space-x-5 items-center relative">
                            <x-button label="PAY NOW" @click="slideOverOpen=true" spinner="payNow" squared positive
                                class="font-semibold w-full" />
                            {{-- <x-button label="DISMISS" flat squared white class="font-semibold w-full" /> --}}
                        </div>
                    @endif
                </div>
            @endif
            <div class="mt-10">
                <div class="flex justify-between items-end">
                    <h1 class=" text-sm text-white font-bold">TRANSACTION HISTORY</h1>
                </div>
                <ul class="mt-5 space-y-2 relative z-10">
                    @forelse ($payments as $item)
                        <li class="flex justify-between items-center">
                            <div class="flex space-x-3 items-center">
                                <div class="h-12 w-12  grid place-content-center text-center bg-gray-500">
                                    <h1 class="text-sm font-bold text-gray-400 uppercase">
                                        {{ \Carbon\Carbon::parse($item->updated_at)->format('M') }}
                                    </h1>
                                    <h1 class="text-xs font-bold leading-3 text-gray-300">
                                        {{ \Carbon\Carbon::parse($item->updated_at)->format('d') }}
                                    </h1>
                                </div>
                                <div class="text-white">
                                    <h1 class=" ">
                                        &#8369;{{ number_format($item->monthly_payment + $item->interest, 2) }}</h1>
                                    <h1 class="leading-3 text-sm text-gray-300 ">w/ 5% Interest</h1>
                                </div>
                            </div>
                        </li>
                    @empty
                        <li>
                            <h1 class="text-sm text-gray-300 ">No transaction history found.</h1>
                        </li>
                    @endforelse

                </ul>
            </div>
            <div class="absolute -bottom-16 left-0">
                <h1 class="font-black text-[8rem] text-white opacity-5 tracking-widest">LOAN</h1>
            </div>

        </div>

    </div>
    <div class="mt-5 border p-2 py-5 rounded-[2rem] grid place-content-center">
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

    <div class="relative z-50 w-auto h-auto">

        <template x-teleport="body">
            <div x-show="slideOverOpen" @keydown.window.escape="slideOverOpen=false" class="relative z-[99]">
                <div x-show="slideOverOpen" x-transition.opacity.duration.600ms @click="slideOverOpen = false"
                    class="fixed inset-0 bg-black bg-opacity-10"></div>
                <div class="fixed inset-0 overflow-hidden">
                    <div class="absolute inset-0 overflow-hidden">
                        <div class="fixed inset-y-0 right-0 flex max-w-full pl-10">
                            <div x-show="slideOverOpen" @click.away="slideOverOpen = false"
                                x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
                                x-transition:enter-start="translate-x-full" x-transition:enter-end="translate-x-0"
                                x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
                                x-transition:leave-start="translate-x-0" x-transition:leave-end="translate-x-full"
                                class="w-screen max-w-md">
                                <div
                                    class="flex flex-col h-full py-5 overflow-y-auto bg-white border-l shadow-lg border-neutral-100/70">
                                    <div class="px-4 sm:px-5">
                                        <div class="flex items-start justify-between pb-1">
                                            <h2 class="text-base font-semibold leading-6 text-gray-900"
                                                id="slide-over-title">PAYMENT</h2>
                                            <div class="flex items-center h-auto ml-3">
                                                <button @click="slideOverOpen=false"
                                                    class="absolute top-0 right-0 z-30 flex items-center justify-center px-3 py-2 mt-4 mr-5 space-x-1 text-xs font-medium uppercase border rounded-md border-neutral-200 text-neutral-600 hover:bg-neutral-100">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                        class="w-4 h-4">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                    <span>Close</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="relative flex-1 px-4 mt-5 sm:px-5">
                                        <div class="absolute inset-0 px-4 sm:px-5">
                                            <div class="border-b pb-10">
                                                @if ($loan_id)
                                                    <x-badge
                                                        label=" {{ \Carbon\Carbon::parse($monthly_payment->due_date)->format('F d, Y') }}"
                                                        info />
                                                    <div class="mt-5">
                                                        <h1 class="text-xl font-bold text-gray-700">
                                                            &#8369;{{ number_format($monthly_payment->monthly_payment + $monthly_payment->interest, 2) }}
                                                        </h1>
                                                        <p class="text-sm text-gray-500">With 5% Interest</p>
                                                    </div>
                                                @endif

                                            </div>
                                            <div class="py-5">
                                                <h1>Payment Method:</h1>
                                                <div class="w-16 h-16 bg-blue-500 text-white  p-2 rounded-xl">

                                                    <svg class="text-white" viewBox="0 0 192 192"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none">
                                                        <path stroke="#ffffff" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="12"
                                                            d="M84 96h36c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36c9.941 0 18.941 4.03 25.456 10.544" />
                                                        <path fill="#ffffff"
                                                            d="M145.315 66.564a6 6 0 0 0-10.815 5.2l10.815-5.2ZM134.5 120.235a6 6 0 0 0 10.815 5.201l-10.815-5.201Zm-16.26-68.552a6 6 0 1 0 7.344-9.49l-7.344 9.49Zm7.344 98.124a6 6 0 0 0-7.344-9.49l7.344 9.49ZM84 152c-30.928 0-56-25.072-56-56H16c0 37.555 30.445 68 68 68v-12ZM28 96c0-30.928 25.072-56 56-56V28c-37.555 0-68 30.445-68 68h12Zm106.5-24.235C138.023 79.09 140 87.306 140 96h12c0-10.532-2.399-20.522-6.685-29.436l-10.815 5.2ZM140 96c0 8.694-1.977 16.909-5.5 24.235l10.815 5.201C149.601 116.522 152 106.532 152 96h-12ZM84 40c12.903 0 24.772 4.357 34.24 11.683l7.344-9.49A67.733 67.733 0 0 0 84 28v12Zm34.24 100.317C108.772 147.643 96.903 152 84 152v12a67.733 67.733 0 0 0 41.584-14.193l-7.344-9.49Z" />
                                                        <path stroke="#ffffff" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="12"
                                                            d="M161.549 58.776C166.965 70.04 170 82.666 170 96c0 13.334-3.035 25.96-8.451 37.223" />
                                                    </svg>
                                                </div>
                                                <div class="mt-5" wire:ignore>
                                                    {{ $this->form }}
                                                </div>
                                                <div class="mt-10">
                                                    <x-button label="SUBMIT PAYMENT" squared wire:click="payNow"
                                                        class="w-full font-semibold" slate md
                                                        right-icon="arrow-right" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </div>
    <div class="fixed 2xl:hidden bottom-5 right-5 h-16 w-16 rounded-full bg-main text-white border-white">
        <a href="{{ route('member.add-loan') }}" class=" grid place-content-center h-full w-full">
            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"
                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                stroke-linejoin="round" class="lucide lucide-file-plus-2">
                <path d="M4 22h14a2 2 0 0 0 2-2V7l-5-5H6a2 2 0 0 0-2 2v4" />
                <path d="M14 2v4a2 2 0 0 0 2 2h4" />
                <path d="M3 15h6" />
                <path d="M6 12v6" />
            </svg>
        </a>

    </div>
</div>
