{{-- resources/views/orders/show.blade.php --}}
@extends('layouts.public')

@section('title', 'Order Summary')

@php use Illuminate\Support\Facades\Storage; @endphp

@section('content')
    <section class="py-16 bg-gradient-to-b from-[#F9F5F0] to-[#F4F1EC] min-h-screen">
        <div class="container mx-auto px-6 max-w-5xl">
            <h2 class="text-4xl font-semibold text-[#1A3C34] mb-8 text-center">
                Order Summary
            </h2>

            {{-- Flash / validation messages --}}
            @if (session('success'))
                <div class="mb-8 flex items-center gap-2 rounded-xl bg-[#D4F7F4] px-6 py-4
                        text-base font-medium text-[#1A3C34] shadow-sm">
                    <svg class="size-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9
                             10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z"
                              clip-rule="evenodd"/>
                    </svg>
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-8 flex items-center gap-2 rounded-xl bg-red-50 px-6 py-4
                        text-base font-medium text-red-800 shadow-sm">
                    <svg class="size-5" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                              d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414
                             1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293
                             1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0
                             00-1.414-1.414L10 8.586 8.707 7.293z"
                              clip-rule="evenodd"/>
                    </svg>
                    <ul class="list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- ── Two-column layout --}}
            <div class="grid gap-8 lg:grid-cols-2">
                {{-- LEFT ── Order / Payment details --}}
                <div class="space-y-8">
                    {{-- Order details --}}
                    {{-- Order details --}}
                    <article class="rounded-xl border border-gray-100 bg-white p-8 shadow-sm">
                        <h3 class="mb-4 text-xl font-semibold text-[#1A3C34]">Order Details</h3>
                        <dl class="space-y-3 text-base text-[#333]">
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
                                <dt class="font-medium">Locality:</dt>
                                <dd>{{ $order->locality->name ?? '—' }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="font-medium">Delivery Fee:</dt>
                                <dd>₦{{ number_format($order->delivery_fee, 2) }}</dd>
                            </div>
                            <div class="flex justify-between">
                                <dt class="font-medium">Status:</dt>
                                <dd><x-badge class="text-sm">{{ $order->status }}</x-badge></dd>
                            </div>
                            @if($order->receipt_uploaded_at)
                                <div class="flex justify-between">
                                    <dt class="font-medium">Receipt Uploaded:</dt>
                                    <dd>{{ $order->receipt_uploaded_at->format('F j, Y h:i A') }}</dd>
                                </div>
                            @endif
                        </dl>
                    </article>

                    {{-- Payment instructions --}}
                    <article class="rounded-xl border-l-4 border-[#1A3C34] bg-white p-8 shadow-sm">
                        <h3 class="mb-4 text-xl font-semibold text-[#1A3C34]">
                            Payment Instructions
                        </h3>
                        <ul class="space-y-2 text-base text-[#333]">
                            <li><span class="font-medium">Account Number:</span> 1234567890</li>
                            <li><span class="font-medium">Bank Name:</span> Zenith Bank</li>
                            <li><span class="font-medium">Account Name:</span> Amani Clothing Store</li>
                        </ul>
                        <div class="mt-6 rounded-lg border border-[#FFDBA8] bg-[#FFF8E6] p-4
                                text-base text-[#7A4B0E]">
                            <strong class="font-semibold">Important:</strong>
                            Upload a clear screenshot or PDF of your payment receipt below
                            to confirm and process your order.
                        </div>
                    </article>
                </div>

                {{-- RIGHT ── Receipt upload + Items --}}
                <div class="space-y-8">
                    {{-- Upload receipt --}}
                    <article class="rounded-xl bg-white p-8 shadow-sm">
                        <h3 class="mb-4 text-xl font-semibold text-[#1A3C34]">Upload Receipt</h3>
                        <form x-data="{ loading:false, error:null }"
                              @submit="loading=true"
                              method="POST"
                              action="{{ route('orders.upload-receipt', $order) }}"
                              enctype="multipart/form-data"
                              class="space-y-4">
                            @csrf
                            <div>
                                <input type="file" name="receipt" accept="image/*,application/pdf"
                                       @change="validateFile($event)"
                                       class="block w-full cursor-pointer text-sm text-[#333]
                                          file:mr-4 file:rounded-lg file:border-0 file:bg-[#F9F5F0]
                                          file:px-4 file:py-2 file:text-sm file:font-medium
                                          file:text-[#1A3C34] hover:file:bg-[#EDE9E3]" />
                                <p x-show="error" x-text="error"
                                   class="mt-2 text-sm text-red-600"></p>
                            </div>

                            <button type="submit" :disabled="loading"
                                    class="flex w-full items-center justify-center gap-2 rounded-lg
                                       bg-[#1A3C34] px-6 py-3 text-base font-medium text-white
                                       transition hover:bg-[#143b30] focus:ring-2
                                       focus:ring-[#1A3C34]">
                                <svg x-show="loading"
                                     class="size-5 animate-spin"
                                     fill="none"
                                     viewBox="0 0 24 24"
                                     stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582
                                         9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0
                                         01-15.357-2m15.357 2H15"/>
                                </svg>
                                <span x-show="!loading">Upload Receipt</span>
                                <span x-show="loading">Uploading…</span>
                            </button>
                        </form>

                        @isset($order->receipt)
                            <div class="mt-4 flex items-center gap-2 text-base text-[#333]">
                                <svg class="size-5 text-[#1A3C34]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                          d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12l-3-3H7l-3
                                         3V4zm2 2h8v8H6V6z"
                                          clip-rule="evenodd"/>
                                </svg>
                                <strong class="font-medium">Uploaded Receipt:</strong>
                                <a href="{{ Storage::disk('private_docs')->temporaryUrl($order->receipt, now()->addMinutes(5)) }}"
                                   target="_blank"
                                   class="ml-2 underline text-[#FF6F5C] hover:text-[#E65A4A]">
                                    View
                                </a>
                            </div>
                        @endisset
                    </article>

                    {{-- Items ordered --}}
                    <article class="rounded-xl bg-white p-8 shadow-sm">
                        <h3 class="mb-4 text-xl font-semibold text-[#1A3C34]">Items Ordered</h3>

                        {{-- Desktop table --}}
                        <div class="hidden overflow-x-auto sm:block">
                            <table class="w-full text-left text-base">
                                <thead>
                                <tr class="border-b border-gray-200 text-[#1A3C34]">
                                    <th class="py-3 font-semibold">Product</th>
                                    <th class="py-3 font-semibold">Size</th>
                                    <th class="py-3 font-semibold">Qty</th>
                                    <th class="py-3 font-semibold">Unit Price</th>
                                    <th class="py-3 font-semibold">Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($order->items as $item)
                                    <tr class="border-b border-gray-100">
                                        <td class="py-3">{{ $item->product->name ?? 'N/A' }}</td>
                                        <td class="py-3">{{ $item->size->label   ?? 'N/A' }}</td>
                                        <td class="py-3">{{ $item->quantity }}</td>
                                        <td class="py-3">₦{{ number_format($item->price, 2) }}</td>
                                        <td class="py-3">
                                            ₦{{ number_format($item->price * $item->quantity, 2) }}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot class="text-[#1A3C34] font-semibold">
                                <tr>
                                    <td colspan="4" class="py-2 text-right">Items Total:</td>
                                    <td class="py-2">₦{{ number_format($order->total_amount - $order->delivery_fee, 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="py-2 text-right">Delivery Fee:</td>
                                    <td class="py-2">₦{{ number_format($order->delivery_fee, 2) }}</td>
                                </tr>
                                <tr>
                                    <td colspan="4" class="py-4 text-right">Grand Total:</td>
                                    <td class="py-4">₦{{ number_format($order->total_amount, 2) }}</td>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                        {{-- Mobile stacked --}}
                        <div class="space-y-6 sm:hidden">
                            @foreach ($order->items as $item)
                                <div class="border-b border-gray-100 pb-4">
                                    <p><strong>Product:</strong> {{ $item->product->name ?? 'N/A' }}</p>
                                    <p><strong>Size:</strong>    {{ $item->size->label   ?? 'N/A' }}</p>
                                    <p><strong>Qty:</strong>     {{ $item->quantity }}</p>
                                    <p><strong>Unit:</strong>    ₦{{ number_format($item->price, 2) }}</p>
                                    <p><strong>Subtotal:</strong>
                                        ₦{{ number_format($item->price * $item->quantity, 2) }}</p>
                                </div>
                            @endforeach
                            <div class="space-y-1 border-t pt-4 text-base font-semibold text-[#1A3C34]">
                                <p class="flex justify-between">
                                    <span>Items Total:</span>
                                    <span>₦{{ number_format($order->total_amount - $order->delivery_fee, 2) }}</span>
                                </p>
                                <p class="flex justify-between">
                                    <span>Delivery Fee:</span>
                                    <span>₦{{ number_format($order->delivery_fee, 2) }}</span>
                                </p>
                                <p class="flex justify-between pt-1">
                                    <span>Grand Total:</span>
                                    <span>₦{{ number_format($order->total_amount, 2) }}</span>
                                </p>
                            </div>
                        </div>
                    </article>
                </div> {{-- /RIGHT --}}
            </div> {{-- /grid --}}
        </div>
    </section>

    {{-- Tiny Alpine helper for client-side file validation --}}
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('validateFile', () => ({
                error:null,
                validateFile(e){
                    const f=e.target.files[0];
                    const max=5*1024*1024;
                    const ok=['image/jpeg','image/png','image/gif','application/pdf'];
                    if(!f){this.error='Please select a file.';return;}
                    if(f.size>max){this.error='File must be <5 MB.';e.target.value='';return;}
                    if(!ok.includes(f.type)){this.error='Only JPEG, PNG, GIF, or PDF.';e.target.value='';return;}
                    this.error=null;
                }
            }));
        });
    </script>
@endsection
