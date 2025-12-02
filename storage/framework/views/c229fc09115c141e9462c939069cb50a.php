<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

?>

<div>
    <div class="mb-8">
        <h2 class="text-3xl font-serif font-bold text-secondary dark:text-dark-secondary">Buat Akun Baru</h2>
        <p class="mt-2 text-sm text-base-content/70 dark:text-dark-base-content/70">
            Sudah punya akun? 
            <a href="<?php echo e(route('login')); ?>" class="font-medium text-primary dark:text-dark-primary hover:underline" wire:navigate>
                Masuk di sini
            </a>
        </p>
    </div>

    <form wire:submit="register" class="space-y-6">
        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-base-content dark:text-dark-base-content">Nama Lengkap</label>
            <input wire:model="name" id="name" type="text" name="name" required autofocus autocomplete="name"
                   class="mt-1 block w-full rounded-md border-base-300 bg-base-200/50 shadow-xs focus:border-primary focus:ring-3 focus:ring-primary/50 dark:border-dark-base-300 dark:bg-dark-base-200/50 dark:focus:border-dark-primary dark:focus:ring-dark-primary/50"
                   placeholder="Nama Anda">
            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('name'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('name')),'class' => 'mt-2']); ?>
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

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-base-content dark:text-dark-base-content">Email</label>
            <input wire:model="email" id="email" type="email" name="email" required autocomplete="username"
                   class="mt-1 block w-full rounded-md border-base-300 bg-base-200/50 shadow-xs focus:border-primary focus:ring-3 focus:ring-primary/50 dark:border-dark-base-300 dark:bg-dark-base-200/50 dark:focus:border-dark-primary dark:focus:ring-dark-primary/50"
                   placeholder="nama@email.com">
            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('email'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('email')),'class' => 'mt-2']); ?>
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
            <input wire:model="password" id="password" type="password" name="password" required autocomplete="new-password"
                   class="mt-1 block w-full rounded-md border-base-300 bg-base-200/50 shadow-xs focus:border-primary focus:ring-3 focus:ring-primary/50 dark:border-dark-base-300 dark:bg-dark-base-200/50 dark:focus:border-dark-primary dark:focus:ring-dark-primary/50"
                   placeholder="Minimal 8 karakter">
            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('password'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('password')),'class' => 'mt-2']); ?>
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

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-base-content dark:text-dark-base-content">Konfirmasi Password</label>
            <input wire:model="password_confirmation" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                   class="mt-1 block w-full rounded-md border-base-300 bg-base-200/50 shadow-xs focus:border-primary focus:ring-3 focus:ring-primary/50 dark:border-dark-base-300 dark:bg-dark-base-200/50 dark:focus:border-dark-primary dark:focus:ring-dark-primary/50"
                   placeholder="Ulangi password">
            <?php if (isset($component)) { $__componentOriginalf94ed9c5393ef72725d159fe01139746 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginalf94ed9c5393ef72725d159fe01139746 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.input-error','data' => ['messages' => $errors->get('password_confirmation'),'class' => 'mt-2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('input-error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['messages' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($errors->get('password_confirmation')),'class' => 'mt-2']); ?>
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

        <div>
            <button type="submit" class="btn btn-primary w-full">
                Daftar Sekarang
            </button>
        </div>

        <p class="text-xs text-center text-base-content/60 dark:text-dark-base-content/60">
            Dengan mendaftar, Anda menyetujui 
            <a href="#" class="text-primary dark:text-dark-primary hover:underline">Syarat & Ketentuan</a> 
            dan 
            <a href="#" class="text-primary dark:text-dark-primary hover:underline">Kebijakan Privasi</a> 
            kami.
        </p>
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
</div><?php /**PATH C:\Users\user\Documents\WEB_HOMESPIRE\resources\views\livewire/pages/auth/register.blade.php ENDPATH**/ ?>