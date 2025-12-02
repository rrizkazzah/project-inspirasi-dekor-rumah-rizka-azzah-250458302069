<div class="py-12">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                Testimoni Pengguna
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                Apa kata mereka tentang Homespire
            </p>
        </div>

        <!--[if BLOCK]><![endif]--><?php if($testimonials->isEmpty()): ?>
            <div class="text-center py-12">
                <p class="text-gray-500 dark:text-gray-400">Belum ada testimoni yang dipublikasikan.</p>
            </div>
        <?php else: ?>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $testimonials; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimonial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md p-6 hover:shadow-xl transition-shadow">
                        <!-- Rating -->
                        <div class="flex items-center mb-4">
                            <!--[if BLOCK]><![endif]--><?php for($i = 1; $i <= 5; $i++): ?>
                                <!--[if BLOCK]><![endif]--><?php if($i <= $testimonial->rating): ?>
                                    <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                <?php else: ?>
                                    <svg class="w-5 h-5 text-gray-300 dark:text-gray-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                    </svg>
                                <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                            <?php endfor; ?><!--[if ENDBLOCK]><![endif]-->
                        </div>

                        <!-- Content -->
                        <p class="text-gray-700 dark:text-gray-300 mb-6 italic">
                            "<?php echo e($testimonial->content); ?>"
                        </p>

                        <!-- profile orangnya -->
                        <div class="flex items-center">
                            <div class="w-12 h-12 bg-indigo-100 dark:bg-indigo-900 rounded-full flex items-center justify-center mr-4">
                                <span class="text-indigo-600 dark:text-indigo-400 font-semibold text-lg">
                                    
                                    <?php echo e(substr($testimonial->name, 0, 1)); ?>

                                </span>
                            </div>
                            <div>
                                <p class="font-semibold text-gray-900 dark:text-white"><?php echo e($testimonial->name); ?></p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Pengguna Homespire</p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

        <!-- CTA -->
        <div class="mt-16 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg p-8 text-center">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                Punya Pengalaman Menarik?
            </h2>
            <p class="text-gray-600 dark:text-gray-400 mb-6">
                Bagikan pengalaman Anda menggunakan Homespire dengan menambahkan testimonimu!
            </p>
            <a href="<?php echo e(route('testimonials.insert')); ?>"
               class="inline-flex items-center px-6 py-3 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors font-semibold">
                Kirim Testimoni
            </a>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\user\Documents\WEB_HOMESPIRE\resources\views/livewire/testimonial-list.blade.php ENDPATH**/ ?>