<div class="py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-4">
                Pertanyaan yang Sering Diajukan
            </h1>
            <p class="text-lg text-gray-600 dark:text-gray-400">
                Temukan jawaban atas pertanyaan umum tentang Homespire
            </p>
        </div>

        <div class="space-y-4">
            <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $faqs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $faq): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
                    <button wire:click="toggle(<?php echo e($index); ?>)" 
                            class="w-full px-6 py-4 text-left flex justify-between items-center hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors">
                        <span class="text-lg font-semibold text-gray-900 dark:text-white">
                            <?php echo e($faq['question']); ?>

                        </span>
                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 transition-transform <?php echo e($openIndex === $index ? 'rotate-180' : ''); ?>" 
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    
                    <!--[if BLOCK]><![endif]--><?php if($openIndex === $index): ?>
                        <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-900">
                            <p class="text-gray-700 dark:text-gray-300">
                                <?php echo e($faq['answer']); ?>

                            </p>
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div class="mt-12 bg-indigo-50 dark:bg-indigo-900/20 rounded-lg p-8 text-center">
            <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                Masih Punya Pertanyaan?
            </h2>
            <p class="text-gray-600 dark:text-gray-400 mb-6">
                Tim kami siap membantu Anda. Hubungi kami melalui WhatsApp.
            </p>
            <div class="flex justify-center">
                <a href="https://wa.me/62xxxxxxxxxxx?text=Halo%20Homespire,%20saya%20ingin%20bertanya%20tentang..." 
                   target="_blank"
                   class="inline-flex items-center justify-center px-6 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors font-semibold">
                    <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                    </svg>
                    WhatsApp
                </a>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\user\Documents\WEB_HOMESPIRE\resources\views/livewire/faq.blade.php ENDPATH**/ ?>