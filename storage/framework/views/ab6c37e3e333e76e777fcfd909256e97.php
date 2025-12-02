<div class="space-y-6">
    <h2 class="text-2xl font-bold text-gray-900 dark:text-white">
        Komentar (<?php echo e($comments->count()); ?>)
    </h2>

    
    <!--[if BLOCK]><![endif]--><?php if(auth()->guard()->check()): ?>
        <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-sm">
            <form wire:submit="addComment">
                <div class="mb-4">
                    <label for="newComment" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Tambahkan Komentar
                    </label>
                    <textarea 
                        wire:model="newComment"
                        id="newComment"
                        rows="3"
                        class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-transparent dark:bg-gray-700 dark:text-white"
                        placeholder="Tulis komentar Anda..."
                    ></textarea>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['newComment'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> 
                        <span class="text-red-500 text-sm"><?php echo e($message); ?></span> 
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                <div class="flex justify-end">
                    <button type="submit" 
                        class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors">
                        Kirim Komentar
                    </button>
                </div>
            </form>

            <!--[if BLOCK]><![endif]--><?php if(session()->has('message')): ?>
                <div class="mt-4 p-4 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-200 rounded-lg">
                    <?php echo e(session('message')); ?>

                </div>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>
    <?php else: ?>
        <div class="bg-gray-50 dark:bg-gray-800 rounded-lg p-6 text-center">
            <p class="text-gray-600 dark:text-gray-400 mb-4">
                Silakan login untuk menambahkan komentar
            </p>
            <a href="<?php echo e(route('login')); ?>" 
               class="inline-block px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                Login
            </a>
        </div>
    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

    
    <div class="space-y-4">
        <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-sm">
                <div class="flex items-start gap-4">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 rounded-full bg-indigo-600 flex items-center justify-center text-white font-semibold">
                            <?php echo e(substr($comment->user->name, 0, 1)); ?>

                        </div>
                    </div>
                    <div class="flex-1">
                        <div class="flex items-center justify-between mb-2">
                            <h4 class="font-semibold text-gray-900 dark:text-white">
                                <?php echo e($comment->user->name); ?>

                            </h4>
                            <span class="text-sm text-gray-500 dark:text-gray-400">
                                <?php echo e($comment->created_at->diffForHumans()); ?>

                            </span>
                        </div>
                        <p class="text-gray-700 dark:text-gray-300">
                            <?php echo e($comment->content); ?>

                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="text-center py-8 text-gray-500 dark:text-gray-400">
                <svg class="mx-auto h-12 w-12 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                </svg>
                <p>Belum ada komentar. Jadilah yang pertama berkomentar!</p>
            </div>
        <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
    </div>
</div>

<?php /**PATH C:\Users\user\Documents\WEB_HOMESPIRE\resources\views/livewire/comment-section.blade.php ENDPATH**/ ?>