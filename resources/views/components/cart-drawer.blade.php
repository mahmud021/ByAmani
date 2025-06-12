<div x-data="{ drawerOpen: false }">
    <!-- Open Button -->
    <button @click="drawerOpen = true"
            type="button"
            class="relative inline-flex justify-center items-center size-11 text-sm font-semibold rounded-lg border border-[#A6977C] bg-[#F4F1EC] text-[#0D2F25] shadow-2xs hover:bg-[#e8e4dd] focus:outline-hidden focus:bg-[#e8e4dd] disabled:opacity-50 disabled:pointer-events-none"
            aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-offcanvas-right" data-hs-overlay="#hs-offcanvas-right">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
             viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
             stroke-linecap="round" stroke-linejoin="round"
             class="lucide lucide-shopping-basket-icon lucide-shopping-basket">
            <path d="m15 11-1 9"/><path d="m19 11-4-7"/><path d="M2 11h20"/>
            <path d="m3.5 11 1.6 7.4a2 2 0 0 0 2 1.6h9.8a2 2 0 0 0 2-1.6l1.7-7.4"/>
            <path d="M4.5 15.5h15"/><path d="m5 11 4-7"/><path d="m9 11 1 9"/>
        </svg>
        {{-- Dynamic badge --}}
        @if($totalQuantity > 0)
            <span class="absolute top-0 end-0 inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium transform -translate-y-1/2 translate-x-1/2 bg-red-500 text-white">
            {{ $totalQuantity > 99 ? '99+' : $totalQuantity }}
        </span>
        @endif
    </button>

    <!-- Backdrop -->
    <div x-show="drawerOpen"
         x-transition:enter="ease-in-out duration-500"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="ease-in-out duration-500"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 bg-black/30 transition-opacity z-10"
         aria-hidden="true"
         @click="drawerOpen = false">
    </div>

    <!-- Drawer Panel -->
    <div x-show="drawerOpen"
         x-transition:enter="transform transition ease-in-out duration-500 sm:duration-700"
         x-transition:enter-start="translate-x-full"
         x-transition:enter-end="translate-x-0"
         x-transition:leave="transform transition ease-in-out duration-500 sm:duration-700"
         x-transition:leave-start="translate-x-0"
         x-transition:leave-end="translate-x-full"
         class="fixed inset-y-0 right-0 w-screen max-w-md z-20">
        <div class="pointer-events-auto h-full">
            <div class="flex h-full flex-col overflow-y-scroll bg-[#F4F1EC] shadow-xl">
                <!-- Header -->
                <div class="flex-1 overflow-y-auto px-4 py-6 sm:px-6">
                    <div class="flex items-start justify-between">
                        <h2 class="text-lg font-medium text-[#0D2F25]" id="drawer-title">Shopping cart</h2>
                        <div class="ml-3 flex h-7 items-center">
                            <button type="button"
                                    class="relative -m-2 p-2 text-[#7A8D73] hover:text-[#0D2F25]"
                                    @click="drawerOpen = false">
                                <span class="absolute -inset-0.5"></span>
                                <span class="sr-only">Close panel</span>
                                <svg class="size-6" fill="none" viewBox="0 0 24 24"
                                     stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="mt-8">
                        <div class="flow-root">
                            <ul role="list" class="-my-6 divide-y divide-[#A6977C]/40">
                                @forelse($cart as $key => $item)
                                    <li class="flex py-6">
                                        <div class="size-24 shrink-0 overflow-hidden rounded-md border border-[#A6977C]/50">
                                            <img src="{{ asset('storage/' . $item['image']) }}"
                                                 alt="{{ $item['product_name'] ?? $item['name'] ?? 'Unnamed Product' }}"
                                                 class="size-full object-cover">
                                        </div>
                                        <div class="ml-4 flex flex-1 flex-col">
                                            <div>
                                                <div class="flex justify-between text-base font-medium text-[#0D2F25]">
                                                    <h3>
                                                        <a href="#">
                                                            {{ $item['product_name'] ?? $item['name'] ?? 'Unnamed Product' }} ({{ $item['size_label'] }})                                                        </a>
                                                    </h3>
                                                    <p class="ml-4">₦{{ number_format($item['price'] * $item['quantity']) }}</p>

                                                </div>
                                            </div>
                                            <div class="flex flex-1 items-end justify-between text-sm">
                                                <p class="text-[#7A8D73]">Qty {{ $item['quantity'] }}</p>
                                                <div class="flex">
                                                    <form method="POST" action="{{ route('cart.remove') }}">
                                                        @csrf
                                                        <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                                        <input type="hidden" name="size_id" value="{{ $item['size_id'] }}">
                                                        <button type="submit" class="font-medium text-[#7A8D73] hover:text-[#0D2F25]">
                                                            Remove
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    <li class="text-center py-6 text-[#7A8D73]">Your cart is empty.</li>
                                @endforelse
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- Footer -->
                <div class="border-t border-[#A6977C]/40 px-4 py-6 sm:px-6">
                    <div class="flex justify-between text-base font-medium text-[#0D2F25]">
                        <p>Subtotal</p>
                        <p>₦{{ number_format($subtotal ?? 0) }}</p>
                    </div>
                    <p class="mt-0.5 text-sm text-[#7A8D73]">Shipping and taxes calculated at checkout.</p>
                    <div class="mt-6">
                        <a href="{{ route('checkout.index') }}"
                           class="w-full flex items-center justify-center rounded-md border border-transparent bg-[#0D2F25] px-6 py-3 text-base font-medium text-white shadow-xs hover:bg-[#143b30]">
                            Checkout
                        </a>

                    </div>
                    <div class="mt-6 flex justify-center text-center text-sm text-[#7A8D73]">
                        <p>
                            or
                            <button type="button"
                                    class="font-medium text-[#0D2F25] hover:underline ml-1"
                                    @click="drawerOpen = false">
                                Continue Shopping <span aria-hidden="true">&rarr;</span>
                            </button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
