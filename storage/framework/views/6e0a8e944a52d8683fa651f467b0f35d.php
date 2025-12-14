<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
     <?php $__env->slot('header', null, []); ?> 
        <h2 class="text-2xl font-serif font-bold text-secondary dark:text-dark-secondary">
            Profil Saya
        </h2>
        <p class="mt-1 text-sm text-base-content/70 dark:text-dark-base-content/70">
            Kelola informasi akun dan keamanan Anda
        </p>
     <?php $__env->endSlot(); ?>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 space-y-6">
            <!-- Profile Information Card -->
            <div class="bg-base-100 dark:bg-dark-base-100 shadow-lg rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-base-300 dark:border-dark-base-300 bg-base-200/50 dark:bg-dark-base-200/50">
                    <h3 class="text-lg font-serif font-semibold text-base-content dark:text-dark-base-content">
                        Informasi Profil
                    </h3>
                    <p class="mt-1 text-sm text-base-content/70 dark:text-dark-base-content/70">
                        Update informasi nama dan email akun Anda
                    </p>
                </div>
                <div class="p-6">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.update-profile-information-form', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1099440550-0', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                </div>
            </div>

            <!-- Update Password Card -->
            <div class="bg-base-100 dark:bg-dark-base-100 shadow-lg rounded-lg overflow-hidden">
                <div class="px-6 py-4 border-b border-base-300 dark:border-dark-base-300 bg-base-200/50 dark:bg-dark-base-200/50">
                    <h3 class="text-lg font-serif font-semibold text-base-content dark:text-dark-base-content">
                        Update Password
                    </h3>
                    <p class="mt-1 text-sm text-base-content/70 dark:text-dark-base-content/70">
                        Pastikan akun Anda menggunakan password yang kuat untuk keamanan
                    </p>
                </div>
                <div class="p-6">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.update-password-form', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1099440550-1', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                </div>
            </div>

            <!-- Delete Account Card -->
            <div class="bg-base-100 dark:bg-dark-base-100 shadow-lg rounded-lg overflow-hidden border-2 border-error/20 dark:border-dark-error/20">
                <div class="px-6 py-4 border-b border-error/20 dark:border-dark-error/20 bg-error/5 dark:bg-dark-error/10">
                    <h3 class="text-lg font-serif font-semibold text-error dark:text-dark-error">
                        Hapus Akun
                    </h3>
                    <p class="mt-1 text-sm text-base-content/70 dark:text-dark-base-content/70">
                        Hapus akun Anda secara permanen. Tindakan ini tidak dapat dibatalkan
                    </p>
                </div>
                <div class="p-6">
                    <?php
$__split = function ($name, $params = []) {
    return [$name, $params];
};
[$__name, $__params] = $__split('profile.delete-user-form', []);

$__html = app('livewire')->mount($__name, $__params, 'lw-1099440550-2', $__slots ?? [], get_defined_vars());

echo $__html;

unset($__html);
unset($__name);
unset($__params);
unset($__split);
if (isset($__slots)) unset($__slots);
?>
                </div>
            </div>
        </div>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php /**PATH C:\Users\user\Documents\WEB_HOMESPIRE\resources\views/profile.blade.php ENDPATH**/ ?>