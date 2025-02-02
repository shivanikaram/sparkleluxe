<x-app-layout>
    <div class="py-28">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-xl font-semibold">Welcome, Admin!</h1>
                    <br>

                    <!-- Stats Row: Total Sales, Total Orders, Total Processing, Total Completed Orders -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6">
                        <!-- Total Sales -->
                        <div class="bg-gray-200 p-4 rounded-md">
                            <h2 class="text-lg font-medium">Total Sales</h2>
                            <p class="text-xl font-bold text-yellow-700">${{ number_format($totalSales, 2) }}</p>
                        </div>

                        <!-- Total Orders -->
                        <div class="bg-gray-200 p-4 rounded-md">
                            <h2 class="text-lg font-medium">Total Orders</h2>
                            <p class="text-xl font-bold text-yellow-700">{{ $totalOrders }}</p>
                        </div>

                        <!-- Total Processing Orders -->
                        <div class="bg-gray-200 p-4 rounded-md">
                            <h2 class="text-lg font-medium">Total Processing Orders</h2>
                            <p class="text-xl font-bold text-yellow-700">{{ $totalProcessingOrders }}</p>
                        </div>

                        <!-- Total Completed Orders -->
                        <div class="bg-gray-200 p-4 rounded-md">
                            <h2 class="text-lg font-medium">Total Completed Orders</h2>
                            <p class="text-xl font-bold text-yellow-700">{{ $totalCompletedOrders }}</p>
                        </div>
                    </div>

                    <br>

                    <h2 class="mt-8 text-lg font-medium text-center underline">Order List</h2>
                    
                    <!-- Order Table for Larger Screens -->
                    <div class="hidden sm:block">
                        <table class="min-w-full mt-4 border-collapse">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border px-4 py-2">Order ID</th>
                                    <th class="border px-4 py-2">Customer Name</th>
                                    <th class="border px-4 py-2">Total Price</th>
                                    <th class="border px-4 py-2">Products Ordered</th>
                                    <th class="border px-4 py-2">Payment Method</th>
                                    <th class="border px-4 py-2">Order Date</th>
                                    <th class="border px-4 py-2">Status</th>
                                    <th class="border px-4 py-2">Contact Info</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-700">
                                @foreach ($orders as $order)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $order->id }}</td>
                                        <td class="border px-4 py-2">{{ $order->customer_name }}</td>
                                        <td class="border px-4 py-2">${{ number_format($order->total_price, 2) }}</td>
                                        <!-- Display the products ordered -->
                                        <td class="border px-4 py-2">
                                            @foreach (json_decode($order->products_ordered) as $product)
                                                <div>{{ $product->name }} (Qty: {{ $product->quantity }})</div>
                                            @endforeach
                                        </td>
                                        <td class="border px-4 py-2">{{ $order->payment_method }}</td>
                                        <td class="border px-4 py-2">{{ $order->created_at->format('Y-m-d') }}</td>

                                        <!-- Status Dropdown Form -->
                                        <td class="border px-4 py-2">
                                            <form action="{{ route('orders.update-status', $order->id) }}" method="POST">
                                                @csrf
                                                @method('PATCH')

                                                <select name="status" onchange="this.form.submit()" class="border rounded">
                                                    <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                                    <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                                </select>
                                            </form>
                                        </td>

                                        <!-- Contact Info Column Using <details> -->
                                        <td class="border px-4 py-2 text-center">
                                            <details>
                                                <summary class="cursor-pointer text-gray-600 hover:underline">
                                                    View
                                                </summary>
                                                <div class="mt-2 p-2 border border-gray-300 rounded bg-gray-50">
                                                    <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                                                    <p><strong>Contact:</strong> {{ $order->customer_contact }}</p>
                                                </div>
                                            </details>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Order Details for Smaller Screens -->
                    <div class="sm:hidden">
                        @foreach ($orders as $order)
                            <div class="border p-4 mb-4">
                                <h3 class="text-lg font-semibold">Order ID: {{ $order->id }}</h3>
                                <p><strong>Customer Name:</strong> {{ $order->customer_name }}</p>
                                <p><strong>Total Price:</strong> ${{ number_format($order->total_price, 2) }}</p>

                                <!-- Display Products Ordered -->
                                <p><strong>Products Ordered:</strong></p>
                                @foreach (json_decode($order->products_ordered) as $product)
                                    <div>{{ $product->name }} (Qty: {{ $product->quantity }})</div>
                                @endforeach

                                <p><strong>Payment Method:</strong> {{ $order->payment_method }}</p>
                                <p><strong>Order Date:</strong> {{ $order->created_at->format('Y-m-d') }}</p>

                                <!-- Status Dropdown Form -->
                                <div class="mt-2">
                                    <form action="{{ route('orders.update-status', $order->id) }}" method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <select name="status" onchange="this.form.submit()" class="border rounded w-full">
                                            <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                                            <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                                        </select>
                                    </form>
                                </div>

                                <!-- Contact Info Column Using <details> -->
                                <details class="mt-2">
                                    <summary class="cursor-pointer text-gray-600 hover:underline">
                                        View Contact Info
                                    </summary>
                                    <div class="mt-2 p-2 border border-gray-300 rounded bg-gray-50">
                                        <p><strong>Email:</strong> {{ $order->customer_email }}</p>
                                        <p><strong>Contact:</strong> {{ $order->customer_contact }}</p>
                                    </div>
                                </details>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
