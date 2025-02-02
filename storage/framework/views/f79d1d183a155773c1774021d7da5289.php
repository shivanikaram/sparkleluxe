<section class="container mx-auto mt-20">
    <div class="w-full flex flex-col justify-center items-center bg-white p-4">
        <h2 class="block text-2xl font-semibold text-gray-800">Add Product</h2>
        <form wire:submit.prevent="addProduct" class="w-full max-w-full md:max-w-4xl space-y-6">
            <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
                <div class="alert alert-success bg-gray-100 border border-gray-400 text-gray-700 px-4 py-2 rounded">
                    <?php echo e(session('message')); ?>

                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

            <div>
                <label for="name" class="block text-lg font-normal text-gray-800">Product Name</label>
                <input type="text" id="name" wire:model="name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#616161]">
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            <div>
                <label for="price" class="block text-lg font-normal text-gray-800">Price</label>
                <input type="number" step="0.01" id="price" wire:model="price" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#616161]">
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            <div>
                <label for="stock" class="block text-lg font-normal text-gray-800">Stock</label>
                <input type="number" id="stock" wire:model="stock" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#616161]">
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            <div>
                <label for="image" class="block text-lg font-normal text-gray-800">Product Image</label>
                <input type="file" id="image" wire:model="image" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#616161]">
                <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            <button type="submit" class="w-full py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-[#616161]">Add Product</button>
        </form>

        <br>

        <div class="mt-8 w-full max-w-full md:max-w-4xl">
            <h3 class="text-2xl font-semibold mb-4">Product List</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full table-auto border-collapse border border-gray-300">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-left text-lg font-medium text-gray-700">Name</th>
                            <th class="px-4 py-2 text-left text-lg font-medium text-gray-700">Price</th>
                            <th class="px-4 py-2 text-left text-lg font-medium text-gray-700">Stock</th>
                            <th class="px-4 py-2 text-left text-lg font-medium text-gray-700">Image</th>
                            <th class="px-4 py-2 text-left text-lg font-medium text-gray-700">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr class="border-t border-gray-200">
                                <td class="px-4 py-2 text-sm font-normal text-gray-900"><?php echo e($product->name); ?></td>
                                <td class="px-4 py-2 text-sm font-normal text-gray-900">$<?php echo e(number_format($product->price, 2)); ?></td>
                                <td class="px-4 py-2 text-sm font-normal text-gray-900"><?php echo e($product->stock); ?></td>
                                <td class="px-4 py-2 text-sm">
                                    <!--[if BLOCK]><![endif]--><?php if($product->image_path): ?>
                                        <img src="<?php echo e(asset('storage/' . $product->image_path)); ?>" alt="" class="w-32 h-32 object-contain rounded-md">
                                    <?php else: ?>
                                        <span class="text-gray-500">No Image</span>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </td>
                                <td class="px-4 py-2 text-sm">
                                    <button wire:click="editProduct(<?php echo e($product->id); ?>)" class="text-gray-500 hover:text-gray-700 focus:outline-none">Edit</button>
                                    <button wire:click="deleteProduct(<?php echo e($product->id); ?>)" class="text-red-500 hover:text-red-700 focus:outline-none ml-2">Delete</button>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <!--[if BLOCK]><![endif]--><?php if($showEditModal): ?>
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-sm p-6 w-full sm:w-1/2 lg:w-1/3 shadow-lg">
                <h2 class="text-xl font-semibold mb-4">Edit Product</h2>
                <form wire:submit.prevent="updateProduct">
                    <div>
                        <label for="editName" class="block text-sm font-normal text-gray-800">Product Name</label>
                        <input type="text" id="editName" wire:model="name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#616161]">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>

                    <div class="mt-4">
                        <label for="editPrice" class="block text-sm font-normal text-gray-800">Price</label>
                        <input type="number" step="0.01" id="editPrice" wire:model="price" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#616161]">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['price'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>

                    <div class="mt-4">
                        <label for="editStock" class="block text-sm font-normal text-gray-800">Stock</label>
                        <input type="number" id="editStock" wire:model="stock" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#616161]">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['stock'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="text-red-500 text-sm"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="button" wire:click="closeModal" class="py-2 px-4 bg-gray-400 text-white rounded-md hover:bg-gray-500 focus:outline-none">Cancel</button>
                        <button type="submit" class="ml-2 py-2 px-4 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none">Save</button>
                    </div>
                </form>
            </div>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
</section>
<?php /**PATH C:\Users\HP\sparkleluxe\resources\views/livewire/add-product.blade.php ENDPATH**/ ?>