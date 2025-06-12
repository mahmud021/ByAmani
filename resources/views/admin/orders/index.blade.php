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

            <div class="overflow-x-auto bg-white dark:bg-gray-800 shadow rounded-lg">
                <table class="min-w-full text-sm divide-y divide-gray-200 dark:divide-gray-700">
                    <thead class="bg-gray-50 dark:bg-gray-700 text-left text-gray-700 dark:text-gray-200">
                    <tr>
                        <th class="px-4 py-3">Tracking</th>
                        <th class="px-4 py-3">Customer</th>
                        <th class="px-4 py-3">Phone</th>
                        <th class="px-4 py-3">Total</th>
                        <th class="px-4 py-3">Status</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100 dark:divide-gray-700">
                    @foreach($orders as $order)
                        <tr>
                            <td class="px-4 py-3 font-mono">{{ $order->tracking_code }}</td>
                            <td class="px-4 py-3">{{ $order->customer_name }}</td>
                            <td class="px-4 py-3">{{ $order->customer_phone }}</td>
                            <td class="px-4 py-3">₦{{ number_format($order->grand_total) }}</td>
                            <td class="px-4 py-3">
                                    <span class="px-2 py-1 rounded-full text-xs font-semibold {{ match($order->status) {
                                        'pending' => 'bg-yellow-100 text-yellow-800',
                                        'processing' => 'bg-blue-100 text-blue-800',
                                        'completed' => 'bg-green-100 text-green-800',
                                        'cancelled' => 'bg-red-100 text-red-800',
                                        'receipt_uploaded' => 'bg-indigo-100 text-indigo-800',
                                        default => 'bg-gray-200 text-gray-700',
                                    } }}">
                                        {{ ucfirst(str_replace('_', ' ', $order->status)) }}
                                    </span>
                            </td>
                            <td class="px-4 py-3">
                                <form action="{{ route('admin.orders.updateStatus', $order) }}" method="POST">
                                    @csrf
                                    @method('PATCH')
                                    <select name="status" class="text-sm border rounded px-2 py-1 dark:bg-gray-900 dark:text-white"
                                            onchange="this.form.submit()">
                                        <option value="pending" @selected($order->status === 'pending')>Pending</option>
                                        <option value="processing" @selected($order->status === 'processing')>Processing</option>
                                        <option value="completed" @selected($order->status === 'completed')>Completed</option>
                                        <option value="cancelled" @selected($order->status === 'cancelled')>Cancelled</option>
                                        <option value="receipt_uploaded" @selected($order->status === 'receipt_uploaded')>Receipt Uploaded</option>
                                    </select>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                <div class="px-4 py-4">
                    {{ $orders->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
