<div>
    <div class="page-heading mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3><i class="bi bi-images me-2"></i>Moderasi Inspirasi</h3>
                <p class="text-subtitle">Kelola dan moderasi unggahan inspirasi dari pengguna</p>
            </div>
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
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Total Inspirasi</h6>
                            <h3 class="mb-0"><?php echo e($stats['all']); ?></h3>
                        </div>
                        <div class="stats-icon purple">
                            <i class="bi bi-images"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Menunggu Review</h6>
                            <h3 class="mb-0"><?php echo e($stats['pending']); ?></h3>
                        </div>
                        <div class="stats-icon blue">
                            <i class="bi bi-clock-history"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Disetujui</h6>
                            <h3 class="mb-0"><?php echo e($stats['approved']); ?></h3>
                        </div>
                        <div class="stats-icon green">
                            <i class="bi bi-check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">
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

    <!-- Filter Tabs -->
    <div class="card mb-4">
        <div class="card-body">
            <ul class="nav nav-pills">
                <li class="nav-item">
                    <a class="nav-link <?php echo e($filterStatus === 'all' ? 'active' : ''); ?>" 
                       href="#" wire:click.prevent="setFilter('all')">
                        Semua (<?php echo e($stats['all']); ?>)
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e($filterStatus === 'pending' ? 'active' : ''); ?>" 
                       href="#" wire:click.prevent="setFilter('pending')">
                        Pending (<?php echo e($stats['pending']); ?>)
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e($filterStatus === 'approved' ? 'active' : ''); ?>" 
                       href="#" wire:click.prevent="setFilter('approved')">
                        Disetujui (<?php echo e($stats['approved']); ?>)
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php echo e($filterStatus === 'rejected' ? 'active' : ''); ?>" 
                       href="#" wire:click.prevent="setFilter('rejected')">
                        Ditolak (<?php echo e($stats['rejected']); ?>)
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Inspirations Grid -->
    <div class="row">
        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $inspirations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inspiration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <img src="<?php echo e(asset('storage/' . $inspiration->image_url)); ?>" 
                         class="card-img-top" 
                         style="height: 200px; object-fit: cover;"
                         alt="<?php echo e($inspiration->title); ?>">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <h5 class="card-title mb-0"><?php echo e(Str::limit($inspiration->title, 30)); ?></h5>
                            <!--[if BLOCK]><![endif]--><?php if($inspiration->status === 'pending'): ?>
                                <span class="badge bg-warning text-dark">
                                    <i class="bi bi-clock"></i> Pending
                                </span>
                            <?php elseif($inspiration->status === 'approved'): ?>
                                <span class="badge bg-success">
                                    <i class="bi bi-check-circle"></i> Approved
                                </span>
                            <?php else: ?>
                                <span class="badge bg-danger">
                                    <i class="bi bi-x-circle"></i> Rejected
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                        <p class="card-text text-muted small">
                            <?php echo e(Str::limit($inspiration->description, 80)); ?>

                        </p>
                        <div class="mb-3">
                            <small class="text-muted">
                                <i class="bi bi-person"></i> <?php echo e($inspiration->user->name); ?><br>
                                <i class="bi bi-calendar"></i> <?php echo e($inspiration->created_at->format('d M Y H:i')); ?><br>
                                <i class="bi bi-tag"></i> <?php echo e($inspiration->ruangan->name ?? 'N/A'); ?> - <?php echo e($inspiration->tag->name ?? 'N/A'); ?>

                            </small>
                        </div>
                        <div class="d-flex gap-2">
                            <!--[if BLOCK]><![endif]--><?php if($inspiration->status === 'pending'): ?>
                                <button wire:click="approveInspiration(<?php echo e($inspiration->id); ?>)" 
                                        class="btn btn-sm btn-success flex-fill"
                                        wire:confirm="Setujui inspirasi ini?">
                                    <i class="bi bi-check-lg"></i> Setuju
                                </button>
                                <button wire:click="rejectInspiration(<?php echo e($inspiration->id); ?>)" 
                                        class="btn btn-sm btn-warning flex-fill"
                                        wire:confirm="Tolak inspirasi ini?">
                                    <i class="bi bi-x-lg"></i> Tolak
                                </button>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <button wire:click="deleteInspiration(<?php echo e($inspiration->id); ?>)" 
                                    class="btn btn-sm btn-danger"
                                    wire:confirm="Hapus inspirasi ini secara permanen?">
                                <i class="bi bi-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center py-5">
                        <i class="bi bi-inbox display-1 text-muted"></i>
                        <p class="mt-3 text-muted">Tidak ada inspirasi yang ditemukan.</p>
                    </div>
                </div>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        <?php echo e($inspirations->links()); ?>

    </div>
</div>
<?php /**PATH C:\Users\user\Documents\WEB_HOMESPIRE\resources\views/livewire/admin/inspiration-moderation.blade.php ENDPATH**/ ?>