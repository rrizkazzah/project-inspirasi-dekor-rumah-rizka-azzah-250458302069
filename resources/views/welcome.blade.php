<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{
        isNavOpen: false
      }">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Homespire - Inspirasi Desain Interior & Rumah Indonesia</title>

    <!-- Google Fonts: Inter (sans) & Playfair Display (serif) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Tailwind CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Livewire Styles -->
    @livewireStyles

    <!-- Menyembunyikan elemen x-cloak sebelum Alpine siap -->
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-base-100 text-base-content font-sans antialiased transition-colors duration-300">

    <!-- ===== HEADER & NAVIGATION ===== -->
    <header class="sticky top-0 z-30 w-full bg-base-100/80 backdrop-blur-sm shadow-sm transition-all">
        <div class="container-auto">

            <!-- Top Bar -->
            <div class="flex justify-between items-center py-2 border-b border-base-200 text-sm">
                <div class="flex items-center space-x-4">
                    <span class="hidden md:inline-block text-base-content/70">
                        Platform Inspirasi Desain Interior & Rumah
                    </span>
                </div>
                <div class="flex items-center space-x-4">
                    @auth
                        <!-- User Dropdown untuk yang sudah login -->
                        <div x-data="{ isOpen: false }" class="relative" @click.away="isOpen = false">
                            <button @click="isOpen = !isOpen" type="button"
                                class="flex items-center space-x-2 hover:text-primary transition-colors">
                                <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966
                                        0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>{{ Auth::user()->name }}</span>
                                <svg class="w-4 h-4 transition-transform duration-200" :class="{ 'rotate-180': isOpen }"
                                    fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                            <div x-show="isOpen" x-transition:enter="transition ease-out duration-100"
                                x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-75"
                                x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                                style="display: none;" class="dropdown-content">
                                <a href="{{ route('profile') }}"
                                    class="block px-4 py-2 text-sm text-base-content hover:bg-base-200">Profil</a>
                                <a href="{{ route('my.uploads') }}"
                                    class="block px-4 py-2 text-sm text-base-content hover:bg-base-200">Unggahan Saya</a>
                                <a href="{{ route('my.likes') }}"
                                    class="block px-4 py-2 text-sm text-base-content hover:bg-base-200">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-error" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Inspirasi Disukai
                                    </span>
                                </a>
                                <a href="{{ route('my.favorites') }}"
                                    class="block px-4 py-2 text-sm text-base-content hover:bg-base-200">
                                    <span class="flex items-center gap-2">
                                        <svg class="w-4 h-4 text-primary" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M5 4a2 2 0 012-2h6a2 2 0 012 2v14l-5-2.5L5 18V4z"></path>
                                        </svg>
                                        Favorit Saya
                                    </span>
                                </a>
                                @if(Auth::user()->isAdmin())
                                    <a href="{{ route('admin.dashboard') }}"
                                        class="block px-4 py-2 text-sm text-base-content hover:bg-base-200">Dashboard Admin</a>
                                @endif
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full text-left px-4 py-2 text-sm text-base-content hover:bg-base-200">
                                        Logout
                                    </button>
                                </form>
                            </div>
                        </div>
                    @else
                        <!-- Tombol Login/Register untuk guest -->
                        <a href="{{ route('login') }}" class="hover:text-primary">Login</a>
                        <span class="text-base-content/30">/</span>
                        <a href="{{ route('register') }}" class="hover:text-primary">Register</a>
                    @endauth
                </div>
            </div>

            <!-- Main Navigation -->
            <nav class="flex items-center justify-between py-4">
                <!-- Logo -->
                <a href="{{ route('home') }}" class="text-3xl font-serif font-bold text-secondary">
                    Homespire
                </a>

                <!-- Menu Desktop -->
                <ul class="hidden lg:flex items-center space-x-8 font-medium">
                    <li><a href="{{ route('home') }}" class="hover:text-primary">Home</a></li>
                    <li><a href="{{ route('gallery') }}" class="hover:text-primary">Galeri Inspirasi</a></li>
                    <li><a href="{{ route('inspiration.upload') }}" class="hover:text-primary">Unggah Inspirasi</a></li>
                    <li><a href="{{ route('articles.index') }}" class="hover:text-primary">Artikel</a></li>
                    <li><a href="{{ route('testimonials') }}" class="hover:text-primary">Testimoni</a></li>
                    <li><a href="{{ route('faq') }}" class="hover:text-primary">FAQ</a></li>
                </ul>

                <!-- Ikon Kanan & Tombol Mobile -->
                <div class="flex items-center space-x-3">
                    <!-- Tombol Hamburger (Mobile) -->
                    <button @click="isNavOpen = !isNavOpen" class="btn btn-ghost btn-circle lg:hidden"
                        aria-label="Toggle Menu">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                    </button>
                </div>
            </nav>

            <!-- Menu Mobile (Dropdown) -->
            <div x-show="isNavOpen" x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 -translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                x-transition:leave="transition ease-in duration-150"
                x-transition:leave-start="opacity-100 translate-y-0" x-transition:leave-end="opacity-0 -translate-y-4"
                @click.away="isNavOpen = false" class="lg:hidden pb-4" x-cloak>
                <ul class="flex flex-col space-y-2">
                    <li><a href="{{ route('home') }}" class="block px-4 py-2 rounded-md hover:bg-base-200">Home</a></li>
                    <li><a href="{{ route('gallery') }}" class="block px-4 py-2 rounded-md hover:bg-base-200">Galeri
                            Inspirasi</a></li>
                    <li><a href="{{ route('inspiration.upload') }}"
                            class="block px-4 py-2 rounded-md hover:bg-base-200">Unggah Inspirasi</a></li>
                    <li><a href="{{ route('articles.index') }}"
                            class="block px-4 py-2 rounded-md hover:bg-base-200">Artikel</a></li>
                    <li><a href="{{ route('testimonials') }}"
                            class="block px-4 py-2 rounded-md hover:bg-base-200">Testimoni</a></li>
                    <li><a href="{{ route('faq') }}" class="block px-4 py-2 rounded-md hover:bg-base-200">FAQ</a></li>
                </ul>
            </div>
        </div>
    </header>

    <!-- ===== MAIN CONTENT ===== -->
    <main>
        <!-- Hero Section -->
        <section class="relative h-[600px] lg:h-[700px] w-full">
            <!-- Background Image -->
            <img src="https://i.pinimg.com/1200x/87/89/16/87891647dabc50668974c817cc7efdf8.jpg"
                alt="Modern living room interior" class="absolute inset-0 w-full h-full object-cover">
            <!-- Overlay Gelap -->
            <div class="absolute inset-0 bg-black/40"></div>

            <!-- Konten Hero -->
            <div class="relative container-auto h-full flex items-center justify-start">
                <div class="max-w-lg text-left">
                    <div class="bg-base-100/90 backdrop-blur-md p-8 md:p-12 rounded-lg shadow-xl">
                        <h1 class="text-4xl md:text-5xl lg:text-6xl font-serif font-bold text-secondary leading-tight">
                            Temukan Inspirasi Desain Interior Impian Anda
                        </h1>
                        <p class="mt-4 text-lg text-base-content">
                            Platform kolaboratif untuk berbagi dan menemukan ide desain interior & rumah yang
                            menginspirasi.
                        </p>
                        <div class="mt-8 flex flex-col sm:flex-row gap-4">
                            <a href="{{ route('gallery') }}" class="btn btn-primary">
                                JELAJAHI GALERI
                            </a>
                            @guest
                                <a href="{{ route('register') }}" class="btn btn-outline">
                                    DAFTAR SEKARANG
                                </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Home Decor Categories -->
        <section class="py-16 lg:py-24 bg-base-200">
            <div class="container-auto">
                <h2 class="text-3xl lg:text-4xl font-serif text-center mb-12 text-secondary">
                    Kategori Ruangan Populer
                </h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 md:gap-8">
                    <!-- Kategori 1: Ruang Tamu -->
                    <a href="{{ route('gallery') }}?room=living-room" class="group block">
                        <div class="card overflow-hidden">
                            <img src="https://i.pinimg.com/1200x/c1/36/04/c136046ac0971953b40e03eca0b12579.jpg"
                                alt="Ruang Tamu"
                                class="w-full h-64 object-cover transform transition-transform duration-500 group-hover:scale-105">
                            <div class="card-body text-center">
                                <h3 class="text-xl font-serif font-medium">Ruang Tamu</h3>
                            </div>
                        </div>
                    </a>
                    <!-- Kategori 2: Kamar Tidur -->
                    <a href="{{ route('gallery') }}?room=bedroom" class="group block">
                        <div class="card overflow-hidden">
                            <img src="https://i.pinimg.com/1200x/4e/07/de/4e07de94033c580259ab56e3a9f262fa.jpg"
                                alt="Kamar Tidur"
                                class="w-full h-64 object-cover transform transition-transform duration-500 group-hover:scale-105">
                            <div class="card-body text-center">
                                <h3 class="text-xl font-serif font-medium">Kamar Tidur</h3>
                            </div>
                        </div>
                    </a>
                    <!-- Kategori 3: Dapur -->
                    <a href="{{ route('gallery') }}?room=kitchen" class="group block">
                        <div class="card overflow-hidden">
                            <img src="https://i.pinimg.com/1200x/a4/76/d8/a476d85f64fbdc2eed561e9a6301ef80.jpg"
                                alt="Dapur"
                                class="w-full h-64 object-cover transform transition-transform duration-500 group-hover:scale-105">
                            <div class="card-body text-center">
                                <h3 class="text-xl font-serif font-medium">Dapur</h3>
                            </div>
                        </div>
                    </a>
                    <!-- Kategori 4: Kamar Mandi -->
                    <a href="{{ route('gallery') }}?room=bathroom" class="group block">
                        <div class="card overflow-hidden">
                            <img src="https://i.pinimg.com/1200x/73/7d/00/737d00d9306fcebd0b62058598536c93.jpg"
                                alt="Kamar Mandi"
                                class="w-full h-64 object-cover transform transition-transform duration-500 group-hover:scale-105">
                            <div class="card-body text-center">
                                <h3 class="text-xl font-serif font-medium">Kamar Mandi</h3>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </section>

        <!-- About Platform Section -->
        <section class="py-16 lg:py-24 bg-base-100">
            <div class="container-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <div class="text-left">
                    <h2 class="text-3xl lg:text-4xl font-serif mb-6 text-secondary">
                        Platform Berbagi Inspirasi Desain Interior
                    </h2>
                    <p class="mb-4 text-base-content/80">
                        Homespire adalah platform kolaboratif yang memudahkan Anda untuk menemukan, menyimpan, dan
                        berbagi inspirasi desain interior & rumah.
                    </p>
                    <p class="mb-8 text-base-content/80">
                        Dengan sistem moderasi yang ketat, kami memastikan setiap konten yang ditampilkan berkualitas
                        dan relevan untuk membantu Anda mewujudkan rumah impian.
                    </p>
                    <a href="{{ route('gallery') }}" class="btn btn-outline">
                        JELAJAHI SEKARANG
                    </a>
                </div>
                <div>
                    <img src="https://i.pinimg.com/1200x/98/2f/36/982f36e0ed659d4e1fa40029642adeae.jpg"
                        alt="Interior design workspace" class="w-full h-auto rounded-lg shadow-lg">
                </div>
            </div>
        </section>

        <!-- Testimonials Section -->
        <section class="py-16 lg:py-24 bg-neutral text-neutral-content">
            <div class="container-auto">
                <div class="text-center mb-12">
                    <span class="text-sm font-medium uppercase tracking-wider text-primary">Testimoni</span>
                    <h2 class="text-3xl lg:text-4xl font-serif mt-4 mb-6">
                        Apa Kata Pengguna Kami
                    </h2>
                    <p class="text-neutral-content/80 max-w-2xl mx-auto">
                        Pengalaman nyata dari pengguna Homespire yang telah menemukan inspirasi untuk rumah mereka
                    </p>
                </div>

                @php
                    $testimonials = \App\Models\Testimonial::published()->latest()->take(3)->get();
                @endphp

                @if($testimonials->count() > 0)
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach($testimonials as $testimonial)
                            <div class="bg-neutral-content/5 p-6 rounded-lg">
                                <div class="flex items-center mb-4">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-5 h-5 {{ $i <= $testimonial->rating ? 'text-primary' : 'text-neutral-content/30' }}"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364
                                                1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0
                                                00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                    @endfor
                                </div>
                                <p class="text-neutral-content/90 mb-4 italic">
                                    "{{ $testimonial->content }}"
                                </p>
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 rounded-full bg-primary/20 flex items-center justify-center">
                                        <span class="text-primary font-medium text-lg">
                                            {{ strtoupper(substr($testimonial->name, 0, 1)) }}
                                        </span>
                                    </div>
                                    <div>
                                        <h4 class="font-medium">{{ $testimonial->name }}</h4>
                                        <p class="text-sm text-neutral-content/70">Pengguna Homespire</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="text-center mt-8">
                        <a href="{{ route('testimonials') }}" class="btn btn-outline-primary">
                            LIHAT SEMUA TESTIMONI
                        </a>
                    </div>
                @else
                    <div class="text-center py-8">
                        <p class="text-neutral-content/60">Belum ada testimoni. Jadilah yang pertama!</p>
                    </div>
                @endif
            </div>
        </section>

        <!-- FAQ Section -->
        <section class="py-16 lg:py-24 bg-base-100">
            <div class="container-auto">
                <div class="text-center mb-12">
                    <span class="text-sm font-medium uppercase tracking-wider text-primary">FAQ</span>
                    <h2 class="text-3xl lg:text-4xl font-serif mt-4 mb-6 text-secondary">
                        Pertanyaan yang Sering Diajukan
                    </h2>
                    <p class="text-base-content/80 max-w-2xl mx-auto">
                        Temukan jawaban untuk pertanyaan umum tentang Homespire
                    </p>
                </div>

                @php
                    $faqs = [
                        [
                            'question' => 'Apa itu Homespire?',
                            'answer' => 'Homespire adalah platform berbagi inspirasi dekorasi rumah yang memungkinkan Anda menemukan, menyimpan, dan berbagi ide-ide dekorasi untuk berbagai ruangan di rumah Anda.'
                        ],
                        [
                            'question' => 'Bagaimana cara upload inspirasi?',
                            'answer' => 'Untuk upload inspirasi, Anda perlu login terlebih dahulu. Kemudian klik menu "Upload" di navigasi, isi form dengan detail inspirasi seperti judul, deskripsi, gambar, dan informasi lainnya. Setelah disubmit, inspirasi Anda akan di-review oleh admin sebelum dipublikasikan.'
                        ],
                        [
                            'question' => 'Apakah saya bisa menyimpan inspirasi favorit?',
                            'answer' => 'Ya, Anda bisa menyimpan inspirasi favorit dengan klik tombol bintang (star) pada setiap inspirasi.
                            Inspirasi yang Anda simpan bisa diakses kapan saja dari dashboard Anda.'
                        ],
                        [
                            'question' => 'Bagaimana cara mencari inspirasi tertentu?',
                            'answer' => 'Di halaman Galeri, Anda bisa menggunakan fitur pencarian berdasarkan kata kunci, filter berdasarkan ruangan (Ruang Tamu, Kamar Tidur, dll),
                            atau filter berdasarkan gaya desain (Minimalis, Modern, Klasik, dll).'
                        ],
                        [
                            'question' => 'Apakah gratis untuk menggunakan Homespire?',
                            'answer' => 'Ya, Homespire sepenuhnya gratis untuk digunakan. Anda bisa melihat, menyimpan, dan berbagi inspirasi tanpa biaya apapun.'
                        ],
                    ];
                @endphp

                <div class="max-w-3xl mx-auto space-y-4" x-data="{ openIndex: null }">
                    @foreach($faqs as $index => $faq)
                        <div class="border border-base-300 rounded-lg overflow-hidden">
                            <button @click="openIndex = openIndex === {{ $index }} ? null : {{ $index }}"
                                class="w-full px-6 py-4 text-left flex items-center justify-between bg-base-200/50 hover:bg-base-200 transition-colors">
                                <span class="font-medium text-base-content">{{ $faq['question'] }}</span>
                                <svg class="w-5 h-5 text-base-content/60 transition-transform duration-200"
                                    :class="{ 'rotate-180': openIndex === {{ $index }} }" fill="currentColor"
                                    viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </button>
                            <div x-show="openIndex === {{ $index }}" x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 -translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 translate-y-0"
                                x-transition:leave-end="opacity-0 -translate-y-2" style="display: none;"
                                class="px-6 py-4 bg-base-100">
                                <p class="text-base-content/80">{{ $faq['answer'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="text-center mt-8">
                    <a href="{{ route('faq') }}" class="btn btn-outline-primary">
                        LIHAT SEMUA FAQ
                    </a>
                </div>
            </div>
        </section>

    </main>

    <!-- ===== FOOTER ===== -->
    <footer class="bg-neutral text-neutral-content py-16 lg:py-24">
        <div class="container-auto">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Kolom 1: Brand & About -->
                <div class="space-y-4">
                    <a href="{{ route('home') }}" class="text-3xl font-serif font-bold">
                        Homespire
                    </a>
                    <p class="text-neutral-content/70">
                        Platform kolaboratif untuk berbagi dan menemukan inspirasi desain interior dan rumah impian
                        Anda.
                    </p>
                    <!-- Social Media Icons -->
                    <div class="flex space-x-4">
                        <a href="#" class="hover:text-primary" aria-label="Facebook">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491
                                    0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </a>
                        <a href="#" class="hover:text-primary dark:hover:text-dark-primary" aria-label="Instagram">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919
                                    4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78
                                     2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759
                                     6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z" />
                            </svg>
                        </a>
                        <a href="#" class="hover:text-primary dark:hover:text-dark-primary" aria-label="Twitter">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 24 24">
                                <path
                                    d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923
                                    4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                            </svg>
                        </a>
                    </div>
                </div>

                <!-- Kolom 2: Quick Links -->
                <div>
                    <h4 class="text-lg font-serif font-medium mb-4">Menu Utama</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('home') }}" class="hover:text-primary text-neutral-content/80">Home</a>
                        </li>
                        <li><a href="{{ route('gallery') }}" class="hover:text-primary text-neutral-content/80">Galeri
                                Inspirasi</a></li>
                        <li><a href="{{ route('inspiration.upload') }}"
                                class="hover:text-primary text-neutral-content/80">Unggah Inspirasi</a></li>
                        <li><a href="{{ route('articles.index') }}"
                                class="hover:text-primary text-neutral-content/80">Artikel</a></li>
                        <li><a href="{{ route('testimonials') }}"
                                class="hover:text-primary text-neutral-content/80">Testimoni</a></li>
                    </ul>
                </div>

                <!-- Kolom 3: Fitur -->
                <div>
                    <h4 class="text-lg font-serif font-medium mb-4">Fitur Platform</h4>
                    <ul class="space-y-2">
                        <li><a href="{{ route('gallery') }}"
                                class="hover:text-primary text-neutral-content/80">Pencarian Inspirasi</a></li>
                        <li><a href="#" class="hover:text-primary text-neutral-content/80">Filter Kategori</a></li>
                        <li><a href="#" class="hover:text-primary text-neutral-content/80">Simpan Favorit</a></li>
                        <li><a href="{{ route('faq') }}" class="hover:text-primary text-neutral-content/80">FAQ</a></li>
                    </ul>
                </div>

                <!-- Kolom 4: Contact Info -->
                <div>
                    <h4 class="text-lg font-serif font-medium mb-4">Hubungi Kami</h4>
                    <ul class="space-y-3">
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 shrink-0 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z" />
                            </svg>
                            <span class="text-neutral-content/80">Jakarta, Indonesia</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 shrink-0 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07
                                    1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91A2.25 2.25 0 012.25 6.993V6.75" />
                            </svg>
                            <span class="text-neutral-content/80">support@homespire.id</span>
                        </li>
                        <li class="flex items-start space-x-3">
                            <svg class="w-5 h-5 shrink-0 mt-1" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M8.625 12a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H8.25m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0H12m4.125 0a.375.375 0 11-.75 0 .375.375 0 01.75 0zm0 0h-.375M21 12c0 4.556-4.03
                                    8.25-9 8.25a9.764 9.764 0 01-2.555-.337A5.972 5.972 0 015.41 20.97a5.969 5.969 0 01-.474-.065 4.48 4.48 0 00.978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25z" />
                            </svg>
                            <span class="text-neutral-content/80">WhatsApp: +62 123-4567-8900</span>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Copyright Bar -->
            <div class="mt-12 pt-8 border-t border-neutral-content/20 text-center text-neutral-content/60">
                <p>&copy; {{ date('Y') }} Homespire. All rights reserved. Platform Inspirasi Desain Interior Indonesia.
                </p>
            </div>
        </div>
    </footer>

    <!-- Livewire Scripts -->
    @livewireScripts

    <!-- Alpine.js v3 CDN -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.1/dist/cdn.min.js" defer></script>

    <!-- Debug Alpine.js -->
    <script>
        document.addEventListener('alpine:init', () => {
            console.log('Alpine.js initialized successfully!');
        });
    </script>
</body>

</html>
