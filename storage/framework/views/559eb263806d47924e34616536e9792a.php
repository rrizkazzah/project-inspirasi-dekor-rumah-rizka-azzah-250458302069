<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

?>

<div>
    <div class="mb-8">
        <h2 class="text-3xl font-serif font-bold text-secondary dark:text-dark-secondary">Masuk ke Akun Anda</h2>
        <p class="mt-2 text-sm text-base-content/70 dark:text-dark-base-content/70">
            Belum punya akun? 
            <a href="<?php echo e(route('register')); ?>" class="font-medium text-primary dark:text-dark-primary hover:underline" wire:navigate>
                Daftar sekarang
            </a>
        </p>
    </div>

    <!-- Session Status -->
    <?php if (isset($component)) { $__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.auth-session-status','data' => ['class' => 'mb-4','status' => session('status')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('auth-session-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'mb-4','status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(session('status'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5)): ?>
<?php $attributes = $__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5; ?>
<?php unset($__attributesOriginal7c1bf3a9346f208f66ee83b06b607fb5); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5)): ?>
<?php $component = $__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5; ?>
<?php unset($__componentOriginal7c1bf3a9346f208f66ee83b06b607fb5); ?>
<?php endif; ?>

    <form wire:submit="login" class="space-y-6">
        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-base-content dark:text-dark-base-content">Email</label>
            <input wire:model="form.email" id="email" type="email" name="email" required autofocus autocomplete="username" 
                   class="mt-1 block w-full rounded-md border-base-300 bg-base-200/50 shadow-xs focus:border-primary focus:ring-3 focus:ring-primary/50 dark:border-dark-base-300 dark:bg-dark-base-200/50 dark:focus:border-dark-primary dark:focus:ring-dark-primary/50"
                   placeholder="nama@email.com">
            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('form.email'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('form.email')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-base-content dark:text-dark-base-content">Password</label>
            <input wire:model="form.password" id="password" type="password" name="password" required autocomplete="current-password"
                   class="mt-1 block w-full rounded-md border-base-300 bg-base-200/50 shadow-xs focus:border-primary focus:ring-3 focus:ring-primary/50 dark:border-dark-base-300 dark:bg-dark-base-200/50 dark:focus:border-dark-primary dark:focus:ring-dark-primary/50"
                   placeholder="••••••••">
            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('form.password'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('form.password')),'class' => 'mt-2']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $attributes = $__attributesOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__attributesOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalf94ed9c5393ef72725d159fe01139746)): ?>
<?php $component = $__componentOriginalf94ed9c5393ef72725d159fe01139746; ?>
<?php unset($__componentOriginalf94ed9c5393ef72725d159fe01139746); ?>
<?php endif; ?>
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox" 
                       class="rounded-sm border-base-300 text-primary shadow-xs focus:border-primary focus:ring-3 focus:ring-offset-0 focus:ring-primary/50 dark:border-dark-base-300 dark:text-dark-primary dark:focus:border-dark-primary dark:focus:ring-dark-primary/50">
                <span class="ml-2 text-sm text-base-content dark:text-dark-base-content">Ingat saya</span>
            </label>

            <!--[if BLOCK]><![endif]--><?php if(Route::has('password.request')): ?>
                <a href="<?php echo e(route('password.request')); ?>" class="text-sm text-primary dark:text-dark-primary hover:underline" wire:navigate>
                    Lupa password?
                </a>
            <?php endif; ?><!--[if ENDBLOCK]><![endif]-->
        </div>

        <div>
            <button type="submit" class="btn btn-primary w-full">
                Masuk
            </button>
        </div>
    </form>

    <!-- Divider -->
    <div class="relative my-8">
        <div class="absolute inset-0 flex items-center">
            <div class="w-full border-t border-base-200 dark:border-dark-base-200"></div>
        </div>
        <div class="relative flex justify-center text-sm">
            <span class="px-2 bg-base-100 dark:bg-dark-base-100 text-base-content/70 dark:text-dark-base-content/70">
                Atau kembali ke
            </span>
        </div>
    </div>

    <!-- Back to Home -->
    <div class="text-center">
        <a href="<?php echo e(url('/')); ?>" class="text-sm text-base-content/70 dark:text-dark-base-content/70 hover:text-primary dark:hover:text-dark-primary">
            <svg class="w-4 h-4 inline-block mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            Halaman Utama
        </a>
    </div>
</div><?php /**PATH C:\Users\user\Documents\WEB_HOMESPIRE\resources\views\livewire/pages/auth/login.blade.php ENDPATH**/ ?>