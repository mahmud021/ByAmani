@extends('layouts.public')

@section('title', 'Checkout | By Amani')

@section('content')
    <section class="py-16 bg-[#F4F1EC]">
        <div class="container mx-auto px-6 max-w-2xl">
            <h2 class="text-2xl font-bold text-[#0D2F25] mb-6">Review Your Order</h2>

            @forelse($cart as $item)
                <div class="mb-4 p-4 border rounded-lg bg-white shadow">
                    <div class="flex justify-between">
                        <div>
                            <h4 class="text-lg font-semibold text-[#0D2F25]">    {{ $item['product_name'] ?? $item['name'] ?? 'Unnamed Product' }}
                                ({{ $item['size_label'] }})

                            </h4>
                            <p class="text-sm text-[#7A8D73]">Quantity: {{ $item['quantity'] }}</p>
                        </div>
                        <p class="font-medium text-[#0D2F25]">
                            ₦{{ number_format($item['price'] * $item['quantity']) }}</p>
                    </div>
                </div>
            @empty
                <p class="text-[#7A8D73]">Your cart is empty.</p>
            @endforelse

            <div class="mt-6 border-t pt-4 flex justify-between font-bold text-lg text-[#0D2F25]">
                <span>Total</span>
                <span>₦{{ number_format($subtotal) }}</span>
            </div>

            <form method="POST" action="{{ route('checkout.place') }}" class="mt-8">
                @csrf
                <button type="submit"
                        class="w-full bg-[#0D2F25] text-white px-6 py-3 rounded-md hover:bg-[#143b30] transition">
                    Place Order
                </button>
            </form>
        </div>
    </section>
@endsection
