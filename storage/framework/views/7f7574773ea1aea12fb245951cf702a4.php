<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
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
                            <p class="text-xl font-bold text-yellow-700">$<?php echo e(number_format($totalSales, 2)); ?></p>
                        </div>

                        <!-- Total Orders -->
                        <div class="bg-gray-200 p-4 rounded-md">
                            <h2 class="text-lg font-medium">Total Orders</h2>
                            <p class="text-xl font-bold text-yellow-700"><?php echo e($totalOrders); ?></p>
                        </div>

                        <!-- Total Processing Orders -->
                        <div class="bg-gray-200 p-4 rounded-md">
                            <h2 class="text-lg font-medium">Total Processing Orders</h2>
                            <p class="text-xl font-bold text-yellow-700"><?php echo e($totalProcessingOrders); ?></p>
                        </div>

                        <!-- Total Completed Orders -->
                        <div class="bg-gray-200 p-4 rounded-md">
                            <h2 class="text-lg font-medium">Total Completed Orders</h2>
                            <p class="text-xl font-bold text-yellow-700"><?php echo e($totalCompletedOrders); ?></p>
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
                                <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr>
                                        <td class="border px-4 py-2"><?php echo e($order->id); ?></td>
                                        <td class="border px-4 py-2"><?php echo e($order->customer_name); ?></td>
                                        <td class="border px-4 py-2">$<?php echo e(number_format($order->total_price, 2)); ?></td>
                                        <!-- Display the products ordered -->
                                        <td class="border px-4 py-2">
                                            <?php $__currentLoopData = json_decode($order->products_ordered); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <div><?php echo e($product->name); ?> (Qty: <?php echo e($product->quantity); ?>)</div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </td>
                                        <td class="border px-4 py-2"><?php echo e($order->payment_method); ?></td>
                                        <td class="border px-4 py-2"><?php echo e($order->created_at->format('Y-m-d')); ?></td>

                                        <!-- Status Dropdown Form -->
                                        <td class="border px-4 py-2">
                                            <form action="<?php echo e(route('orders.update-status', $order->id)); ?>" method="POST">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('PATCH'); ?>

                                                <select name="status" onchange="this.form.submit()" class="border rounded">
                                                    <option value="Processing" <?php echo e($order->status == 'Processing' ? 'selected' : ''); ?>>Processing</option>
                                                    <option value="Completed" <?php echo e($order->status == 'Completed' ? 'selected' : ''); ?>>Completed</option>
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
                                                    <p><strong>Email:</strong> <?php echo e($order->customer_email); ?></p>
                                                    <p><strong>Contact:</strong> <?php echo e($order->customer_contact); ?></p>
                                                </div>
                                            </details>
                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                    <!-- Order Details for Smaller Screens -->
                    <div class="sm:hidden">
                        <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="border p-4 mb-4">
                                <h3 class="text-lg font-semibold">Order ID: <?php echo e($order->id); ?></h3>
                                <p><strong>Customer Name:</strong> <?php echo e($order->customer_name); ?></p>
                                <p><strong>Total Price:</strong> $<?php echo e(number_format($order->total_price, 2)); ?></p>

                                <!-- Display Products Ordered -->
                                <p><strong>Products Ordered:</strong></p>
                                <?php $__currentLoopData = json_decode($order->products_ordered); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div><?php echo e($product->name); ?> (Qty: <?php echo e($product->quantity); ?>)</div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <p><strong>Payment Method:</strong> <?php echo e($order->payment_method); ?></p>
                                <p><strong>Order Date:</strong> <?php echo e($order->created_at->format('Y-m-d')); ?></p>

                                <!-- Status Dropdown Form -->
                                <div class="mt-2">
                                    <form action="<?php echo e(route('orders.update-status', $order->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PATCH'); ?>

                                        <select name="status" onchange="this.form.submit()" class="border rounded w-full">
                                            <option value="Processing" <?php echo e($order->status == 'Processing' ? 'selected' : ''); ?>>Processing</option>
                                            <option value="Completed" <?php echo e($order->status == 'Completed' ? 'selected' : ''); ?>>Completed</option>
                                        </select>
                                    </form>
                                </div>

                                <!-- Contact Info Column Using <details> -->
                                <details class="mt-2">
                                    <summary class="cursor-pointer text-gray-600 hover:underline">
                                        View Contact Info
                                    </summary>
                                    <div class="mt-2 p-2 border border-gray-300 rounded bg-gray-50">
                                        <p><strong>Email:</strong> <?php echo e($order->customer_email); ?></p>
                                        <p><strong>Contact:</strong> <?php echo e($order->customer_contact); ?></p>
                                    </div>
                                </details>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>

                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\HP\sparkleluxe\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>