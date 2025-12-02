<x-app-layout>
    <x-slot name="header">
        <h2 class="text-2xl font-serif font-bold text-secondary dark:text-dark-secondary">
            Profil Saya
        </h2>
        <p class="mt-1 text-sm text-base-content/70 dark:text-dark-base-content/70">
            Kelola informasi akun dan keamanan Anda
        </p>
    </x-slot>

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
                    <livewire:profile.update-profile-information-form />
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
                    <livewire:profile.update-password-form />
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
                    <livewire:profile.delete-user-form />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
