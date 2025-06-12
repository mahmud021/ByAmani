@extends('layouts.public')

@section('title', 'Checkout')

@section('content')
    <div class="max-w-2xl mx-auto py-12 px-4">
        <h2 class="text-2xl font-bold text-[#0D2F25] mb-6">Checkout</h2>

        <form method="POST" action="{{ route('checkout.place') }}">
            @csrf

            <div class="mb-4">
                <label class="block text-sm font-medium text-[#0D2F25]">Full Name</label>
                <input type="text" name="customer_name" required class="mt-1 w-full input input-bordered">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-[#0D2F25]">Phone Number</label>
                <input type="text" name="customer_phone" required class="mt-1 w-full input input-bordered">
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-[#0D2F25]">Delivery Address</label>
                <textarea name="customer_address" rows="3" required class="mt-1 w-full textarea textarea-bordered"></textarea>
            </div>

            <div class="mt-6">
                <button type="submit" class="w-full bg-[#0D2F25] text-white py-3 rounded-md hover:bg-[#143b30] transition">
                    Place Order
                </button>
            </div>
        </form>
    </div>
@endsection
