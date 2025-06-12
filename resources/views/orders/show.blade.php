@extends('layouts.public')

@section('title', 'Order Summary')

@section('content')
    <section class="py-16 bg-gradient-to-b from-[#F9F5F0] to-[#F4F1EC] min-h-screen">
        <div class="container mx-auto px-6 max-w-5xl">
            <h2 class="text-4xl font-semibold text-[#1A3C34] mb-8 text-center">Order Summary</h2>

            @if(session('success'))
                <div class="mb-8 bg-[#D4F7F4] text-[#1A3C34] text-base font-medium px-6 py-4 rounded-xl shadow-sm flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <!-- Error Handling: Display form errors -->
                <div class="mb-8 bg-red-50 text-red-800 text-base font-medium px-6 py-4 rounded-xl shadow-sm flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                    </svg>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                {{-- Left Column --}}
                <div class="space-y-8">
                    <article class="bg-white p-8 rounded-xl shadow-sm border border-gray-100">
                        <h3 class="text-xl font-semibold text-[#1A3C34] mb-4">Order Details</h3>
                        <dl class="text-base text-[#333] space-y-3">
                            <div class="flex justify-between">
                                <dt class="font-medium">Tracking Code:</dt>
                                <dd>{{ $order->tracking_code }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="font-medium">Name:</dt>
                                <dd>{{ $order->customer_name }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="font-medium">Phone:</dt>
                                <dd>{{ $order->customer_phone }}</dd>
                            </div>
                            @if($order->customer_email)
                                <div class="flex justify-between">
                                    <dt class="font-medium">Email:</dt>
                                    <dd>{{ $order->customer_email }}</dd>
                                </div>
                            @endif
                            <div class="flex justify-between">
                                <dt class="font-medium">Address:</dt>
                                <dd>{{ $order->customer_address }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="font-medium">Status:</dt>
                                <dd><x-badge class="text-sm">{{ $order->status }}</x-badge></dd>
                            </div>
                            @if($order->receipt_uploaded_at)
                                <div class="flex justify-between">
                                    <dt class="font-medium">Receipt Uploaded At:</dt>
                                    <dd>{{ $order->receipt_uploaded_at->format('F j, Y h:i A') }}</dd>
                                </div>
                            @endif
                        </dl>
                    </article>

                    <article class="bg-white p-8 rounded-xl shadow-sm border-l-4 border-[#1A3C34]">
                        <h3 class="text-xl font-semibold text-[#1A3C34] mb-4">Payment Instructions</h3>
                        <ul class="text-base text-[#333] space-y-2">
                            <li><span class="font-medium">Account Number:</span> 1234567890</li>
                            <li><span class="font-medium">Bank Name:</span> Zenith Bank</li>
                            <li><span class="font-medium">Account Name:</span> Amani Clothing Store</li>
                        </ul>
                        <div class="mt-6 p-4 rounded-lg bg-[#FFF8E6] border border-[#FFDBA8] text-[#7A4B0E] text-base">
                            <strong class="font-semibold">Important:</strong> Please upload a clear screenshot or PDF of your payment receipt below to confirm and process your order.
                        </div>
                    </article>
                </div>

                {{-- Right Column --}}
                <div class="space-y-8">
                    <!-- Upload Receipt Card -->
                    <article class="bg-white p-8 rounded-xl shadow-sm">
                        <h3 class="text-xl font-semibold text-[#1A3C34] mb-4">Upload Receipt</h3>
                        <form action="{{ route('orders.upload-receipt', $order->id) }}" method="POST" enctype="multipart/form-data" class="space-y-4" x-data="{ loading: false }" @submit="loading = true">
                            @csrf
                            <div class="relative">
                                <input type="file" name="receipt" id="receipt" accept="image/*,application/pdf"
                                       class="block w-full text-sm text-[#333] file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:text-sm file:font-medium file:bg-[#F9F5F0] file:text-[#1A3C34] hover:file:bg-[#EDE9E3] cursor-pointer"
                                       aria-label="Upload payment receipt"
                                       @change="validateFile($event)">
                                <!-- Error Handling: Client-side validation error -->
                                <p x-show="error" x-text="error" class="mt-2 text-sm text-red-600"></p>
                            </div>
                            <button type="submit"
                                    class="bg-[#1A3C34] text-white px-6 py-3 rounded-lg hover:bg-[#143b30] transition duration-200 focus:ring-2 focus:ring-[#1A3C34] text-base font-medium flex items-center justify-center"
                                    :disabled="loading">
                                <span x-show="!loading">Upload Receipt</span>
                                <svg x-show="loading" class="w-5 h-5 animate-spin mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                                </svg>
                                <span x-show="loading">Uploading...</span>
                            </button>
                        </form>
                        @if ($order->receipt)
                            <div class="mt-4 text-base text-[#333] flex items-center">
                                <svg class="w-5 h-5 mr-2 text-[#1A3C34]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12l-3-3H7l-3 3V4zm2 2h8v8H6V6z" clip-rule="evenodd" />
                                </svg>
                                <strong class="font-medium">Uploaded Receipt:</strong>
                                <a href="{{ asset('storage/' . $order->receipt) }}" target="_blank" class="ml-2 underline text-[#FF6F5C] hover:text-[#E65A4A]">
                                    View Receipt
                                </a>
                            </div>
                        @endif
                    </article>

                    <!-- Items Ordered Card with Mobile Optimization -->
                    <article class="bg-white p-8 rounded-xl shadow-sm">
                        <h3 class="text-xl font-semibold text-[#1A3C34] mb-4">Items Ordered</h3>
                        <!-- Desktop Table -->
                        <div class="hidden sm:block overflow-x-auto">
                            <table class="w-full text-left text-base">
                                <thead>
                                <tr class="border-b border-gray-200 text-[#1A3C34]">
                                    <th class="py-3 font-semibold">Product</th>
                                    <th class="py-3 font-semibold">Size</th>
                                    <th class="py-3 font-semibold">Quantity</th>
                                    <th class="py-3 font-semibold">Unit Price</th>
                                    <th class="py-3 font-semibold">Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($order->items as $item)
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3">{{ $item->product->name ?? 'N/A' }}</td>
                                        <td class="py-3">{{ $item->size->label ?? 'N/A' }}</td>
                                        <td class="py-3">{{ $item->quantity }}</td>
                                        <td class="py-3">₦{{ number_format($item->price, 2) }}</td>
                                        <td class="py-3">₦{{ number_format($item->price * $item->quantity, 2) }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr class="font-semibold text-[#1A3C34]">
                                    <td colspan="4" class="py-4 text-right">Grand Total:</td>
                                    <td class="py-4">₦{{ number_format($order->total_amount, 2) }}</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- Mobile Stacked Layout -->
                        <div class="sm:hidden space-y-6">
                            @foreach ($order->items as $item)
                                <div class="border-b border-gray-100 pb-4">
                                    <p class="text-base"><strong class="font-medium">Product:</strong> {{ $item->product->name ?? 'N/A' }}</p>
                                    <p class="text-base"><strong class="font-medium">Size:</strong> {{ $item->size->label ?? 'N/A' }}</p>
                                    <p class="text-base"><strong class="font-medium">Quantity:</strong> {{ $item->quantity }}</p>
                                    <p class="text-base"><strong class="font-medium">Unit Price:</strong> ₦{{ number_format($item->price, 2) }}</p>
                                    <p class="text-base"><strong class="font-medium">Subtotal:</strong> ₦{{ number_format($item->price * $item->quantity, 2) }}</p>
                                </div>
                            @endforeach
                            <div class="pt-4 text-base font-semibold text-[#1A3C34]">
                                <p class="text-right">Grand Total: ₦{{ number_format($order->total_amount, 2) }}</p>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <!-- Client-Side Validation Script -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('form', () => ({
                error: null,
                validateFile(event) {
                    const file = event.target.files[0];
                    const maxSize = 5 * 1024 * 1024; // 5MB
                    const allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'application/pdf'];

                    if (!file) {
                        this.error = 'Please select a file.';
                        return;
                    }
                    if (file.size > maxSize) {
                        this.error = 'File size must be less than 5MB.';
                        event.target.value = '';
                        return;
                    }
                    if (!allowedTypes.includes(file.type)) {
                        this.error = 'Only JPEG, PNG, GIF, or PDF files are allowed.';
                        event.target.value = '';
                        return;
                    }
                    this.error = null;
                }
            }));
        });
    </script>
@endsection
