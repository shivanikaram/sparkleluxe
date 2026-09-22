<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
<header class="flex justify-between items-center py-0 px-6 w-full absolute top-0 left-0 z-10 bg-opacity-90 bg-black">
        <!-- Logo -->
        <div class="flex items-center space-x-4 lg:pl-8">
            <img src="\images\logo.png" alt="SparkleLuxe Logo" class="max-h-20 w-auto">
        </div>

        <nav id="navbar-links" class="hidden lg:pr-20 lg:flex space-x-8">
            <a
                href="{{ url('/') }}"
                class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Home
            </a>
            <a
                href="{{ url('/products') }}"
                class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                View Products
            </a>
            <a
                href="{{ route('services') }}"
                class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:hover:text-white/80 dark:focus-visible:ring-white"
            >
                Our Services
            </a>
            @if (Route::has('login'))
                <div class="flex space-x-8">
                    @auth
                        @if (auth()->user()->usertype == 'admin')
                            <a
                                href="{{ url('admin/dashboard') }}"
                                class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Admin Dashboard
                            </a>
                        @else
                            <a
                                href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Dashboard
                            </a>
                        @endif
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 text-white ring-1 ring-transparent transition hover:text-white/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:hover:text-white/80 dark:focus-visible:ring-white"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </nav>

        <!-- Hamburger Icon (Visible on small screens) -->
        <button id="hamburger-icon" class="lg:hidden text-white focus:outline-none">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>

        <!-- Mobile Navbar Links -->
        <div id="mobile-navbar" class="hidden fixed inset-0 bg-black bg-opacity-90 flex flex-col items-center space-y-6 z-50 lg:hidden">
            <button id="close-mobile-navbar" class="absolute top-4 right-4 text-white text-3xl focus:outline-none">
                &times;
            </button>
            <a
                href="{{ url('/') }}"
                class="text-white text-sm font-normal hover:underline"
            >
                Home
            </a>
            <a
                href="{{ url('/products') }}"
                class="text-white text-sm font-normal hover:underline"
            >
                View Products
            </a>
            <a
                href="{{ url('/services') }}"
                class="text-white text-sm font-normal hover:underline"
            >
                Our Services
            </a>
            @if (Route::has('login'))
                <div class="flex flex-col items-center space-y-6">
                    @auth
                        @if (auth()->user()->usertype == 'admin')
                            <a
                                href="{{ url('admin/dashboard') }}"
                                class="text-white text-sm font-normal hover:underline"
                            >
                                Admin Dashboard
                            </a>
                        @else
                            <a
                                href="{{ url('/dashboard') }}"
                                class="text-white text-sm font-normal hover:underline"
                            >
                                Dashboard
                            </a>
                        @endif
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="text-white text-sm font-normal hover:underline"
                        >
                            Log in
                        </a>
                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="text-white text-sm font-normal hover:underline"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </header>

    <div class="bg-white p-6 rounded-2xl w-full max-w-md">
        <h2 class="text-3xl font-bold text-center text-black mb-4">Welcome Back!</h2>
        <p class="text-center text-gray-700 mb-6">Log in to access your account.</p>
        
        <!-- Session Status -->
        @if (session('status'))
            <div class="mb-4 text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-800">Email</label>
                <input id="email" type="email" name="email" 
                    value="{{ old('email') }}" required autofocus
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 sm:text-sm">
                @error('email')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-800">Password</label>
                <input id="password" type="password" name="password" required
                    class="mt-1 block w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 sm:text-sm">
                @error('password')
                    <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center mb-4">
                <input id="remember_me" type="checkbox" name="remember" 
                    class="h-4 w-4 text-gray-600 border-gray-300 rounded focus:ring-gray-500">
                <label for="remember_me" class="ml-2 text-sm text-gray-700">Remember Me</label>
            </div>

            <!-- Actions -->
            <div class="flex items-center justify-between">
                @if (Route::has('password.request'))
                    <a href="{{ route('password.request') }}" 
                        class="text-sm text-gray-600 hover:underline hover:text-gray-800">
                        Forgot Password?
                    </a>
                @endif
            </div>

            <!-- Submit Button -->
            <div class="mt-6">
                <button type="submit" 
                    class="w-full bg-gray-500 text-white py-3 px-6 rounded-lg text-sm font-semibold hover:bg-gray-600 transition duration-300">
                    Log In
                </button>
            </div>
        </form>

        <div class="mt-6 text-center">
            <p class="text-gray-600 text-sm">Don't have an account? 
                <a href="{{ route('register') }}" class="text-gray-700 font-medium hover:underline hover:text-black">Sign Up</a>
            </p>
        </div>
    </div>

    <!-- JavaScript for hamburger icon -->
    <script>
            const hamburgerIcon = document.getElementById('hamburger-icon');
            const mobileNavbar = document.getElementById('mobile-navbar');
            const closeMobileNavbar = document.getElementById('close-mobile-navbar');

            hamburgerIcon.addEventListener('click', () => {
                mobileNavbar.classList.remove('hidden');
            });

            closeMobileNavbar.addEventListener('click', () => {
                mobileNavbar.classList.add('hidden');
            });
        </script>
        
</body>
</html>
