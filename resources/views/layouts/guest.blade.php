<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Homespire') }} - Inspirasi Desain Interior Indonesia</title>

    <!-- Google Fonts: Inter (sans) & Playfair Display (serif) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles

    <!-- Menyembunyikan elemen x-cloak sebelum Alpine siap -->
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<body class="bg-base-100 text-base-content font-sans antialiased transition-colors duration-300">

    <div class="min-h-screen flex">
        <!-- Left Side - Image/Branding -->
        <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-primary to-secondary relative overflow-hidden">
            <div class="absolute inset-0 bg-black/20"></div>
            <div class="relative z-10 flex flex-col justify-between p-12 text-white">
                <div>
                    <a href="{{ url('/') }}" class="text-4xl font-serif font-bold text-white hover:text-white/90 transition-colors">
                        Homespire
                    </a>
                    <p class="mt-2 text-white/90">Platform Inspirasi Desain Interior & Rumah Indonesia</p>
                </div>
                <div class="space-y-6">
                    <h2 class="text-3xl font-serif font-bold text-white">
                        Wujudkan Rumah Impianmu
                    </h2>
                    <p class="text-lg text-white/90">
                        Temukan ribuan inspirasi desain interior untuk membuat rumah Anda lebih indah dan nyaman.
                    </p>
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-white shrink-0 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <div>
                            <h4 class="font-medium text-white">Gratis & Mudah</h4>
                            <p class="text-sm text-white/80">Akses ribuan inspirasi tanpa biaya apapun</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-white shrink-0 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <div>
                            <h4 class="font-medium text-white">Simpan Favorit</h4>
                            <p class="text-sm text-white/80">Kumpulkan inspirasi favoritmu dalam satu tempat</p>
                        </div>
                    </div>
                    <div class="flex items-start space-x-3">
                        <svg class="w-6 h-6 text-white shrink-0 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                        <div>
                            <h4 class="font-medium text-white">Bagikan Ideamu</h4>
                            <p class="text-sm text-white/80">Upload dan bagikan inspirasi desainmu sendiri</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Right Side - Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 sm:p-8 bg-base-100">
            <div class="w-full max-w-md">
                <!-- Logo Mobile -->
                <div class="lg:hidden text-center mb-8">
                    <a href="{{ url('/') }}" class="text-3xl font-serif font-bold text-secondary">
                        Homespire
                    </a>
                    <p class="mt-2 text-sm text-base-content/70">Platform Inspirasi Desain Interior Indonesia</p>
                </div>

                <!-- Dark Mode Toggle -->
                <div class="flex justify-end mb-6">
                </div>

                <!-- Form Content -->
                <div class="bg-base-100">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </div>

    <!-- Livewire Scripts -->
    @livewireScripts

    <!-- Alpine.js v3 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js" defer></script>
</body>
</html>
