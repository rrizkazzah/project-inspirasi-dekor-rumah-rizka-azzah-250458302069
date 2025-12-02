<div>
    <div class="page-heading mb-4">
        <div>
            <h3><i class="bi bi-flag-fill me-2"></i>Moderasi Laporan</h3>
            <p class="text-subtitle">Tinjau dan kelola laporan konten dari pengguna</p>
        </div>
    </div>

    <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i><?php echo e(session('message')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Total Laporan</h6>
                            <h3 class="mb-0"><?php echo e($stats['total']); ?></h3>
                        </div>
                        <div class="stats-icon purple">
                            <i class="bi bi-flag"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Menunggu</h6>
                            <h3 class="mb-0"><?php echo e($stats['pending']); ?></h3>
                        </div>
                        <div class="stats-icon blue">
                            <i class="bi bi-clock-history"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Diselesaikan</h6>
                            <h3 class="mb-0"><?php echo e($stats['resolved']); ?></h3>
                        </div>
                        <div class="stats-icon green">
                            <i class="bi bi-check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Ditolak</h6>
                            <h3 class="mb-0"><?php echo e($stats['rejected']); ?></h3>
                        </div>
                        <div class="stats-icon red">
                            <i class="bi bi-x-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reports List -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Pelapor</th>
                            <th>Alasan</th>
                            <th>Konten Dilaporkan</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person-circle fs-4 text-primary me-2"></i>
                                        <div>
                                            <div class="fw-bold"><?php echo e($report->user->name); ?></div>
                                            <small class="text-muted"><?php echo e($report->user->email); ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td style="max-width: 250px;">
                                    <strong><?php echo e($report->reason); ?></strong>
                                    <!--[if BLOCK]><![endif]--><?php if($report->description): ?>
                                        <p class="mb-0 text-muted small"><?php echo e(Str::limit($report->description, 80)); ?></p>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </td>
                                <td>
                                    <!--[if BLOCK]><![endif]--><?php if($report->inspiration): ?>
                                        <a href="<?php echo e(route('inspiration.show', $report->inspiration_id)); ?>" 
                                           target="_blank" 
                                           class="text-decoration-none">
                                            <img src="<?php echo e(asset('storage/' . $report->inspiration->image_url)); ?>" 
                                                 style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;"
                                                 alt="Thumbnail">
                                            <div class="small mt-1"><?php echo e(Str::limit($report->inspiration->title, 25)); ?></div>
                                        </a>
                                    <?php else: ?>
                                        <span class="text-muted">Konten telah dihapus</span>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </td>
                                <td>
                                    <!--[if BLOCK]><![endif]--><?php if($report->status === 'pending'): ?>
                                        <span class="badge bg-warning text-dark">
                                            <i class="bi bi-clock"></i> Pending
                                        </span>
                                    <?php elseif($report->status === 'resolved'): ?>
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle"></i> Resolved
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">
                                            <i class="bi bi-x-circle"></i> Rejected
                                        </span>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </td>
                                <td>
                                    <small><?php echo e($report->created_at->format('d M Y')); ?><br><?php echo e($report->created_at->format('H:i')); ?></small>
                                </td>
                                <td>
                                    <!--[if BLOCK]><![endif]--><?php if($report->status === 'pending' && $report->inspiration): ?>
                                        <div class="d-flex gap-2">
                                            <button wire:click="reviewReport(<?php echo e($report->id); ?>, 'remove_content')" 
                                                    class="btn btn-sm btn-danger"
                                                    wire:confirm="Hapus konten yang dilaporkan?">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                            <button wire:click="reviewReport(<?php echo e($report->id); ?>, 'reject')" 
                                                    class="btn btn-sm btn-secondary"
                                                    wire:confirm="Tolak laporan ini?">
                                                <i class="bi bi-x-lg"></i> Tolak
                                            </button>
                                        </div>
                                    <?php else: ?>
                                        <span class="text-muted small">Selesai</span>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="bi bi-inbox display-4 text-muted d-block mb-3"></i>
                                    <p class="text-muted">Tidak ada laporan yang ditemukan.</p>
                                </td>
                            </tr>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        <?php echo e($reports->links()); ?>

    </div>
</div>
<?php /**PATH C:\Users\user\Documents\WEB_HOMESPIRE\resources\views/livewire/admin/report-moderation.blade.php ENDPATH**/ ?>