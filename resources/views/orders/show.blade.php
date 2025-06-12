@extends('layouts.public')

@section('title', 'Order Summary')

@section('content')
    <section class="py-16 bg-[#F4F1EC] min-h-screen">
        <div class="container mx-auto px-6 max-w-4xl">
            <h2 class="text-3xl font-bold text-[#0D2F25] mb-6">Order Summary</h2>
            @if(session('success'))
                <div class="mb-6 bg-green-100 text-green-800 text-sm font-medium px-4 py-3 rounded shadow">
                    {{ session('success') }}
                </div>
            @endif

            <!-- Order Info -->
            <div class="bg-white p-6 rounded-lg shadow mb-8 space-y-2">
                <p><strong>Tracking Code:</strong> {{ $order->tracking_code }}</p>
                <p><strong>Name:</strong> {{ $order->customer_name }}</p>
                <p><strong>Phone:</strong> {{ $order->customer_phone }}</p>
                @if($order->customer_email)
                    <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                @endif
                <p><strong>Address:</strong> {{ $order->customer_address }}</p>
                <p><strong>Status:</strong> <x-badge>{{ $order->status }}</x-badge></p>
                @if($order->receipt_uploaded_at)
                    <p><strong>Receipt Uploaded At:</strong> {{ $order->receipt_uploaded_at->format('F j, Y h:i A') }}</p>
                @endif
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

            <!-- 🏦 Payment Instructions -->
            <div class="bg-white p-6 rounded-lg shadow mb-8 border-l-4 border-[#0D2F25]">
                <h3 class="text-lg font-bold text-[#0D2F25] mb-2">Kindly make payment to:</h3>
                <ul class="text-sm text-[#0D2F25] space-y-1">
                    <li><strong>Account Number:</strong> 1234567890</li>
                    <li><strong>Bank Name:</strong> Zenith Bank</li>
                    <li><strong>Account Name:</strong> Amani Clothing Store</li>
                </ul>

                <div class="mt-4 p-4 rounded bg-yellow-50 border border-yellow-200 text-yellow-900 text-sm">
                    <strong>Important:</strong> Please upload a clear screenshot or PDF of your payment receipt below so we can confirm and process your order.
                </div>
            </div>

            <!-- 📤 Upload Receipt -->
            <div class="bg-white p-6 rounded-lg shadow">
                <h3 class="text-lg font-semibold text-[#0D2F25] mb-4">Upload Receipt</h3>
                <form action="{{ route('orders.upload-receipt', $order->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="receipt" accept="image/*,application/pdf"
                           class="block w-full mb-4 border rounded p-2 text-sm">
                    <button type="submit"
                            class="bg-[#0D2F25] text-white px-4 py-2 rounded hover:bg-[#143b30] transition">
                        Upload Receipt
                    </button>
                </form>
                @if ($order->receipt)
                    <div class="mt-4 text-sm text-[#0D2F25]">
                        <strong>Uploaded Receipt:</strong>
                        <a href="{{ asset('storage/' . $order->receipt) }}" target="_blank" class="underline text-blue-600">
                            View Receipt
                        </a>
                    </div>
                @endif

            </div>
        </div>
    </section>
@endsection
