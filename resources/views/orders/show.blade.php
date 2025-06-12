@extends('layouts.public')

@section('title', 'Order Summary')

@section('content')
    <section class="py-16 bg-[#F4F1EC] min-h-screen">
        <div class="container mx-auto px-6 max-w-4xl">
            <h2 class="text-3xl font-bold text-[#0D2F25] mb-6">Order Summary</h2>

            <!-- Order Info -->
            <div class="bg-white p-6 rounded-lg shadow mb-8 space-y-2">
                <p><strong>Tracking Code:</strong> {{ $order->tracking_code }}</p>
                <p><strong>Name:</strong> {{ $order->customer_name }}</p>
                <p><strong>Phone:</strong> {{ $order->customer_phone }}</p>
                @if($order->customer_email)
                    <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                @endif
                <p><strong>Address:</strong> {{ $order->customer_address }}</p>
                <p><strong>Status:</strong>
                    <x-badge>{{ $order->status }}</x-badge>

                </p>
            </div>

            <!-- Items Table -->
            <div class="bg-white p-6 rounded-lg shadow mb-8 overflow-x-auto">
                <h3 class="text-lg font-semibold text-[#0D2F25] mb-4">Items Ordered</h3>
                <table class="w-full text-left text-sm">
                    <thead>
                    <tr class="border-b">
                        <th class="py-2">Product</th>
                        <th class="py-2">Size</th>
                        <th class="py-2">Quantity</th>
                        <th class="py-2">Unit Price</th>
                        <th class="py-2">Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($order->items as $item)
                        <tr class="border-b">
                            <td class="py-2">{{ $item->product->name ?? 'N/A' }}</td>
                            <td class="py-2">{{ $item->size->label ?? 'N/A' }}</td>
                            <td class="py-2">{{ $item->quantity }}</td>
                            <td class="py-2">₦{{ number_format($item->price, 2) }}</td>
                            <td class="py-2">₦{{ number_format($item->price * $item->quantity, 2) }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="font-bold text-[#0D2F25]">
                        <td colspan="4" class="py-3 text-right">Grand Total:</td>
                        <td class="py-3">₦{{ number_format($order->total_amount, 2) }}</td>
                    </tr>
                    </tfoot>
                </table>
            </div>

            <!-- Upload Receipt (optional feature) -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold text-[#0D2F25] mb-4">Upload Receipt (Optional)</h3>
                <form action="{{ route('orders.upload-receipt', $order->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="receipt" accept="image/*,application/pdf"
                           class="block w-full mb-4 border rounded p-2">
                    <button type="submit"
                            class="bg-[#0D2F25] text-white px-4 py-2 rounded hover:bg-[#143b30] transition">
                        Upload
                    </button>
                </form>
            </div>
        </div>
    </section>
@endsection
