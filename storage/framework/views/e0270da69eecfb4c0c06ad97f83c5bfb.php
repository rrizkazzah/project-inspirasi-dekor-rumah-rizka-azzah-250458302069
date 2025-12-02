<div>
    <div class="page-heading mb-4">
        <div>
            <h3><i class="bi bi-chat-dots-fill me-2"></i>Moderasi Komentar</h3>
            <p class="text-subtitle">Kelola komentar dari pengguna</p>
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
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Total Komentar</h6>
                            <h3 class="mb-0"><?php echo e($stats['total']); ?></h3>
                        </div>
                        <div class="stats-icon purple">
                            <i class="bi bi-chat-dots"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Comments List -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Pengguna</th>
                            <th>Komentar</th>
                            <th>Inspirasi</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person-circle fs-4 text-primary me-2"></i>
                                        <div>
                                            <div class="fw-bold"><?php echo e($comment->user->name); ?></div>
                                            <small class="text-muted"><?php echo e($comment->user->email); ?></small>
                                        </div>
                                    </div>
                                </td>
                                <td style="max-width: 300px;">
                                    <p class="mb-0"><?php echo e(Str::limit($comment->content, 100)); ?></p>
                                </td>
                                <td>
                                    <a href="<?php echo e(route('inspiration.show', $comment->inspiration_id)); ?>"
                                       target="_blank"
                                       class="text-decoration-none">
                                        <?php echo e(Str::limit($comment->inspiration->title ?? 'N/A', 30)); ?>

                                        <i class="bi bi-box-arrow-up-right small"></i>
                                    </a>
                                </td>
                                <td>
                                    <small><?php echo e($comment->created_at->format('d M Y')); ?><br><?php echo e($comment->created_at->format('H:i')); ?></small>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <!--[if BLOCK]><![endif]--><?php if($comment->status === 'pending'): ?>
                                            <button wire:click="approveComment(<?php echo e($comment->id); ?>)"
                                                    class="btn btn-sm btn-success"
                                                    wire:confirm="Setujui komentar ini?">
                                                <i class="bi bi-check-lg"></i>
                                            </button>
                                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                        <button wire:click="deleteComment(<?php echo e($comment->id); ?>)"
                                                class="btn btn-sm btn-danger"
                                                wire:confirm="Hapus komentar ini?">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="bi bi-inbox display-4 text-muted d-block mb-3"></i>
                                    <p class="text-muted">Tidak ada komentar yang ditemukan.</p>
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
        <?php echo e($comments->links()); ?>

    </div>
</div>
<?php /**PATH C:\Users\user\Documents\WEB_HOMESPIRE\resources\views/livewire/admin/comment-moderation.blade.php ENDPATH**/ ?>