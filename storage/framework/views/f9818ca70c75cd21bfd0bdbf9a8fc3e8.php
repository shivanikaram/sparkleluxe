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
     <?php $__env->slot('header', null, []); ?>  <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-xl font-semibold text-center">Your Order History</h3>

                    <?php if($orders->isEmpty()): ?>
                        <p class="text-center mt-4">You have no orders yet.</p>
                    <?php else: ?>
                        <div class="space-y-6 mt-6">
                            <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="border rounded-sm p-6 bg-gray-100">
                                    <div class="flex justify-between items-center mb-4">
                                        <p class="text-xl font-semibold text-gray-800">Status:
                                            <span class="text-green-800"><?php echo e($order->status); ?></span>
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
                                                    <?php $__currentLoopData = json_decode($order->products_ordered, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <tr class="border-t text-sm">
                                                            <td class="px-4 py-2 text-gray-800"><?php echo e($order->id); ?></td>
                                                            <td class="px-4 py-2 text-gray-800"><?php echo e($product['name']); ?></td>
                                                            <td class="px-4 py-2 text-gray-800"><?php echo e($product['quantity']); ?></td>
                                                            <td class="px-4 py-2 text-gray-800"><?php echo e($order->payment_method); ?></td>
                                                            <td class="px-4 py-2 text-gray-800"><?php echo e($order->created_at->format('Y-m-d')); ?></td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <!-- Vertical List for smaller screens -->
                                    <div class="sm:hidden space-y-4">
                                        <?php $__currentLoopData = json_decode($order->products_ordered, true); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="border-t py-4">
                                                <p class="text-gray-800"><strong>Order ID:</strong> <?php echo e($order->id); ?></p>
                                                <p class="text-gray-800"><strong>Product:</strong> <?php echo e($product['name']); ?></p>
                                                <p class="text-gray-800"><strong>Quantity:</strong> <?php echo e($product['quantity']); ?></p>
                                                <p class="text-gray-800"><strong>Payment Method:</strong> <?php echo e($order->payment_method); ?></p>
                                                <p class="text-gray-800"><strong>Order Date:</strong> <?php echo e($order->created_at->format('Y-m-d')); ?></p>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>

                                    <div class="flex justify-end mt-4">
                                        <p class="text-lg font-normal text-red-600">
                                            <span class="text-gray-600">Total Price:</span> $<?php echo e(number_format($order->total_price, 2)); ?>

                                        </p>
                                    </div>
                                </div>
                                <hr class="my-6 border-gray-300">
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php endif; ?>
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
<?php /**PATH C:\Users\HP\sparkleluxe\resources\views/dashboard.blade.php ENDPATH**/ ?>