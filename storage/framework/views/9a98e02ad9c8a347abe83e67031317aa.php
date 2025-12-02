<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo $__env->yieldContent('title', 'Dashboard'); ?> - Admin Homespire</title>
    
    <link rel="shortcut icon" href="<?php echo e(asset('mazer/compiled/svg/favicon.svg')); ?>" type="image/x-icon">
    
    <link rel="stylesheet" href="<?php echo e(asset('mazer/compiled/css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('mazer/compiled/css/iconly.css')); ?>">
    
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::styles(); ?>

    <?php echo $__env->yieldPushContent('styles'); ?>
</head>

<body>
    <div id="app">
        <div id="sidebar">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="<?php echo e(route('admin.dashboard')); ?>">
                                <h3 style="color: #435ebe; font-weight: 700;">
                                    <i class="bi bi-house-heart-fill"></i> Homespire
                                </h3>
                            </a>
                        </div>
                        <div class="sidebar-toggler x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        
                        <li class="sidebar-item <?php echo e(request()->routeIs('admin.dashboard') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.dashboard')); ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Moderasi</li>
                        
                        <li class="sidebar-item <?php echo e(request()->routeIs('admin.inspirations') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.inspirations')); ?>" class='sidebar-link'>
                                <i class="bi bi-images"></i>
                                <span>Inspirasi</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item <?php echo e(request()->routeIs('admin.comments') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.comments')); ?>" class='sidebar-link'>
                                <i class="bi bi-chat-dots-fill"></i>
                                <span>Komentar</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item <?php echo e(request()->routeIs('admin.reports') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.reports')); ?>" class='sidebar-link'>
                                <i class="bi bi-flag-fill"></i>
                                <span>Laporan</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item <?php echo e(request()->routeIs('admin.testimonials*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.testimonials')); ?>" class='sidebar-link'>
                                <i class="bi bi-star-fill"></i>
                                <span>Testimoni</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Konten</li>
                        
                        <li class="sidebar-item <?php echo e(request()->routeIs('admin.articles*') ? 'active' : ''); ?>">
                            <a href="<?php echo e(route('admin.articles')); ?>" class='sidebar-link'>
                                <i class="bi bi-newspaper"></i>
                                <span>Artikel</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Lainnya</li>
                        
                        <li class="sidebar-item">
                            <a href="<?php echo e(route('home')); ?>" class='sidebar-link' target="_blank">
                                <i class="bi bi-arrow-left-circle"></i>
                                <span>Kembali ke Website</span>
                            </a>
                        </li>
                        
                        <li class="sidebar-item">
                            <form method="POST" action="<?php echo e(route('admin.logout')); ?>" id="logout-form">
                                <?php echo csrf_field(); ?>
                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class='sidebar-link'>
                                    <i class="bi bi-box-arrow-left"></i>
                                    <span>Logout</span>
                                </a>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>
            
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3><?php echo $__env->yieldContent('page-title', 'Dashboard'); ?></h3>
                            <p class="text-subtitle text-muted"><?php echo $__env->yieldContent('page-subtitle', ''); ?></p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <?php echo $__env->yieldContent('breadcrumb'); ?>
                            </nav>
                        </div>
                    </div>
                </div>
                
                <?php if(session('success')): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill"></i> <?php echo e(session('success')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <?php if(session('error')): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-x-circle-fill"></i> <?php echo e(session('error')); ?>

                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
                
                <section class="section">
                    <?php echo e($slot); ?>

                </section>
            </div>
            
            <footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p><?php echo e(date('Y')); ?> &copy; Homespire</p>
                    </div>
                    <div class="float-end">
                        <p>Platform Inspirasi Desain Interior & Rumah Indonesia</p>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    
    <script src="<?php echo e(asset('mazer/static/js/components/dark.js')); ?>"></script>
    <script src="<?php echo e(asset('mazer/extensions/perfect-scrollbar/perfect-scrollbar.min.js')); ?>"></script>
    <script src="<?php echo e(asset('mazer/compiled/js/app.js')); ?>"></script>
    
    <?php echo \Livewire\Mechanisms\FrontendAssets\FrontendAssets::scripts(); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH C:\Users\user\Documents\WEB_HOMESPIRE\resources\views/layouts/admin.blade.php ENDPATH**/ ?>