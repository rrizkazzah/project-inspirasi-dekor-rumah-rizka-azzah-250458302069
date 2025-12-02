<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                Artikel & Tips DIY
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                Panduan dan tips dekorasi rumah dari para ahli
            </p>
        </div>

        <!--[if BLOCK]><![endif]--><?php if($articles->isEmpty()): ?>
            <div class="text-center py-12">
                <p class="text-gray-500 dark:text-gray-400">Belum ada artikel yang dipublikasikan.</p>
            </div>
        <?php else: ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <article class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden hover:shadow-xl transition-shadow">
                        <!-- Featured Image -->
                        <!--[if BLOCK]><![endif]--><?php if($article->thumbnail_image_url): ?>
                            <img src="<?php echo e(asset('storage/' . $article->thumbnail_image_url)); ?>" 
                                 alt="<?php echo e($article->title); ?>"
                                 class="w-full h-48 object-cover">
                        <?php else: ?>
                            <div class="h-48 bg-gradient-to-br from-indigo-400 to-purple-500 flex items-center justify-center">
                                <svg class="w-16 h-16 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                        <div class="p-6">
                            <!-- Category/Date -->
                            <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-2">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                                <?php echo e($article->published_at->format('d M Y')); ?>

                            </div>

                            <!-- Title -->
                            <h2 class="text-xl font-bold text-gray-900 dark:text-white mb-3">
                                <?php echo e($article->title); ?>

                            </h2>

                            <!-- Excerpt -->
                            <p class="text-gray-600 dark:text-gray-400 mb-4 line-clamp-3">
                                <?php echo e(Str::limit(strip_tags($article->content), 150)); ?>

                            </p>

                            <!-- Read More -->
                            <a href="<?php echo e(route('articles.show', $article->slug)); ?>" 
                               wire:navigate
                               class="inline-flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300 font-semibold">
                                Baca Selengkapnya
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                                </svg>
                            </a>
                        </div>
                    </article>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>

            <div class="mt-8">
                <?php echo e($articles->links()); ?>

            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div>
<?php /**PATH C:\Users\user\Documents\WEB_HOMESPIRE\resources\views/livewire/article-list.blade.php ENDPATH**/ ?>