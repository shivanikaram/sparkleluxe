<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
        <style>
                /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.absolute{position:absolute}.relative{position:relative}.-left-20{left:-5rem}.top-0{top:0px}.-bottom-16{bottom:-4rem}.-left-16{left:-4rem}.-mx-3{margin-left:-0.75rem;margin-right:-0.75rem}.mt-4{margin-top:1rem}.mt-6{margin-top:1.5rem}.flex{display:flex}.grid{display:grid}.hidden{display:none}.aspect-video{aspect-ratio:16 / 9}.size-12{width:3rem;height:3rem}.size-5{width:1.25rem;height:1.25rem}.size-6{width:1.5rem;height:1.5rem}.h-12{height:3rem}.h-40{height:10rem}.h-full{height:100%}.min-h-screen{min-height:100vh}.w-full{width:100%}.w-\[calc\(100\%\+8rem\)\]{width:calc(100% + 8rem)}.w-auto{width:auto}.max-w-\[877px\]{max-width:877px}.max-w-2xl{max-width:42rem}.flex-1{flex:1 1 0%}.shrink-0{flex-shrink:0}.grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.flex-col{flex-direction:column}.items-start{align-items:flex-start}.items-center{align-items:center}.items-stretch{align-items:stretch}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.gap-2{gap:0.5rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.self-center{align-self:center}.overflow-hidden{overflow:hidden}.rounded-\[10px\]{border-radius:10px}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:0.5rem}.rounded-md{border-radius:0.375rem}.rounded-sm{border-radius:0.125rem}.bg-\[\#FF2D20\]\/10{background-color:rgb(255 45 32 / 0.1)}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gradient-to-b{background-image:linear-gradient(to bottom, var(--tw-gradient-stops))}.from-transparent{--tw-gradient-from:transparent var(--tw-gradient-from-position);--tw-gradient-to:rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-white{--tw-gradient-to:rgb(255 255 255 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)}.to-white{--tw-gradient-to:#fff var(--tw-gradient-to-position)}.stroke-\[\#FF2D20\]{stroke:#FF2D20}.object-cover{object-fit:cover}.object-top{object-position:top}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.px-3{padding-left:0.75rem;padding-right:0.75rem}.py-16{padding-top:4rem;padding-bottom:4rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.pt-3{padding-top:0.75rem}.text-center{text-align:center}.font-sans{font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-sm\/relaxed{font-size:0.875rem;line-height:1.625}.text-xl{font-size:1.25rem;line-height:1.75rem}.font-semibold{font-weight:600}.text-black{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-\[0px_14px_34px_0px_rgba\(0\2c 0\2c 0\2c 0\.08\)\]{--tw-shadow:0px 14px 34px 0px rgba(0,0,0,0.08);--tw-shadow-colored:0px 14px 34px 0px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.ring-transparent{--tw-ring-color:transparent}.ring-white\/\[0\.05\]{--tw-ring-color:rgb(255 255 255 / 0.05)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.06\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.06));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.25\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.25));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.transition{transition-property:color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.duration-300{transition-duration:300ms}.selection\:bg-\[\#FF2D20\] *::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-\[\#FF2D20\]::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-black:hover{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.hover\:text-black\/70:hover{color:rgb(0 0 0 / 0.7)}.hover\:ring-black\/20:hover{--tw-ring-color:rgb(0 0 0 / 0.2)}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.focus-visible\:ring-1:focus-visible{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}@media (min-width: 640px){.sm\:size-16{width:4rem;height:4rem}.sm\:size-6{width:1.5rem;height:1.5rem}.sm\:pt-5{padding-top:1.25rem}}@media (min-width: 768px){.md\:row-span-3{grid-row:span 3 / span 3}}@media (min-width: 1024px){.lg\:col-start-2{grid-column-start:2}.lg\:h-16{height:4rem}.lg\:max-w-7xl{max-width:80rem}.lg\:grid-cols-3{grid-template-columns:repeat(3, minmax(0, 1fr))}.lg\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.lg\:flex-col{flex-direction:column}.lg\:items-end{align-items:flex-end}.lg\:justify-center{justify-content:center}.lg\:gap-8{gap:2rem}.lg\:p-10{padding:2.5rem}.lg\:pb-10{padding-bottom:2.5rem}.lg\:pt-0{padding-top:0px}.lg\:text-\[\#FF2D20\]{--tw-text-opacity:1;color:rgb(255 45 32 / var(--tw-text-opacity))}}@media (prefers-color-scheme: dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:bg-black{--tw-bg-opacity:1;background-color:rgb(0 0 0 / var(--tw-bg-opacity))}.dark\:bg-zinc-900{--tw-bg-opacity:1;background-color:rgb(24 24 27 / var(--tw-bg-opacity))}.dark\:via-zinc-900{--tw-gradient-to:rgb(24 24 27 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)}.dark\:to-zinc-900{--tw-gradient-to:#18181b var(--tw-gradient-to-position)}.dark\:text-white\/50{color:rgb(255 255 255 / 0.5)}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-white\/70{color:rgb(255 255 255 / 0.7)}.dark\:ring-zinc-800{--tw-ring-opacity:1;--tw-ring-color:rgb(39 39 42 / var(--tw-ring-opacity))}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:hover\:text-white\/70:hover{color:rgb(255 255 255 / 0.7)}.dark\:hover\:text-white\/80:hover{color:rgb(255 255 255 / 0.8)}.dark\:hover\:ring-zinc-700:hover{--tw-ring-opacity:1;--tw-ring-color:rgb(63 63 70 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-white:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 255 255 / var(--tw-ring-opacity))}}
            </style>
        @endif
    </head>
    <br><br><br>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <!-- Navbar -->
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

        <div class="relative flex items-center">
            <a href="{{ url('/cart') }}" class="text-white text-2xl relative">
                <i class="fas fa-shopping-cart"></i>
                @if (session('cart') && count(session('cart')) > 0)
                    <span class="absolute top-0 right-0 bg-red-500 text-white text-xs px-1 py-0.5 rounded-full">
                        {{ count(session('cart')) }}
                    </span>
                @endif
            </a>
        </div>

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


    <!-- Main Topics -->

    <div class="pt-10">
            <h2 class="text-xl font-semibold text-center md:text-xl lg:text-xl">OUR SERVICES</h2>
            <br>
            <h2 class="text-l font-normal text-center md:text-l lg:text-l">Online | In Store Services</h2>
        </div>

        <br>

        <div class="pt-10">
            <h2 class="text-2xl font-semibold text-center md:text-2xl lg:text-2xl">Personalization</h2>

    
            <div class="w-full text-center font-inria-serif-italic text-lg font-normal mt-4 py-4">
                Personalize your own order according to your own choice
            </div>
        </div>

    <!-- Personalization -->
    <main class="container mx-auto p-8">
        <div class="flex flex-wrap justify-center gap-16">
            <div class="bg-white overflow-hidden w-full sm:w-1/2 max-w-sm flex flex-col">
                <img src="IMAGES\Personalization1.jpg" alt="Placeholder Image" class="w-full h-80 object-cover">
                <div class="p-4 flex flex-col justify-center items-center text-center">
                    <h2 class="text-xl font-semibold">Customized Designs</h2>
                    <h3 class="text-lg font-normal mt-2">Each piece of fine jewelry is customized according to our customers' wishes. This includes adding customized pendants and incorporating various styles of charms to the jewelry pieces.</h3>
                </div>
            </div>
            <div class="bg-white overflow-hidden w-full sm:w-1/2 max-w-sm flex flex-col">
                <img src="IMAGES\Personalization2.jpg" alt="Placeholder Image" class="w-full h-80 object-cover">
                <div class="p-4 flex flex-col justify-center items-center text-center">
                    <h2 class="text-xl font-semibold">Engraving Services</h2>
                    <h3 class="text-lg font-normal mt-2">Add a personal touch with our exquisite engraving services. We can engrave meaningful messages, dates, or initials onto your chosen jewelry piece, making it truly unique and cherished.</h3>
                </div>
            </div>
        </div>
    </main>

    <!-- Gift Packaging -->

    <div class="pt-20">
        <h2 class="text-2xl font-semibold text-center md:text-2xl lg:text-2xl">Gift Packaging</h2>


        <div class="w-full text-center font-inria-serif-italic text-lg font-normal mt-4 py-4">
            Present your loved ones with the valuable gift inside covered with an attractive wrap.
        </div>
    </div>


    <main class="container mx-auto p-8">
        <div class="flex flex-wrap justify-center gap-16">
            <div class="bg-white overflow-hidden w-full sm:w-1/2 max-w-sm flex flex-col">
                <img src="IMAGES\PackagingServicesPage.jpg" alt="Placeholder Image" class="w-full h-80 object-cover">
                <div class="p-4 flex flex-col justify-center items-center text-center">
                    <h2 class="text-xl font-semibold">Paper-Tote Bag</h2>
                    <h3 class="text-lg font-normal mt-2">It is especially made by papers and cardboard, for its stylish, reusable and eco-friendly appeal that gives you an elegant presenting way</h3>
                 </div>
            </div>
            <div class="bg-white overflow-hidden w-full sm:w-1/2 max-w-sm flex flex-col">
                <img src="IMAGES\PackagingServicesPage2.jpg" alt="Placeholder Image" class="w-full h-80 object-cover">
                <div class="p-4 flex flex-col justify-center items-center text-center">
                    <h2 class="text-xl font-semibold">Gift Box</h2>
                    <h3 class="text-lg font-normal mt-2">The exclusive gift box is wrapped using our store’s unique container that provides you a luxury way of gifting</h3>
                </div>
            </div>
        </div>
      </main>

    

      <div class="pt-8 text-center">
        <h2 class="text-2xl font-semibold text-center md:text-2xl lg:text-2xl">Contact us to get your services done</h2>
        <br>
        <a href="callto:+94771234567" class="text-lg text-green-900 underline hover:text-green-700 block mb-2">+ Contact Us</a>
        <br>
        <a href="mailto:sparkleluxe@gmail.com" class="text-lg text-green-900 underline hover:text-green-700">+ Email Us</a>
        <br>
       <br>
        <h3 class="text-xl font-normal text-center md:text-l lg:text-l">Keep exploring to get your unique product on your hands</h3>
        <br><br>
    </div>
<!-- footer -->

<footer class="bg-black w-full">
    <div class="pl-20 pr-6 py-12 max-w-full mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-16">
        <div class="space-y-4">
        <h3 class="text-2xl font-bold text-white mb-4">Sparkle Luxe</h3>
        <p class="text-custom-gray mb-4">Stay updated on our latest collections and exclusive offers. Sign up for our newsletter.</p>
        <p class="text-custom-gray mb-4">Follow us on Social media platforms for the latest trends and updates.</p>
        <div class="flex space-x-4 text-3xl text-white">
            <a href="https://facebook.com" class="hover:text-blue-600"><i class="fab fa-facebook-square"></i></a>
            <a href="https://twitter.com" class="hover:text-blue-400"><i class="fab fa-twitter-square"></i></a>
            <a href="https://instagram.com" class="hover:text-pink-600"><i class="fab fa-instagram"></i></a>
            <a href="https://youtube.com" class="hover:text-red-600"><i class="fab fa-youtube"></i></a>
        </div>
        <p class="text-custom-gray mb-4">Contact Us</p>
        <p class="text-custom-gray mb-4">0771234567</p>
        <p class="text-custom-gray mb-4"><a href="mailto:sparkleluxe@gmail.com" class="text-custom-gray hover:underline">Mail Us</a></p>
        </div>
        <div class="space-y-4">
        <h4 class="text-xl font-semibold text-white mb-4">Company</h4>
        <p class="text-custom-gray cursor-pointer hover:text-gray-300 mb-4">About Us</p>
        <p class="text-custom-gray cursor-pointer hover:text-gray-300 mb-4">Our Team</p>
        <p class="text-custom-gray cursor-pointer hover:text-gray-300 mb-4">Blog</p>
        </div>
        <div class="space-y-4">
        <h4 class="text-xl font-semibold text-white mb-4">Legal</h4>
        <p class="text-custom-gray cursor-pointer hover:text-gray-300 mb-4">FAQs</p>
        <p class="text-custom-gray cursor-pointer hover:text-gray-300 mb-4">Terms & Conditions</p>
        <p class="text-custom-gray cursor-pointer hover:text-gray-300 mb-4">Privacy Policy</p>
        </div>
        <div class="space-y-4">
        <h4 class="text-xl font-semibold text-white mb-4">Resources</h4>
        <p class="text-custom-gray cursor-pointer hover:text-gray-300 mb-4">Social Media</p>
        <p class="text-custom-gray cursor-pointer hover:text-gray-300 mb-4">Help Center</p>
        <p class="text-custom-gray cursor-pointer hover:text-gray-300 mb-4">Partnerships</p>
        </div>
    </div>
    <div class="text-custom-gray text-center py-4">
        <p>&copy; 2024 Sparkle Luxe. All rights reserved.</p>
    </div>
    </footer>


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
 
