<main class="container mx-auto p-8">
    <div class="flex flex-wrap -mx-4">
        @foreach($products as $product)
            <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 px-4 mb-8">
                <div class="bg-white overflow-hidden h-full flex flex-col justify-between">
                    <!-- Product Image -->
                    <a href="{{ asset('storage/' . $product->image_path) }}">
                        <img src="{{ asset('storage/' . $product->image_path) }}" alt="{{ $product->name }}" class="w-full h-60 object-cover">
                    </a>

                    <!-- Product Details -->
                    <div class="p-4 flex flex-col justify-center items-center text-center">
                        <h2 class="text-sm font-semibold">{{ $product->name }}</h2>
                        <h2 class="text-sm font-normal">${{ $product->price }}</h2>

                        <!-- Add to Cart Button -->
                        <form action="{{ route('cart.add') }}" method="POST" class="mt-4">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <input type="hidden" name="quantity" value="1">
                            <button type="submit" class="bg-gray-100 text-gray-500 hover:text-gray-700 hover:underline py-2 px-4 rounded">
                                Add to Cart
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</main>
