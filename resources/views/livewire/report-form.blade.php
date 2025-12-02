<div x-data="{
    showToast: false,
    toastMessage: '',
    toastType: 'success'
}"
@notify.window="
    showToast = true;
    toastMessage = $event.detail.message;
    toastType = $event.detail.type;
    setTimeout(() => showToast = false, 5000);
">
    {{-- Report Button --}}
    <button wire:click="openModal"
        class="flex items-center gap-2 px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700
        dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1
            1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9"></path>
        </svg>
        <span class="font-medium">Laporkan</span>
    </button>

    {{-- Toast Notification --}}
    <div x-show="showToast"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed top-4 right-4 z-50"
         style="display: none;">
        <div :class="{
            'bg-green-500': toastType === 'success',
            'bg-red-500': toastType === 'error',
            'bg-blue-500': toastType === 'info'
        }" class="text-white px-6 py-3 rounded-lg shadow-lg flex items-center gap-3 min-w-[300px]">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span x-text="toastMessage"></span>
            <button @click="showToast = false" class="ml-auto">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>

    {{-- Modal --}}
    @if($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
                {{-- Background overlay --}}
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" wire:click="closeModal"></div>

                {{-- Modal panel --}}
                <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 dark:bg-red-900 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path>
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-white" id="modal-title">
                                    Laporkan Gambar
                                </h3>
                                <div class="mt-4">
                                    <form wire:submit="submitReport">
                                        <div class="mb-4">
                                            <label for="reason" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Alasan Laporan *
                                            </label>
                                            <select wire:model="reason"
                                                id="reason"
                                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white">
                                                <option value="">Pilih alasan...</option>
                                                <option value="Konten tidak pantas">Konten tidak pantas</option>
                                                <option value="Spam">Spam</option>
                                                <option value="Hak cipta">Pelanggaran hak cipta</option>
                                                <option value="Menyesatkan">Informasi menyesatkan</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                            @error('reason')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>

                                        <div class="mb-4">
                                            <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                                Deskripsi (Opsional)
                                            </label>
                                            <textarea
                                                wire:model="description"
                                                id="description"
                                                rows="3"
                                                class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 focus:border-transparent dark:bg-gray-700 dark:text-white"
                                                placeholder="Jelaskan lebih detail tentang laporan Anda..."
                                            ></textarea>
                                            @error('description')
                                                <span class="text-red-500 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button wire:click="submitReport" type="button"
                            class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2
                            bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm">
                            Kirim Laporan
                        </button>
                        <button wire:click="closeModal" type="button"
                            class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-800 text-base font-medium
                            text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:w-auto sm:text-sm">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

