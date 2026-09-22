<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-6 rounded-2xl w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-black mb-4">Create an Account</h2>
        <p class="text-center text-gray-700 mb-6">Sign up to get started with our platform.</p>

        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-800">Name</label>
                <input id="name" type="text" name="name" 
                    value="{{ old('name') }}" required autofocus autocomplete="name"
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 sm:text-sm">
                @error('name')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-800">Email</label>
                <input id="email" type="email" name="email" 
                    value="{{ old('email') }}" required autocomplete="username"
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 sm:text-sm">
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-800">Password</label>
                <input id="password" type="password" name="password" required
                    autocomplete="new-password"
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 sm:text-sm">
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Confirm Password -->
            <div class="mb-4">
                <label for="password_confirmation" class="block text-sm font-medium text-gray-800">Confirm Password</label>
                <input id="password_confirmation" type="password" name="password_confirmation" 
                    required autocomplete="new-password"
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 sm:text-sm">
                @error('password_confirmation')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between mb-6">
                <a href="{{ route('login') }}" 
                    class="text-sm text-gray-600 hover:underline hover:text-gray-800">
                    Already registered? Login Here
                </a>
            </div>

            <!-- Submit Button -->
            <div>
                <button type="submit" 
                    class="w-full bg-gray-500 text-white py-3 px-6 rounded-lg text-sm font-semibold hover:bg-gray-600 transition duration-300">
                    Register
                </button>
            </div>
        </form>
    </div>
</body>
</html>
