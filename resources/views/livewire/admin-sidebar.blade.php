<div>
    <div class="border p-5 rounded-[2rem]">
        <div class="bg-gray-700 relative overflow-hidden rounded-2xl p-5">

            <div class="absolute -bottom-16 left-0">
                <h1 class="font-black text-[8rem] text-white opacity-5 tracking-widest">LOAN</h1>
            </div>
            <div class="flex text-white justify-between items-center">
                <h1 class="text-xl ">Loan Wallet</h1>
                <div class="relative w-10 h-10">
                    <div
                        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-8 h-8 rounded-full bg-gray-500">
                    </div>
                    <div
                        class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-6 h-6 rounded-full bg-gray-300">
                    </div>
                </div>
            </div>
            <div class="mt-10 mb-10">
                <div class="text-gray-400">
                    <h1 class="text-sm">Total Loan</h1>
                    <h1 class="text-4xl text-white font-bold">&#8369;{{ number_format($total_loan, 2) }}</h1>
                </div>
            </div>
        </div>
        <div class="mt-5">
            <div class="flex justify-between items-end">
                <h1 class="text-xl  text-gray-600">Transactions</h1>
                <a href="" class="text-blue-500">See more</a>
            </div>
            <ul class="mt-5 space-y-2 relative z-10">
                @forelse ($payments as $item)
                    <li class="flex justify-between items-center">
                        <div class="flex space-x-3 items-center">
                            <div class="h-12 w-12  grid place-content-center text-center bg-gray-500">
                                <h1 class="text-sm font-bold text-gray-400 uppercase">
                                    {{ \Carbon\Carbon::parse($item->updated_at)->format('M') }}</h1>
                                <h1 class="text-xs font-bold leading-3 text-gray-300">
                                    {{ \Carbon\Carbon::parse($item->updated_at)->format('d') }}</h1>
                            </div>
                            <div class="text-gray-700">
                                <h1 class=" font-semibold">
                                    {{ $item->loan->user->name }}
                                </h1>
                                <h1 class="leading-3 text-sm text-gray-500 ">
                                    &#8369;{{ number_format($item->monthly_payment + $item->interest, 2) }}</h1>
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
</div>
