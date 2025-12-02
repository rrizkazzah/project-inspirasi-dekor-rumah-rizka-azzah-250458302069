<div>
    <?php $__env->startSection('page-title', 'Dashboard'); ?>
    <?php $__env->startSection('page-subtitle', 'Selamat datang di panel admin Homespire - Overview statistik platform'); ?>

    <div class="row">
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon purple mb-2">
                                <i class="iconly-boldImage"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Pending Inspirasi</h6>
                            <h6 class="font-extrabold mb-0"><?php echo e($stats['pending_inspirations']); ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon blue mb-2">
                                <i class="iconly-boldChat"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Pending Komentar</h6>
                            <h6 class="font-extrabold mb-0"><?php echo e($stats['pending_comments']); ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon red mb-2">
                                <i class="iconly-boldDanger"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Pending Laporan</h6>
                            <h6 class="font-extrabold mb-0"><?php echo e($stats['pending_reports']); ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-4 py-4-5">
                    <div class="row">
                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                            <div class="stats-icon green mb-2">
                                <i class="iconly-boldStar"></i>
                            </div>
                        </div>
                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                            <h6 class="text-muted font-semibold">Total Testimoni</h6>
                            <h6 class="font-extrabold mb-0"><?php echo e($stats['testimonials_count']); ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Aksi Cepat</h4>
                </div>
                <div class="card-body">
                    <div class="list-group list-group-flush">
                        <a href="<?php echo e(route('admin.inspirations')); ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><i class="bi bi-images text-purple me-2"></i>Moderasi Inspirasi</div>
                                <small class="text-muted">Review dan kelola unggahan inspirasi</small>
                            </div>
                            <!--[if BLOCK]><![endif]--><?php if($stats['pending_inspirations'] > 0): ?>
                                <span class="badge bg-warning"><?php echo e($stats['pending_inspirations']); ?></span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </a>
                        <a href="<?php echo e(route('admin.comments')); ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><i class="bi bi-chat-dots-fill text-primary me-2"></i>Moderasi Komentar</div>
                                <small class="text-muted">Review komentar pengguna</small>
                            </div>
                            <!--[if BLOCK]><![endif]--><?php if($stats['pending_comments'] > 0): ?>
                                <span class="badge bg-warning"><?php echo e($stats['pending_comments']); ?></span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </a>
                        <a href="<?php echo e(route('admin.reports')); ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><i class="bi bi-flag-fill text-danger me-2"></i>Tinjau Laporan</div>
                                <small class="text-muted">Tangani laporan konten dari pengguna</small>
                            </div>
                            <!--[if BLOCK]><![endif]--><?php if($stats['pending_reports'] > 0): ?>
                                <span class="badge bg-danger"><?php echo e($stats['pending_reports']); ?></span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </a>
                        <a href="<?php echo e(route('admin.testimonials')); ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><i class="bi bi-star-fill text-success me-2"></i>Kelola Testimoni</div>
                                <small class="text-muted">Tambah atau edit testimoni</small>
                            </div>
                        </a>
                        <a href="<?php echo e(route('admin.articles')); ?>" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold"><i class="bi bi-newspaper text-info me-2"></i>Kelola Artikel</div>
                                <small class="text-muted">Buat dan edit artikel</small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Statistik Platform</h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-lg bg-success me-3">
                                    <i class="bi bi-images text-white"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0"><?php echo e(\App\Models\Inspiration::count()); ?></h6>
                                    <small class="text-muted">Total Inspirasi</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-lg bg-primary me-3">
                                    <i class="bi bi-people text-white"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0"><?php echo e(\App\Models\User::where('role', 'user')->count()); ?></h6>
                                    <small class="text-muted">Total Pengguna</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-lg bg-info me-3">
                                    <i class="bi bi-chat-dots text-white"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0"><?php echo e(\App\Models\Comment::count()); ?></h6>
                                    <small class="text-muted">Total Komentar</small>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 mb-3">
                            <div class="d-flex align-items-center">
                                <div class="avatar avatar-lg bg-warning me-3">
                                    <i class="bi bi-heart text-white"></i>
                                </div>
                                <div>
                                    <h6 class="mb-0"><?php echo e(\App\Models\Favorite::count()); ?></h6>
                                    <small class="text-muted">Total Favorit</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="alert alert-light-info color-info mb-0">
                        <i class="bi bi-info-circle me-2"></i>
                        <small>Panel admin Homespire digunakan untuk mengelola konten, moderasi unggahan, 
                        dan menjaga kualitas platform.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Row -->
    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Inspirasi per Bulan</h4>
                </div>
                <div class="card-body">
                    <div id="chart-inspirations"></div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h4>Status Inspirasi</h4>
                </div>
                <div class="card-body">
                    <div id="chart-status"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $__env->startPush('scripts'); ?>
<script src="<?php echo e(asset('mazer/extensions/apexcharts/apexcharts.min.js')); ?>"></script>
<script>
    // Chart Inspirasi per Bulan
    var inspirationsData = <?php echo json_encode($inspirationsPerMonth, 15, 512) ?>;
    var inspirationsMonths = inspirationsData.map(item => item.month);
    var inspirationsTotals = inspirationsData.map(item => item.total);

    var optionsInspirations = {
        series: [{
            name: 'Inspirasi',
            data: inspirationsTotals
        }],
        chart: {
            type: 'area',
            height: 300,
            toolbar: {
                show: false
            }
        },
        colors: ['#435ebe'],
        dataLabels: {
            enabled: false
        },
        stroke: {
            curve: 'smooth'
        },
        xaxis: {
            categories: inspirationsMonths
        },
        yaxis: {
            labels: {
                formatter: function (val) {
                    return Math.floor(val);
                }
            }
        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return val + " inspirasi"
                }
            }
        }
    };

    var chartInspirations = new ApexCharts(document.querySelector("#chart-inspirations"), optionsInspirations);
    chartInspirations.render();

    // Chart Status Inspirasi
    var statusData = <?php echo json_encode($inspirationsByStatus, 15, 512) ?>;
    var statusLabels = statusData.map(item => {
        const labels = {
            'approved': 'Disetujui',
            'pending': 'Pending',
            'rejected': 'Ditolak'
        };
        return labels[item.status] || item.status;
    });
    var statusTotals = statusData.map(item => item.total);

    var optionsStatus = {
        series: statusTotals,
        chart: {
            type: 'donut',
            height: 300
        },
        labels: statusLabels,
        colors: ['#198754', '#ffc107', '#dc3545'],
        legend: {
            position: 'bottom'
        },
        dataLabels: {
            enabled: true
        }
    };

    var chartStatus = new ApexCharts(document.querySelector("#chart-status"), optionsStatus);
    chartStatus.render();
</script>
<?php $__env->stopPush(); ?>
<?php /**PATH C:\Users\user\Documents\WEB_HOMESPIRE\resources\views/livewire/admin/moderation-dashboard.blade.php ENDPATH**/ ?>