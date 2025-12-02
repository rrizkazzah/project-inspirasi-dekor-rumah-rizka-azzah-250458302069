<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - Homespire</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    
    @livewireStyles
    
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f2f7ff;
        }

        #app {
            display: flex;
            min-height: 100vh;
        }

        #sidebar {
            width: 260px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            overflow-y: auto;
            z-index: 1000;
            transition: margin-left 0.3s ease;
        }

        #sidebar::-webkit-scrollbar {
            width: 5px;
        }

        #sidebar::-webkit-scrollbar-track {
            background: rgba(255,255,255,0.1);
        }

        #sidebar::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.3);
            border-radius: 10px;
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .sidebar-header .logo h3 {
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            margin: 0;
        }

        .sidebar-header .logo a {
            text-decoration: none;
            color: white;
        }

        .sidebar-menu {
            padding: 1.5rem 0;
        }

        .menu {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sidebar-title {
            color: rgba(255,255,255,0.6);
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 1rem 1.5rem 0.5rem;
            font-weight: 700;
        }

        .sidebar-item {
            margin: 0;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            padding: 0.85rem 1.5rem;
            color: white;
            text-decoration: none;
            transition: all 0.3s;
        }

        .sidebar-link:hover {
            background: rgba(255,255,255,0.1);
            color: white;
        }

        .sidebar-item.active .sidebar-link {
            background: rgba(255,255,255,0.2);
        }

        .sidebar-link i {
            font-size: 1.2rem;
            margin-right: 0.75rem;
            width: 24px;
        }

        #main {
            flex: 1;
            margin-left: 260px;
            min-height: 100vh;
            transition: margin-left 0.3s ease;
        }

        .navbar-top {
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            padding: 1rem 1.5rem;
        }

        .burger-btn {
            color: #6c757d;
            font-size: 1.5rem;
            cursor: pointer;
            text-decoration: none;
            background: none;
            border: none;
            padding: 0;
        }

        .burger-btn:hover {
            color: #667eea;
        }

        .user-menu {
            cursor: pointer;
        }

        .user-name h6 {
            font-size: 0.9rem;
            color: #25396f;
            margin: 0;
        }

        .user-name p {
            font-size: 0.75rem;
            color: #6c757d;
            margin: 0;
        }

        .page-content {
            padding: 2rem 1.5rem;
        }

        .page-heading h3 {
            color: #25396f;
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .text-subtitle {
            color: #6c757d;
            font-size: 0.95rem;
        }

        .card {
            border: none;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            border-radius: 12px;
        }

        .stats-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .stats-icon.purple { 
            background-color: #e0cffc; 
            color: #8b5cf6; 
        }
        
        .stats-icon.blue { 
            background-color: #cce5ff; 
            color: #3b82f6; 
        }
        
        .stats-icon.green { 
            background-color: #ccf5e5; 
            color: #10b981; 
        }
        
        .stats-icon.red { 
            background-color: #ffe5e5; 
            color: #ef4444; 
        }

        @media (max-width: 1199px) {
            #sidebar {
                margin-left: -260px;
            }
            
            #sidebar.show {
                margin-left: 0;
            }
            
            #main {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="{{ route('admin.dashboard') }}">
                        <h3><i class="bi bi-house-heart-fill"></i> Homespire</h3>
                    </a>
                </div>
            </div>
            
            <div class="sidebar-menu">
                <ul class="menu">
                    <li class="sidebar-title">Menu</li>
                    <li class="sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                        <a href="{{ route('admin.dashboard') }}" class='sidebar-link'>
                            <i class="bi bi-grid-fill"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Moderasi</li>
                    <li class="sidebar-item {{ request()->routeIs('admin.inspirations') ? 'active' : '' }}">
                        <a href="{{ route('admin.inspirations') }}" class='sidebar-link'>
                            <i class="bi bi-images"></i>
                            <span>Inspirasi</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.comments') ? 'active' : '' }}">
                        <a href="{{ route('admin.comments') }}" class='sidebar-link'>
                            <i class="bi bi-chat-dots-fill"></i>
                            <span>Komentar</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.reports') ? 'active' : '' }}">
                        <a href="{{ route('admin.reports') }}" class='sidebar-link'>
                            <i class="bi bi-flag-fill"></i>
                            <span>Laporan</span>
                        </a>
                    </li>
                    <li class="sidebar-item {{ request()->routeIs('admin.testimonials*') ? 'active' : '' }}">
                        <a href="{{ route('admin.testimonials') }}" class='sidebar-link'>
                            <i class="bi bi-star-fill"></i>
                            <span>Testimoni</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Konten</li>
                    <li class="sidebar-item {{ request()->routeIs('admin.articles*') ? 'active' : '' }}">
                        <a href="{{ route('admin.articles') }}" class='sidebar-link'>
                            <i class="bi bi-newspaper"></i>
                            <span>Artikel</span>
                        </a>
                    </li>

                    <li class="sidebar-title">Lainnya</li>
                    <li class="sidebar-item">
                        <a href="{{ route('home') }}" class='sidebar-link' target="_blank">
                            <i class="bi bi-arrow-left-circle"></i>
                            <span>Kembali ke Website</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <form method="POST" action="{{ route('admin.logout') }}" id="logout-form">
                            @csrf
                            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class='sidebar-link'>
                                <i class="bi bi-box-arrow-left"></i>
                                <span>Logout</span>
                            </a>
                        </form>
                    </li>
                </ul>
            </div>
        </div>

        <div id="main">
            <header class="mb-3">
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <button class="burger-btn d-block d-xl-none" onclick="toggleSidebar()">
                            <i class="bi bi-list"></i>
                        </button>

                        <div class="ms-auto">
                            <div class="dropdown">
                                <a href="#" class="text-decoration-none" data-bs-toggle="dropdown">
                                    <div class='user-menu d-flex align-items-center'>
                                        <div class='user-name text-end me-3 d-none d-md-block'>
                                            <h6>{{ Auth::user()->name }}</h6>
                                            <p>Administrator</p>
                                        </div>
                                        <div class='user-img'>
                                            <i class="bi bi-person-circle fs-2 text-primary"></i>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('home') }}" target="_blank">
                                            <i class='bi bi-house-door me-2'></i> Ke Website
                                        </a>
                                    </li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li>
                                        <a class="dropdown-item text-danger" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class='bi bi-box-arrow-left me-2'></i> Logout
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </header>

            <div class="page-content">
                {{ $slot }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts

    <script>
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('show');
        }

        document.addEventListener('click', function(e) {
            const sidebar = document.getElementById('sidebar');
            const burgerBtn = document.querySelector('.burger-btn');
            
            if (window.innerWidth < 1200) {
                if (!sidebar.contains(e.target) && e.target !== burgerBtn && !burgerBtn.contains(e.target)) {
                    sidebar.classList.remove('show');
                }
            }
        });
    </script>

    @stack('scripts')
</body>
</html>
