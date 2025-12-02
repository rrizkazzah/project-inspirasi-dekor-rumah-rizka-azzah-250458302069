<div>
    <div class="page-heading mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3><i class="bi bi-star-fill me-2"></i>Kelola Testimoni</h3>
                <p class="text-subtitle">Kelola testimoni dari pengguna</p>
            </div>
            <a href="<?php echo e(route('admin.testimonials.create')); ?>" class="btn btn-primary">
                <i class="bi bi-plus-circle me-2"></i>Tambah Testimoni
            </a>
        </div>
    </div>

    <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i><?php echo e(session('message')); ?>

            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    <!-- Stats Card -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Total Testimoni</h6>
                            <h3 class="mb-0"><?php echo e($stats['total']); ?></h3>
                        </div>
                        <div class="stats-icon purple">
                            <i class="bi bi-star-fill"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Testimonials Grid -->
    <div class="row">
        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-start mb-3">
                            <div class="d-flex align-items-center">
                                <i class="bi bi-person-circle fs-1 text-primary me-3"></i>
                                <div>
                                    <h5 class="mb-0"><?php echo e($testimonial->name); ?></h5>
                                    <small class="text-muted">Testimoni</small>
                                </div>
                            </div>
                            <div class="text-warning">
                                <!--[if BLOCK]><![endif]--><?php for($i = 0; $i < $testimonial->rating; $i++): ?>
                                    <i class="bi bi-star-fill"></i>
                                <?php endfor; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>
                        </div>
                        <p class="card-text text-muted">
                            "<?php echo e($testimonial->content); ?>"
                        </p>
                        <div class="d-flex gap-2 mt-3">
                            <a href="<?php echo e(route('admin.testimonials.edit', $testimonial->id)); ?>" 
                               class="btn btn-sm btn-warning flex-fill">
                                <i class="bi bi-pencil"></i> Edit
                            </a>
                            <button wire:click="deleteTestimonial(<?php echo e($testimonial->id); ?>)" 
                                    class="btn btn-sm btn-danger"
                                    wire:confirm="Hapus testimoni ini?">
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
                        <p class="mt-3 text-muted">Belum ada testimoni.</p>
                        <a href="<?php echo e(route('admin.testimonials.create')); ?>" class="btn btn-primary mt-2">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Testimoni Pertama
                        </a>
                    </div>
                </div>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        <?php echo e($testimonials->links()); ?>

    </div>
</div>
<?php /**PATH C:\Users\user\Documents\WEB_HOMESPIRE\resources\views/livewire/admin/testimonial-management.blade.php ENDPATH**/ ?>