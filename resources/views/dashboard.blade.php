<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold text-center">Your Order History</h3>

                    @if ($orders->isEmpty())
                        <p class="text-center mt-4">You have no orders yet.</p>
                    @else
                        <div class="space-y-6 mt-6">
                            @foreach ($orders as $order)
                                <div class="border rounded-sm p-6 bg-gray-100">
                                    <div class="flex justify-between items-center mb-4">
                                        <p class="text-xl font-semibold text-gray-800">Status:
                                            <span class="text-green-800">{{ $order->status }}</span>
                                        </p>
                                    </div>

                                    <!-- Table for larger screens -->
                                    <div class="hidden sm:block">
                                        <div class="overflow-x-auto">
                                            <table class="min-w-full table-auto sm:text-sm md:text-base lg:text-lg">
                                                <thead>
                                                    <tr class="text-left">
                                                        <th class="px-4 py-2 text-gray-700">Order ID</th>
                                                        <th class="px-4 py-2 text-gray-700">Product</th>
                                                        <th class="px-4 py-2 text-gray-700">Quantity</th>
                                                        <th class="px-4 py-2 text-gray-700">Payment Method</th>
                                                        <th class="px-4 py-2 text-gray-700">Order Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach (json_decode($order->products_ordered, true) as $product)
                                                        <tr class="border-t text-sm">
                                                            <td class="px-4 py-2 text-gray-800">{{ $order->id }}</td>
                                                            <td class="px-4 py-2 text-gray-800">{{ $product['name'] }}</td>
                                                            <td class="px-4 py-2 text-gray-800">{{ $product['quantity'] }}</td>
                                                            <td class="px-4 py-2 text-gray-800">{{ $order->payment_method }}</td>
                                                            <td class="px-4 py-2 text-gray-800">{{ $order->created_at->format('Y-m-d') }}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- Vertical List for smaller screens -->
                                    <div class="sm:hidden space-y-4">
                                        @foreach (json_decode($order->products_ordered, true) as $product)
                                            <div class="border-t py-4">
                                                <p class="text-gray-800"><strong>Order ID:</strong> {{ $order->id }}</p>
                                                <p class="text-gray-800"><strong>Product:</strong> {{ $product['name'] }}</p>
                                                <p class="text-gray-800"><strong>Quantity:</strong> {{ $product['quantity'] }}</p>
                                                <p class="text-gray-800"><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                                                <p class="text-gray-800"><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d') }}</p>
                                            </div>
                                        @endforeach
                                    </div>

                                    <div class="flex justify-end mt-4">
                                        <p class="text-lg font-normal text-red-600">
                                            <span class="text-gray-600">Total Price:</span> ${{ number_format($order->total_price, 2) }}
                                        </p>
                                    </div>
                                </div>
                                <hr class="my-6 border-gray-300">
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
