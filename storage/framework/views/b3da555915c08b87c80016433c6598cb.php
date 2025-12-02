<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-serif font-bold text-secondary dark:text-dark-secondary">
                Unggahan Saya
            </h1>
            <p class="mt-2 text-base-content/70 dark:text-dark-base-content/70">
                Kelola dan pantau status moderasi inspirasi yang Anda unggah
            </p>
        </div>

        <!-- Flash Message -->
        <!--[if BLOCK]><![endif]--><?php if(session()->has('success')): ?>
            <div class="alert alert-success mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span><?php echo e(session('success')); ?></span>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <!-- Stats Cards -->
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="bg-base-100 dark:bg-dark-base-100 rounded-lg shadow-md p-4 border-l-4 border-primary dark:border-dark-primary">
                <div class="text-2xl font-bold text-base-content dark:text-dark-base-content"><?php echo e($stats['all']); ?></div>
                <div class="text-sm text-base-content/70 dark:text-dark-base-content/70">Total Unggahan</div>
            </div>
            <div class="bg-base-100 dark:bg-dark-base-100 rounded-lg shadow-md p-4 border-l-4 border-warning">
                <div class="text-2xl font-bold text-base-content dark:text-dark-base-content"><?php echo e($stats['pending']); ?></div>
                <div class="text-sm text-base-content/70 dark:text-dark-base-content/70">Pending</div>
            </div>
            <div class="bg-base-100 dark:bg-dark-base-100 rounded-lg shadow-md p-4 border-l-4 border-success">
                <div class="text-2xl font-bold text-base-content dark:text-dark-base-content"><?php echo e($stats['approved']); ?></div>
                <div class="text-sm text-base-content/70 dark:text-dark-base-content/70">Disetujui</div>
            </div>
            <div class="bg-base-100 dark:bg-dark-base-100 rounded-lg shadow-md p-4 border-l-4 border-error">
                <div class="text-2xl font-bold text-base-content dark:text-dark-base-content"><?php echo e($stats['rejected']); ?></div>
                <div class="text-sm text-base-content/70 dark:text-dark-base-content/70">Ditolak</div>
            </div>
        </div>

        <!-- Status Filter Tabs -->
        <div class="bg-base-100 dark:bg-dark-base-100 rounded-lg shadow-md mb-6">
            <div class="border-b border-base-300 dark:border-dark-base-300">
                <nav class="flex -mb-px">
                    <button wire:click="setStatusFilter('all')"
                            class="px-6 py-3 text-sm font-medium transition-colors <?php echo e($statusFilter === 'all' ? 'border-b-2 border-primary text-primary dark:border-dark-primary dark:text-dark-primary' : 'text-base-content/70 hover:text-base-content dark:text-dark-base-content/70 dark:hover:text-dark-base-content'); ?>">
                        Semua (<?php echo e($stats['all']); ?>)
                    </button>
                    <button wire:click="setStatusFilter('pending')"
                            class="px-6 py-3 text-sm font-medium transition-colors <?php echo e($statusFilter === 'pending' ? 'border-b-2 border-warning text-warning' : 'text-base-content/70 hover:text-base-content dark:text-dark-base-content/70 dark:hover:text-dark-base-content'); ?>">
                        Pending (<?php echo e($stats['pending']); ?>)
                    </button>
                    <button wire:click="setStatusFilter('approved')"
                            class="px-6 py-3 text-sm font-medium transition-colors <?php echo e($statusFilter === 'approved' ? 'border-b-2 border-success text-success' : 'text-base-content/70 hover:text-base-content dark:text-dark-base-content/70 dark:hover:text-dark-base-content'); ?>">
                        Disetujui (<?php echo e($stats['approved']); ?>)
                    </button>
                    <button wire:click="setStatusFilter('rejected')"
                            class="px-6 py-3 text-sm font-medium transition-colors <?php echo e($statusFilter === 'rejected' ? 'border-b-2 border-error text-error' : 'text-base-content/70 hover:text-base-content dark:text-dark-base-content/70 dark:hover:text-dark-base-content'); ?>">
                        Ditolak (<?php echo e($stats['rejected']); ?>)
                    </button>
                </nav>
            </div>
        </div>

        <!-- Inspirations Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $inspirations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inspiration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-base-100 dark:bg-dark-base-100 rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300">
                    <!-- Image -->
                    <div class="relative aspect-[4/3] overflow-hidden bg-base-200 dark:bg-dark-base-200">
                        <!--[if BLOCK]><![endif]--><?php if($inspiration->image_url): ?>
                            <img src="<?php echo e(asset('storage/' . $inspiration->image_url)); ?>" 
                                 alt="<?php echo e($inspiration->title); ?>"
                                 class="w-full h-full object-cover">
                        <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-16 h-16 text-base-content/30 dark:text-dark-base-content/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        
                        <!-- Status Badge -->
                        <div class="absolute top-2 right-2">
                            <!--[if BLOCK]><![endif]--><?php if($inspiration->status === 'pending'): ?>
                                <span class="px-3 py-1 bg-warning text-warning-content text-xs font-semibold rounded-full shadow-lg">
                                    ⏳ Pending
                                </span>
                            <?php elseif($inspiration->status === 'approved'): ?>
                                <span class="px-3 py-1 bg-success text-success-content text-xs font-semibold rounded-full shadow-lg">
                                    ✓ Disetujui
                                </span>
                            <?php elseif($inspiration->status === 'rejected'): ?>
                                <span class="px-3 py-1 bg-error text-error-content text-xs font-semibold rounded-full shadow-lg">
                                    ✗ Ditolak
                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="p-4">
                        <h3 class="font-semibold text-base-content dark:text-dark-base-content line-clamp-2 mb-2">
                            <?php echo e($inspiration->title); ?>

                        </h3>

                        <!-- Meta Info -->
                        <div class="flex flex-wrap items-center gap-2 mb-3">
                            <!--[if BLOCK]><![endif]--><?php if($inspiration->ruangan): ?>
                                <span class="px-2 py-1 bg-base-200 dark:bg-dark-base-200 text-xs rounded">
                                    <?php echo e($inspiration->ruangan->name); ?>

                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <!--[if BLOCK]><![endif]--><?php if($inspiration->tag): ?>
                                <span class="px-2 py-1 bg-base-200 dark:bg-dark-base-200 text-xs rounded">
                                    <?php echo e($inspiration->tag->name); ?>

                                </span>
                            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>

                        <!-- Stats & Actions -->
                        <div class="flex items-center justify-between pt-3 border-t border-base-300 dark:border-dark-base-300">
                            <div class="flex items-center gap-3 text-sm text-base-content/70 dark:text-dark-base-content/70">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                    </svg>
                                    <?php echo e($inspiration->likedBy()->count()); ?>

                                </span>
                                <span class="text-xs">
                                    <?php echo e($inspiration->created_at->format('d M Y')); ?>

                                </span>
                            </div>

                            <!-- Actions Dropdown -->
                            <div x-data="{ open: false }" class="relative">
                                <button @click="open = !open" @click.away="open = false"
                                        class="p-2 hover:bg-base-200 dark:hover:bg-dark-base-200 rounded-lg transition-colors">
                                    <svg class="w-5 h-5 text-base-content/70 dark:text-dark-base-content/70" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z"></path>
                                    </svg>
                                </button>

                                <div x-show="open"
                                     x-transition:enter="transition ease-out duration-100"
                                     x-transition:enter-start="opacity-0 scale-95"
                                     x-transition:enter-end="opacity-100 scale-100"
                                     style="display: none;"
                                     class="absolute right-0 mt-2 w-48 bg-base-100 dark:bg-dark-base-200 rounded-lg shadow-lg border border-base-300 dark:border-dark-base-300 z-10">
                                    <!--[if BLOCK]><![endif]--><?php if($inspiration->status === 'approved'): ?>
                                        <a href="<?php echo e(route('inspiration.show', $inspiration->id)); ?>" 
                                           class="block px-4 py-2 text-sm hover:bg-base-200 dark:hover:bg-dark-base-300 rounded-t-lg">
                                            👁️ Lihat di Galeri
                                        </a>
                                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                                    <button wire:click="deleteInspiration(<?php echo e($inspiration->id); ?>)"
                                            wire:confirm="Yakin ingin menghapus inspirasi ini?"
                                            class="block w-full text-left px-4 py-2 text-sm text-error hover:bg-error/10 rounded-b-lg">
                                        🗑️ Hapus
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Status Info -->
                        <!--[if BLOCK]><![endif]--><?php if($inspiration->status === 'pending'): ?>
                            <div class="mt-3 p-2 bg-warning/10 rounded text-xs text-warning">
                                💡 Sedang dalam proses review admin
                            </div>
                        <?php elseif($inspiration->status === 'approved'): ?>
                            <div class="mt-3 p-2 bg-success/10 rounded text-xs text-success">
                                🎉 Inspirasi Anda sudah muncul di galeri publik!
                            </div>
                        <?php elseif($inspiration->status === 'rejected'): ?>
                            <div class="mt-3 p-2 bg-error/10 rounded text-xs text-error">
                                😔 Inspirasi ditolak. Silakan upload ulang dengan konten yang sesuai.
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-full text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-base-content/40 dark:text-dark-base-content/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-base-content dark:text-dark-base-content">
                        <!--[if BLOCK]><![endif]--><?php if($statusFilter === 'all'): ?>
                            Belum ada unggahan
                        <?php else: ?>
                            Tidak ada inspirasi dengan status: <?php echo e($statusFilter); ?>

                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </h3>
                    <p class="mt-1 text-sm text-base-content/70 dark:text-dark-base-content/70">
                        Mulai berbagi inspirasi desain interior Anda!
                    </p>
                    <div class="mt-4">
                        <a href="<?php echo e(route('inspiration.upload')); ?>" class="btn btn-primary">
                            + Unggah Inspirasi
                        </a>
                    </div>
                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <!-- Pagination -->
        <!--[if BLOCK]><![endif]--><?php if($inspirations->hasPages()): ?>
            <div class="mt-8">
                <?php echo e($inspirations->links()); ?>

            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div>
<?php /**PATH C:\Users\user\Documents\WEB_HOMESPIRE\resources\views/livewire/my-uploads.blade.php ENDPATH**/ ?>