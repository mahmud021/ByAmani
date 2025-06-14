@php
    use Illuminate\Support\Facades\Storage;
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-100 leading-tight">
            Order #{{ $order->tracking_code }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 space-y-8">

            {{-- ── SUMMARY GRID ─────────────────────────────────────────────── --}}
            <div class="grid md:grid-cols-3 gap-6">
                {{-- Customer --}}
                <div class="col-span-2 bg-white dark:bg-gray-800 rounded-lg shadow p-6
                            text-gray-700 dark:text-gray-200">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-100">
                        Customer details
                    </h3>

                    <dl class="space-y-2 text-sm">
                        <div><dt class="font-medium">Name:</dt>  <dd>{{ $order->customer_name }}</dd></div>
                        <div><dt class="font-medium">Phone:</dt> <dd>{{ $order->customer_phone ?? '—' }}</dd></div>

                        @if($order->customer_email)
                            <div><dt class="font-medium">Email:</dt> <dd>{{ $order->customer_email }}</dd></div>
                        @endif

                        <div><dt class="font-medium">Address:</dt>
                            <dd class="max-w-prose">{{ $order->customer_address ?? '—' }}</dd></div>

                        <div><dt class="font-medium">Locality:</dt>
                            <dd>{{ $order->locality->name ?? '—' }}</dd></div>
                    </dl>
                </div>

                {{-- Status / Totals / Receipt --}}
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 flex flex-col
                            justify-between text-gray-700 dark:text-gray-200">
                    <div>
                        <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-100">Status</h3>
                        <x-badge
                                @class([
                                    'bg-yellow-100 text-yellow-800' => $order->status === 'pending',
                                    'bg-green-100 text-green-800'  => $order->status === 'confirmed',
                                    'bg-red-100 text-red-800'      => $order->status === 'cancelled',
                                ])
                        >
                            {{ ucfirst($order->status) }}
                        </x-badge>
                    </div>

                    <div class="mt-6 space-y-1">
                        <p class="text-sm">Items total</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-gray-50">
                            ₦{{ number_format($order->total_amount - $order->delivery_fee, 2) }}
                        </p>

                        <p class="text-sm pt-2">Delivery fee</p>
                        <p class="text-lg font-semibold text-gray-900 dark:text-gray-50">
                            ₦{{ number_format($order->delivery_fee, 2) }}
                        </p>

                        <p class="pt-2 text-sm">Grand total</p>
                        <p class="text-2xl font-bold text-gray-900 dark:text-gray-50">
                            ₦{{ number_format($order->total_amount, 2) }}
                        </p>
                    </div>

                    <div class="mt-6">
                        @if($order->receipt)
                            <button
                                    x-data
                                    @click="$dispatch('open-receipt')"
                                    class="inline-flex w-full justify-center items-center gap-2
                                       text-sm font-medium text-white bg-gray-900 hover:bg-gray-800
                                       px-4 py-2 rounded-md">
                                View receipt
                            </button>
                        @else
                            <p class="text-sm text-gray-500 dark:text-gray-400">No receipt uploaded.</p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- ── ITEMS TABLE ──────────────────────────────────────────────── --}}
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow p-6 overflow-x-auto">
                <h3 class="text-lg font-semibold mb-4 text-gray-800 dark:text-gray-100">Order items</h3>

                <table class="min-w-full text-sm divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                    <tr>
                        <th class="px-4 py-2 text-left">Product</th>
                        <th class="px-4 py-2 text-left">Size</th>
                        <th class="px-4 py-2 text-right">Qty</th>
                        <th class="px-4 py-2 text-right">Unit (₦)</th>
                        <th class="px-4 py-2 text-right">Subtotal (₦)</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700
                                   text-gray-700 dark:text-gray-200">
                    @foreach($order->items as $item)
                        <tr>
                            <td class="px-4 py-2 whitespace-nowrap">{{ $item->product->name }}</td>
                            <td class="px-4 py-2">{{ $item->size->label }}</td>
                            <td class="px-4 py-2 text-right">{{ $item->quantity }}</td>
                            <td class="px-4 py-2 text-right">{{ number_format($item->price, 2) }}</td>
                            <td class="px-4 py-2 text-right">
                                {{ number_format($item->quantity * $item->price, 2) }}
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- ── RECEIPT MODAL ─────────────────────────────────────────────────── --}}
    @if($order->receipt)
        <div
                x-data="{ open:false }"
                x-on:open-receipt.window="open=true"
                x-show="open"
                x-cloak
                class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 p-4"
                @keydown.escape.window="open=false"
        >
            <div class="relative w-full max-w-2xl rounded-lg bg-white
                        p-6 shadow-xl dark:bg-gray-800"
                 @click.away="open=false">
                <button
                        class="absolute top-3 right-3 text-gray-400 hover:text-gray-600
                           dark:hover:text-gray-300"
                        @click="open=false"
                >&times;</button>

                @if(Str::endsWith($order->receipt, ['.jpg', '.jpeg', '.png', '.webp']))
                    <img src="{{ Storage::disk('private_docs')->temporaryUrl($order->receipt, now()->addMinutes(5)) }}"
                         alt="Receipt"
                         class="h-auto max-h-[80vh] w-full rounded object-contain">
                @else
                    <iframe src="{{ Storage::disk('private_docs')->temporaryUrl($order->receipt, now()->addMinutes(5)) }}"
                            class="h-[80vh] w-full rounded"></iframe>
                @endif
            </div>
        </div>
    @endif
</x-app-layout>
