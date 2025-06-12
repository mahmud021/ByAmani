@extends('layouts.public')

@section('title', 'Checkout | By Amani')

@section('content')
    <section class="py-16 bg-[#F4F1EC]">
        <div class="container mx-auto px-6">
            <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto">
                {{-- Left: User Form --}}
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-bold text-[#0D2F25] mb-4">Shipping Information</h2>
                    <form method="POST" action="{{ route('checkout.place') }}" class="space-y-4">
                        @csrf

                        <div>
                            <label for="name" class="block text-sm font-medium text-[#0D2F25]">Full Name</label>
                            <input type="text" name="name" id="name" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#0D2F25] focus:ring-[#0D2F25]">
                        </div>

                        <div>
                            <label for="phone" class="block text-sm font-medium text-[#0D2F25]">Phone Number</label>
                            <input type="text" name="phone" id="phone" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#0D2F25] focus:ring-[#0D2F25]">
                        </div>

                        <div>
                            <label for="email" class="block text-sm font-medium text-[#0D2F25]">Email Address (optional)</label>
                            <input type="email" name="email" id="email"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#0D2F25] focus:ring-[#0D2F25]">
                        </div>

                        <div>
                            <label for="address" class="block text-sm font-medium text-[#0D2F25]">Delivery Address</label>
                            <textarea name="address" id="address" rows="3" required
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#0D2F25] focus:ring-[#0D2F25]"></textarea>
                        </div>

                        <div>
                            <label for="locality" class="block text-sm font-medium text-[#0D2F25]">Locality</label>
                            <input type="text" name="locality" id="locality" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#0D2F25] focus:ring-[#0D2F25]">
                        </div>

                        <div>
                            <label for="notes" class="block text-sm font-medium text-[#0D2F25]">Additional Notes (optional)</label>
                            <textarea name="notes" id="notes" rows="2"
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-[#0D2F25] focus:ring-[#0D2F25]"></textarea>
                        </div>
                    </form>
                </div>

                {{-- Right: Order Summary --}}
                <div class="bg-white p-6 rounded-lg shadow">
                    <h2 class="text-xl font-bold text-[#0D2F25] mb-4">Review Your Order</h2>

                    @forelse($cart as $item)
                        <div class="mb-4 p-4 border rounded-lg bg-[#F9F9F7]">
                            <div class="flex justify-between">
                                <div>
                                    <h4 class="text-base font-semibold text-[#0D2F25]">
                                        {{ $item['product_name'] ?? $item['name'] ?? 'Unnamed Product' }}
                                        ({{ $item['size_label'] }})
                                    </h4>
                                    <p class="text-sm text-[#7A8D73]">Qty: {{ $item['quantity'] }}</p>
                                </div>
                                <p class="font-medium text-[#0D2F25]">₦{{ number_format($item['price'] * $item['quantity']) }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="text-[#7A8D73]">Your cart is empty.</p>
                    @endforelse

                    <div class="mt-6 border-t pt-4 flex justify-between font-bold text-lg text-[#0D2F25]">
                        <span>Total</span>
                        <span>₦{{ number_format($subtotal) }}</span>
                    </div>

                    <form method="POST" action="{{ route('checkout.place') }}" class="mt-6">
                        @csrf
                        <button type="submit"
                                class="w-full bg-[#0D2F25] text-white px-6 py-3 rounded-md hover:bg-[#143b30] transition">
                            Place Order
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
