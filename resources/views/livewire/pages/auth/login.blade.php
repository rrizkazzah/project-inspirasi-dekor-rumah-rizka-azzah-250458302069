<?php

use App\Livewire\Forms\LoginForm;
use Illuminate\Support\Facades\Session;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public LoginForm $form;

    /**
     * Handle an incoming authentication request.
     */
    public function login(): void
    {
        $this->validate();

        $this->form->authenticate();

        Session::regenerate();

        $this->redirectIntended(default: url('/'), navigate: false);
    }
}; ?>

<div>
    <div class="mb-8">
        <h2 class="text-3xl font-serif font-bold text-secondary dark:text-dark-secondary">Masuk ke Akun Anda</h2>
        <p class="mt-2 text-sm text-base-content/70 dark:text-dark-base-content/70">
            Belum punya akun?
            <a href="{{ route('register') }}" class="font-medium text-primary dark:text-dark-primary hover:underline" wire:navigate>
                Daftar sekarang
            </a>
        </p>
    </div>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form wire:submit="login" class="space-y-6">
        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-base-content dark:text-dark-base-content">Email</label>
            <input wire:model="form.email" id="email" type="email" name="email" required autofocus autocomplete="username"
                   class="mt-1 block w-full rounded-md border-base-300 bg-base-200/50 shadow-xs focus:border-primary focus:ring-3 focus:ring-primary/50 dark:border-dark-base-300 dark:bg-dark-base-200/50 dark:focus:border-dark-primary dark:focus:ring-dark-primary/50"
                   placeholder="nama@email.com">
            <x-input-error :messages="$errors->get('form.email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-base-content dark:text-dark-base-content">Password</label>
            <input wire:model="form.password" id="password" type="password" name="password" required autocomplete="current-password"
                   class="mt-1 block w-full rounded-md border-base-300 bg-base-200/50 shadow-xs focus:border-primary focus:ring-3 focus:ring-primary/50 dark:border-dark-base-300 dark:bg-dark-base-200/50 dark:focus:border-dark-primary dark:focus:ring-dark-primary/50"
                   placeholder="••••••••">
            <x-input-error :messages="$errors->get('form.password')" class="mt-2" />
        </div>

        <!-- Remember Me & Forgot Password -->
        <div class="flex items-center justify-between">
            <label for="remember" class="inline-flex items-center">
                <input wire:model="form.remember" id="remember" type="checkbox"
                       class="rounded-sm border-base-300 text-primary shadow-xs focus:border-primary focus:ring-3 focus:ring-offset-0 focus:ring-primary/50 dark:border-dark-base-300 dark:text-dark-primary dark:focus:border-dark-primary dark:focus:ring-dark-primary/50">
                <span class="ml-2 text-sm text-base-content dark:text-dark-base-content">Ingat saya</span>
            </label>

            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-primary dark:text-dark-primary hover:underline" wire:navigate>
                    Lupa password?
                </a>
            @endif
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
        <a href="{{ url('/') }}" class="text-sm text-base-content/70 dark:text-dark-base-content/70 hover:text-primary dark:hover:text-dark-primary">
            <svg class="w-4 h-4 inline-block mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            Halaman Utama
        </a>
    </div>
</div>
