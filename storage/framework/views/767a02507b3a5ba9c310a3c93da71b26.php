<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-serif font-bold text-secondary dark:text-dark-secondary">
                Inspirasi Disukai
            </h1>
            <p class="mt-2 text-base-content/70 dark:text-dark-base-content/70">
                Koleksi inspirasi desain interior yang Anda sukai
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

        <!-- Stats Card -->
        <div class="bg-base-100 dark:bg-dark-base-100 rounded-lg shadow-md p-4 border-l-4 border-error mb-8 inline-block">
            <div class="flex items-center gap-3">
                <svg class="w-8 h-8 text-error" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                </svg>
                <div>
                    <div class="text-2xl font-bold text-base-content dark:text-dark-base-content"><?php echo e($totalLikes); ?></div>
                    <div class="text-sm text-base-content/70 dark:text-dark-base-content/70">Total Disukai</div>
                </div>
            </div>
        </div>

        <!-- Filter & Search -->
        <div class="bg-base-100 dark:bg-dark-base-100 rounded-lg shadow-md mb-6 p-4">
            <div class="flex flex-col md:flex-row gap-4 items-center justify-between">
                <!-- Search -->
                <div class="relative w-full md:w-96">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-5 h-5 text-base-content/50 pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                    <input type="text" 
                           wire:model.live.debounce.300ms="search"
                           placeholder="Cari inspirasi..." 
                           class="input input-bordered w-full pl-10">
                </div>

                <!-- Sort -->
                <div class="flex items-center gap-2">
                    <span class="text-sm text-base-content/70">Urutkan:</span>
                    <select wire:model.live="sortBy" class="select select-bordered select-sm">
                        <option value="latest">Terbaru Disukai</option>
                        <option value="oldest">Terlama Disukai</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Inspirations Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $inspirations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $inspiration): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="bg-base-100 dark:bg-dark-base-100 rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow duration-300 group">
                    <!-- Image -->
                    <a href="<?php echo e(route('inspiration.show', $inspiration->id)); ?>" class="block relative aspect-[4/3] overflow-hidden bg-base-200 dark:bg-dark-base-200">
                        <!--[if BLOCK]><![endif]--><?php if($inspiration->image_url): ?>
                            <img src="<?php echo e(asset('storage/' . $inspiration->image_url)); ?>" 
                                 alt="<?php echo e($inspiration->title); ?>"
                                 class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                        <?php else: ?>
                            <div class="w-full h-full flex items-center justify-center">
                                <svg class="w-16 h-16 text-base-content/30 dark:text-dark-base-content/30" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                        
                        <!-- Like Badge -->
                        <div class="absolute top-2 right-2">
                            <span class="px-3 py-1 bg-error text-error-content text-xs font-semibold rounded-full shadow-lg flex items-center gap-1">
                                <svg class="w-3 h-3" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                </svg>
                                Disukai
                            </span>
                        </div>
                    </a>

                    <!-- Content -->
                    <div class="p-4">
                        <a href="<?php echo e(route('inspiration.show', $inspiration->id)); ?>">
                            <h3 class="font-semibold text-base-content dark:text-dark-base-content line-clamp-2 mb-2 hover:text-primary transition-colors">
                                <?php echo e($inspiration->title); ?>

                            </h3>
                        </a>

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
                                <!--[if BLOCK]><![endif]--><?php if($inspiration->user): ?>
                                    <span class="text-xs">
                                        oleh <?php echo e($inspiration->user->name); ?>

                                    </span>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            </div>

                            <!-- Unlike Button -->
                            <button wire:click="unlikeInspiration(<?php echo e($inspiration->id); ?>)"
                                    wire:confirm="Yakin ingin menghapus dari daftar yang disukai?"
                                    class="p-2 hover:bg-error/10 rounded-lg transition-colors group/btn"
                                    title="Hapus dari disukai">
                                <svg class="w-5 h-5 text-error group-hover/btn:scale-110 transition-transform" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="col-span-full text-center py-12">
                    <svg class="mx-auto h-16 w-16 text-base-content/40 dark:text-dark-base-content/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-base-content dark:text-dark-base-content">
                        <!--[if BLOCK]><![endif]--><?php if($search): ?>
                            Tidak ada inspirasi ditemukan
                        <?php else: ?>
                            Belum ada inspirasi yang disukai
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </h3>
                    <p class="mt-2 text-sm text-base-content/70 dark:text-dark-base-content/70">
                        <!--[if BLOCK]><![endif]--><?php if($search): ?>
                            Coba kata kunci lain atau hapus filter pencarian.
                        <?php else: ?>
                            Jelajahi galeri inspirasi dan tekan tombol ❤️ untuk menyukai inspirasi favorit Anda!
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                    </p>
                    <div class="mt-6">
                        <a href="<?php echo e(route('gallery')); ?>" class="btn btn-primary">
                            🔍 Jelajahi Galeri
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
<?php /**PATH C:\Users\user\Documents\WEB_HOMESPIRE\resources\views/livewire/my-likes.blade.php ENDPATH**/ ?>