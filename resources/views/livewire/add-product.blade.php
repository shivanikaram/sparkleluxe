<section class="container mx-auto mt-20">
    <div class="w-full flex flex-col justify-center items-center bg-white p-4">
        <h2 class="block text-2xl font-semibold text-gray-800">Add Product</h2>
        <form wire:submit.prevent="addProduct" class="w-full max-w-full md:max-w-4xl space-y-6">
            @if (session()->has('message'))
                <div class="alert alert-success bg-gray-100 border border-gray-400 text-gray-700 px-4 py-2 rounded">
                    {{ session('message') }}
                </div>
            @endif

            <div>
                <label for="name" class="block text-lg font-normal text-gray-800">Product Name</label>
                <input type="text" id="name" wire:model="name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#616161]">
                @error('name')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="price" class="block text-lg font-normal text-gray-800">Price</label>
                <input type="number" step="0.01" id="price" wire:model="price" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#616161]">
                @error('price')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="stock" class="block text-lg font-normal text-gray-800">Stock</label>
                <input type="number" id="stock" wire:model="stock" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#616161]">
                @error('stock')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <div>
                <label for="image" class="block text-lg font-normal text-gray-800">Product Image</label>
                <input type="file" id="image" wire:model="image" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#616161]">
                @error('image')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
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
                        @foreach ($products as $product)
                            <tr class="border-t border-gray-200">
                                <td class="px-4 py-2 text-sm font-normal text-gray-900">{{ $product->name }}</td>
                                <td class="px-4 py-2 text-sm font-normal text-gray-900">${{ number_format($product->price, 2) }}</td>
                                <td class="px-4 py-2 text-sm font-normal text-gray-900">{{ $product->stock }}</td>
                                <td class="px-4 py-2 text-sm">
                                    @if ($product->image_path)
                                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="" class="w-32 h-32 object-contain rounded-md">
                                    @else
                                        <span class="text-gray-500">No Image</span>
                                    @endif
                                </td>
                                <td class="px-4 py-2 text-sm">
                                    <button wire:click="editProduct({{ $product->id }})" class="text-gray-500 hover:text-gray-700 focus:outline-none">Edit</button>
                                    <button wire:click="deleteProduct({{ $product->id }})" class="text-red-500 hover:text-red-700 focus:outline-none ml-2">Delete</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    @if ($showEditModal)
        <div class="fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center z-50">
            <div class="bg-white rounded-sm p-6 w-full sm:w-1/2 lg:w-1/3 shadow-lg">
                <h2 class="text-xl font-semibold mb-4">Edit Product</h2>
                <form wire:submit.prevent="updateProduct">
                    <div>
                        <label for="editName" class="block text-sm font-normal text-gray-800">Product Name</label>
                        <input type="text" id="editName" wire:model="name" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#616161]">
                        @error('name')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="editPrice" class="block text-sm font-normal text-gray-800">Price</label>
                        <input type="number" step="0.01" id="editPrice" wire:model="price" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#616161]">
                        @error('price')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label for="editStock" class="block text-sm font-normal text-gray-800">Stock</label>
                        <input type="number" id="editStock" wire:model="stock" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#616161]">
                        @error('stock')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="mt-6 flex justify-end">
                        <button type="button" wire:click="closeModal" class="py-2 px-4 bg-gray-400 text-white rounded-md hover:bg-gray-500 focus:outline-none">Cancel</button>
                        <button type="submit" class="ml-2 py-2 px-4 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none">Save</button>
                    </div>
                </form>
            </div>
        </div>
    @endif
</section>
