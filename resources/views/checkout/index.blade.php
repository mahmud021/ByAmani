{{-- resources/views/checkout/index.blade.php --}}
@extends('layouts.public')

@section('title', 'Checkout | By Amani')

@section('content')
    <section class="py-16 bg-[#F4F1EC] min-h-screen">
        <div class="container mx-auto px-6">
            <form method="POST" action="{{ route('checkout.place') }}">
                @csrf

                <div class="grid md:grid-cols-2 gap-8 max-w-6xl mx-auto">
                    {{-- ── LEFT: Shipping form ─────────────────────────────────── --}}
                    <div class="bg-white p-6 rounded-lg shadow">
                        <h2 class="text-xl font-bold text-[#0D2F25] mb-4">Shipping Information</h2>

                        {{-- Name --}}
                        <div>
                            <label for="name" class="block text-sm font-medium text-[#0D2F25]">Full Name</label>
                            <input type="text" name="name" id="name" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm
                                      focus:border-[#0D2F25] focus:ring-[#0D2F25]">
                        </div>

                        {{-- Phone --}}
                        <div class="mt-4">
                            <label for="phone" class="block text-sm font-medium text-[#0D2F25]">Phone Number</label>
                            <input type="text" name="phone" id="phone" required
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm
                                      focus:border-[#0D2F25] focus:ring-[#0D2F25]">
                        </div>

                        {{-- Email (optional) --}}
                        <div class="mt-4">
                            <label for="email" class="block text-sm font-medium text-[#0D2F25]">Email Address (optional)</label>
                            <input type="email" name="email" id="email"
                                   class="mt-1 block w-full border-gray-300 rounded-md shadow-sm
                                      focus:border-[#0D2F25] focus:ring-[#0D2F25]">
                        </div>

                        {{-- Address --}}
                        <div class="mt-4">
                            <label for="address" class="block text-sm font-medium text-[#0D2F25]">Delivery Address</label>
                            <textarea name="address" id="address" rows="3" required
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm
                                         focus:border-[#0D2F25] focus:ring-[#0D2F25]"></textarea>
                        </div>

                        {{-- Locality (dropdown) --}}
                        <div class="mt-4">
                            <label for="locality_id" class="block text-sm font-medium text-[#0D2F25]">Locality</label>
                            <select name="locality_id" id="locality_id"
                                    x-data
                                    x-on:change="$dispatch('locality-changed')"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm
                                       focus:border-[#0D2F25] focus:ring-[#0D2F25]">
                                <option value="">Choose…</option>
                                @foreach($localities as $loc)
                                    <option value="{{ $loc->id }}" data-fee="{{ $loc->delivery_fee }}">
                                        {{ $loc->name }} — ₦{{ number_format($loc->delivery_fee, 0) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Notes (optional) --}}
                        <div class="mt-4">
                            <label for="notes" class="block text-sm font-medium text-[#0D2F25]">Additional Notes (optional)</label>
                            <textarea name="notes" id="notes" rows="2"
                                      class="mt-1 block w-full border-gray-300 rounded-md shadow-sm
                                         focus:border-[#0D2F25] focus:ring-[#0D2F25]"></textarea>
                        </div>
                    </div>

                    {{-- ── RIGHT: Order summary ───────────────────────────────── --}}
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
                                    <p class="font-medium text-[#0D2F25]">
                                        ₦{{ number_format($item['price'] * $item['quantity']) }}
                                    </p>
                                </div>
                            </div>
                        @empty
                            <p class="text-[#7A8D73]">Your cart is empty.</p>
                        @endforelse

                        {{-- Live-total box (items + delivery) --}}
                        <div x-data="{ base: @json($subtotal), fee: 0 }"
                             x-on:locality-changed.window="
                            fee = Number($event.target.selectedOptions[0].dataset.fee || 0)
                         ">
                            <div class="mt-6 border-t pt-4 flex justify-between font-bold text-lg text-[#0D2F25]">
                                <span>Total (incl. delivery)</span>
                                <span x-text="(base + fee).toLocaleString('en-NG', {style:'currency', currency:'NGN'})">
                                ₦{{ number_format($subtotal) }}
                            </span>
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                    class="w-full bg-[#0D2F25] text-white px-6 py-3 rounded-md
                                       hover:bg-[#143b30] transition">
                                Place Order
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
