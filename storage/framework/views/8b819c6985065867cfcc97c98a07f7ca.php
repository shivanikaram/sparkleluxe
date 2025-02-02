<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100">

    <div class="container mx-auto mt-12 max-w-4xl">

        <!-- Checkout Header -->
        <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Checkout</h1>

        <!-- Cart Summary -->
        <div class="bg-white shadow-lg rounded-lg p-6 mb-8">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Cart Summary</h2>
            <ul class="space-y-2">
                <?php
                    $totalPrice = 0; // Initialize total price variable
                ?>
                <?php $__currentLoopData = $cart; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="flex justify-between text-gray-600 text-lg">
                    <span><?php echo e($item['name']); ?> (x<?php echo e($item['quantity']); ?>)</span>
                    <span>$<?php echo e(number_format($item['price'], 2)); ?></span>
                </li>
                <?php
                    $totalPrice += $item['price'] * $item['quantity']; // Add item price * quantity to total
                ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <hr class="my-4 border-gray-300">
            <p class="text-xl font-semibold text-right text-gray-800">Total: $<?php echo e(number_format($totalPrice, 2)); ?></p>
        </div>

        


        <!-- Customer Details -->
        <div class="bg-white shadow-lg rounded-lg p-6">
            <h2 class="text-2xl font-semibold text-gray-700 mb-4">Customer Details</h2>
            <form id="orderForm" action="<?php echo e(route('checkout.placeOrder')); ?>" method="POST" onsubmit="return handleSubmit(event)">
                <?php echo csrf_field(); ?>

                <!-- Name -->
                <div class="mb-6">
                    <label for="name" class="block text-lg font-medium text-gray-700">Full Name</label>
                    <input type="text" id="name" name="name" required class="w-full border-2 border-gray-300 rounded-lg py-2 px-4 mt-2 focus:outline-none focus:border-green-500">
                </div>

                <!-- Email -->
                <div class="mb-6">
                    <label for="email" class="block text-lg font-medium text-gray-700">Email Address</label>
                    <input type="email" id="email" name="email" required class="w-full border-2 border-gray-300 rounded-lg py-2 px-4 mt-2 focus:outline-none focus:border-green-500">
                </div>

                <!-- Contact Number -->
                <div class="mb-6">
                    <label for="contact_number" class="block text-lg font-medium text-gray-700">Contact Number</label>
                    <input type="text" id="contact_number" name="contact_number" required class="w-full border-2 border-gray-300 rounded-lg py-2 px-4 mt-2 focus:outline-none focus:border-green-500">
                </div>

                <!-- Address -->
                <div class="mb-6">
                    <label for="address" class="block text-lg font-medium text-gray-700">Shipping Address</label>
                    <textarea id="address" name="address" required class="w-full border-2 border-gray-300 rounded-lg py-2 px-4 mt-2 focus:outline-none focus:border-green-500" rows="4"></textarea>
                </div>

                <!-- Payment Method -->
                <div class="mb-6">
                    <label for="payment_method" class="block text-lg font-medium text-gray-700">Payment Method</label>
                    <select id="payment_method" name="payment_method" required class="w-full border-2 border-gray-300 rounded-lg py-2 px-4 mt-2 focus:outline-none focus:border-green-500">
                        <option value="Cash on Delivery">Cash on Delivery</option>
                        <option value="Card on Delivery">Card on Delivery</option>
                    </select>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="w-full bg-gray-500 text-white text-lg font-semibold py-3 rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                    Place Order
                </button>
            </form>
        </div>

    </div>

    <!-- Success Modal -->
    <div id="successModal" class="hidden fixed inset-0 bg-gray-900 bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg shadow-lg p-6 max-w-sm text-center">
            <h2 class="text-lg font-bold mb-4 text-gray-800">Order Placed Successfully!</h2>
            <p class="mb-4 text-gray-600">Thank you for your order. You will be redirected shortly.</p>
            <button onclick="redirectToHome()" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Close
            </button>
        </div>
    </div>

    <script>
        // Function to handle successful order placement
        function showSuccessPopup() {
            const modal = document.getElementById("successModal");
            modal.classList.remove("hidden");
        }

        // Redirect to the home page
        function redirectToHome() {
            window.location.href = "<?php echo e(route('home')); ?>";
        }

        // Handle the form submission using AJAX
        async function handleSubmit(event) {
            event.preventDefault(); // Prevent the default form submission

            const form = event.target;
            const formData = new FormData(form);

            try {
                const response = await fetch(form.action, {
                    method: form.method,
                    body: formData,
                    headers: {
                        "X-Requested-With": "XMLHttpRequest", // Inform Laravel this is an AJAX request
                    },
                });

                if (response.ok) {
                    // Show the success popup on successful response
                    showSuccessPopup();

                    // Redirect to the home page after a delay
                    setTimeout(() => redirectToHome(), 3000);
                } else {
                    console.error("Order failed:", response.statusText);
                    alert("Failed to place the order. Please try again.");
                }
            } catch (error) {
                console.error("Error:", error);
                alert("An unexpected error occurred. Please try again.");
            }
        }
    </script>
</body>

</html>
<?php /**PATH C:\Users\HP\sparkleluxe\resources\views/checkout.blade.php ENDPATH**/ ?>