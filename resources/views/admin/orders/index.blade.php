<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('All Orders') }}
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            @if(session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif

            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden border border-gray-700 dark:border-neutral-700 rounded-lg shadow">
                            <table class="min-w-full divide-y divide-gray-600 dark:divide-neutral-700 bg-[#1F2937] dark:bg-[#1F2937]">
                                <thead class="bg-[#111827] dark:bg-[#111827]">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase">Tracking</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase">Customer</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase">Phone</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase">Total</th>
                                    <th class="px-6 py-3 text-left text-xs font-semibold text-gray-400 uppercase">Status</th>
                                    <th class="px-6 py-3 text-right text-xs font-semibold text-gray-400 uppercase">Update</th>
                                </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-700 dark:divide-neutral-800">
                                @foreach($orders as $order)
                                    <tr class="hover:bg-gray-800/70 transition">
                                        <td class="px-6 py-4 text-sm font-mono text-gray-200">{{ $order->tracking_code }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-200">{{ $order->customer_name }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-200">{{ $order->customer_phone }}</td>
                                        <td class="px-6 py-4 text-sm text-gray-200">₦{{ number_format($order->total_amount, 2) }}</td>
                                        <td class="px-6 py-4 text-sm">
                                            <x-badge>
                                                {{ str_replace('_', ' ', $order->status) }}
                                            </x-badge>

                                        </td>
                                        <td class="px-6 py-4 text-end text-sm">
                                            <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST">
                                                @csrf
                                                @method('PATCH')
                                                <select name="status"
                                                        class="bg-[#111827] border border-gray-600 text-gray-100 text-sm rounded-md focus:ring-0 focus:border-gray-500"
                                                        onchange="this.form.submit()">
                                                    <option value="pending" @selected($order->status === 'pending')>Pending</option>
                                                    <option value="confirmed" @selected($order->status === 'confirmed')>Confirmed</option>
                                                    <option value="cancelled" @selected($order->status === 'cancelled')>Cancelled</option>
                                                </select>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-6">
                            {{ $orders->links() }}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
