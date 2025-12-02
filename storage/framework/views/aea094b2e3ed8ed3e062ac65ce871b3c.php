<div>
    <div class="page-heading mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3><i class="bi bi-newspaper me-2"></i>Manajemen Artikel</h3>
                <p class="text-subtitle">Kelola artikel dan konten blog</p>
            </div>
            <a href="<?php echo e(route('admin.articles.create')); ?>" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Tambah Artikel
            </a>
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
        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Total Artikel</h6>
                            <h3 class="mb-0"><?php echo e($stats['all']); ?></h3>
                        </div>
                        <div class="stats-icon purple">
                            <i class="bi bi-newspaper"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Dipublikasikan</h6>
                            <h3 class="mb-0"><?php echo e($stats['published']); ?></h3>
                        </div>
                        <div class="stats-icon green">
                            <i class="bi bi-check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Draft</h6>
                            <h3 class="mb-0"><?php echo e($stats['draft']); ?></h3>
                        </div>
                        <div class="stats-icon blue">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter & Search -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link <?php echo e($filterStatus === 'all' ? 'active' : ''); ?>" 
                               href="#" wire:click.prevent="setFilter('all')">
                                Semua (<?php echo e($stats['all']); ?>)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e($filterStatus === 'published' ? 'active' : ''); ?>" 
                               href="#" wire:click.prevent="setFilter('published')">
                                Published (<?php echo e($stats['published']); ?>)
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo e($filterStatus === 'draft' ? 'active' : ''); ?>" 
                               href="#" wire:click.prevent="setFilter('draft')">
                                Draft (<?php echo e($stats['draft']); ?>)
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" 
                               class="form-control" 
                               placeholder="Cari artikel..." 
                               wire:model.live.debounce.300ms="search">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Articles Table -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="80">Thumbnail</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th width="200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <!--[if BLOCK]><![endif]--><?php if($article->thumbnail_image_url): ?>
                                        <img src="<?php echo e(asset('storage/' . $article->thumbnail_image_url)); ?>" 
                                             alt="Thumbnail"
                                             class="img-thumbnail"
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                    <?php else: ?>
                                        <div class="bg-secondary d-flex align-items-center justify-content-center" 
                                             style="width: 60px; height: 60px;">
                                            <i class="bi bi-image text-white"></i>
                                        </div>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </td>
                                <td>
                                    <div class="fw-bold"><?php echo e(Str::limit($article->title, 50)); ?></div>
                                    <small class="text-muted"><?php echo e($article->slug); ?></small>
                                </td>
                                <td><?php echo e($article->user ? $article->user->name : 'N/A'); ?></td>
                                <td>
                                    <!--[if BLOCK]><![endif]--><?php if($article->published_at): ?>
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle"></i> Published
                                        </span>
                                    <?php else: ?>
                                        <span class="badge bg-secondary">
                                            <i class="bi bi-file-earmark"></i> Draft
                                        </span>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                </td>
                                <td>
                                    <small>
                                        <?php echo e($article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y')); ?>

                                    </small>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="<?php echo e(route('articles.show', $article->slug)); ?>" 
                                           target="_blank"
                                           class="btn btn-info" 
                                           title="Lihat">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="<?php echo e(route('admin.articles.edit', $article->id)); ?>" 
                                           class="btn btn-warning" 
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button wire:click="togglePublish(<?php echo e($article->id); ?>)" 
                                                class="btn <?php echo e($article->published_at ? 'btn-secondary' : 'btn-success'); ?>"
                                                title="<?php echo e($article->published_at ? 'Unpublish' : 'Publish'); ?>">
                                            <i class="bi bi-<?php echo e($article->published_at ? 'x-circle' : 'check-circle'); ?>"></i>
                                        </button>
                                        <button wire:click="deleteArticle(<?php echo e($article->id); ?>)" 
                                                wire:confirm="Hapus artikel ini secara permanen?"
                                                class="btn btn-danger" 
                                                title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i class="bi bi-inbox display-4 text-muted d-block mb-2"></i>
                                    <p class="text-muted">Tidak ada artikel ditemukan.</p>
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
        <?php echo e($articles->links()); ?>

    </div>
</div>
<?php /**PATH C:\Users\user\Documents\WEB_HOMESPIRE\resources\views/livewire/admin/article-management.blade.php ENDPATH**/ ?>