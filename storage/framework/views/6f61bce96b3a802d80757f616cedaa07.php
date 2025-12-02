<div class="py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-base-100 dark:bg-dark-base-100 rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-serif font-bold text-secondary dark:text-dark-secondary mb-6">
                Tambahkan Testimonimu!
            </h2>

            <form wire:submit="submit" class="space-y-6">
                
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Name *
                    </label>
                    <input type="text" wire:model="name" id="name"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white"
                        placeholder="Masukkan Namamu">
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['name'];
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

                
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Testimoni *
                    </label>
                    <textarea wire:model="content" id="content" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white"
                        placeholder="Masukkan Testimonimu"></textarea>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['content'];
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

                <div>
                    <label for="ruangan_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Rating *
                    </label>
                    <select wire:model="ruangan_id" id="ruangan_id"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                        <option value="">Pilih Rating</option>
                        <option value="1">⭐ 1 - Kurang Baik</option>
                        <option value="2">⭐⭐ 2 - Cukup</option>
                        <option value="3">⭐⭐⭐ 3 - Baik</option>
                        <option value="4">⭐⭐⭐⭐ 4 - Sangat Baik</option>
                        <option value="5">⭐⭐⭐⭐⭐ 5 - Luar Biasa</option>
                    </select>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['rating'];
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

                
                <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <a href="<?php echo e(route('testimonials')); ?>" wire:navigate
                        class="px-6 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                            </path>
                        </svg>
                        <span>Submit</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\user\Documents\WEB_HOMESPIRE\resources\views/livewire/testimonial-insert.blade.php ENDPATH**/ ?>