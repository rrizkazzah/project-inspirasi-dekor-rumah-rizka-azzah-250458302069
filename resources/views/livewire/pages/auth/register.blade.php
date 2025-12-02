<?php

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('layouts.guest')] class extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
        ]);

        $validated['password'] = Hash::make($validated['password']);

        event(new Registered($user = User::create($validated)));

        Auth::login($user);

        $this->redirect(url('/'), navigate: false);
    }
}; ?>

<div>
    <div class="mb-8">
        <h2 class="text-3xl font-serif font-bold text-secondary dark:text-dark-secondary">Buat Akun Baru</h2>
        <p class="mt-2 text-sm text-base-content/70 dark:text-dark-base-content/70">
            Sudah punya akun?
            <a href="{{ route('login') }}" class="font-medium text-primary dark:text-dark-primary hover:underline" wire:navigate>
                Masuk di sini
            </a>
        </p>
    </div>

    <form wire:submit="register" class="space-y-6">
        <!-- Name -->
        <div>
            <label for="name" class="block text-sm font-medium text-base-content dark:text-dark-base-content">Nama Lengkap</label>
            <input wire:model="name" id="name" type="text" name="name" required autofocus autocomplete="name"
                   class="mt-1 block w-full rounded-md border-base-300 bg-base-200/50 shadow-xs focus:border-primary focus:ring-3 focus:ring-primary/50
                   dark:border-dark-base-300 dark:bg-dark-base-200/50 dark:focus:border-dark-primary dark:focus:ring-dark-primary/50"
                   placeholder="Nama Anda">
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div>
            <label for="email" class="block text-sm font-medium text-base-content dark:text-dark-base-content">Email</label>
            <input wire:model="email" id="email" type="email" name="email" required autocomplete="username"
                   class="mt-1 block w-full rounded-md border-base-300 bg-base-200/50 shadow-xs focus:border-primary focus:ring-3 focus:ring-primary/50 dark:border-dark-base-300
                   dark:bg-dark-base-200/50 dark:focus:border-dark-primary dark:focus:ring-dark-primary/50"
                   placeholder="nama@email.com">
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div>
            <label for="password" class="block text-sm font-medium text-base-content dark:text-dark-base-content">Password</label>
            <input wire:model="password" id="password" type="password" name="password" required autocomplete="new-password"
                   class="mt-1 block w-full rounded-md border-base-300 bg-base-200/50 shadow-xs focus:border-primary focus:ring-3 focus:ring-primary/50
                   dark:border-dark-base-300 dark:bg-dark-base-200/50 dark:focus:border-dark-primary dark:focus:ring-dark-primary/50"
                   placeholder="Minimal 8 karakter">
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div>
            <label for="password_confirmation" class="block text-sm font-medium text-base-content dark:text-dark-base-content">Konfirmasi Password</label>
            <input wire:model="password_confirmation" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                   class="mt-1 block w-full rounded-md border-base-300 bg-base-200/50 shadow-xs focus:border-primary focus:ring-3 focus:ring-primary/50 dark:border-dark-base-300
                   dark:bg-dark-base-200/50 dark:focus:border-dark-primary dark:focus:ring-dark-primary/50"
                   placeholder="Ulangi password">
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
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
        <a href="{{ url('/') }}" class="text-sm text-base-content/70 dark:text-dark-base-content/70 hover:text-primary dark:hover:text-dark-primary">
            <svg class="w-4 h-4 inline-block mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
            </svg>
            Halaman Utama
        </a>
    </div>
</div>
