<div class="py-8">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-base-100 dark:bg-dark-base-100 rounded-lg shadow-lg p-6">
            <h2 class="text-2xl font-serif font-bold text-secondary dark:text-dark-secondary mb-6">
                Unggah Inspirasi Dekorasi
            </h2>

            <!-- Info Alert -->
            <div class="alert alert-info mb-6">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="w-6 h-6 stroke-current shrink-0">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <div>
                    <h3 class="font-bold">Proses Moderasi</h3>
                    <div class="text-sm">
                        Inspirasi yang Anda unggah akan ditinjau oleh admin terlebih dahulu sebelum muncul di galeri publik.
                        Proses ini biasanya memakan waktu 1-2 hari kerja.
                    </div>
                </div>
            </div>

            <form wire:submit="submit" class="space-y-6">
                {{-- Image Upload --}}
                <div>
                    <label class="block text-sm font-medium text-base-content dark:text-dark-base-content mb-2">
                        Gambar Inspirasi *
                    </label>
                    <div class="flex items-center justify-center w-full">
                        <label for="image" class="flex flex-col items-center justify-center w-full h-64 border-2 border-base-300 dark:border-dark-base-300 border-dashed
                        rounded-lg cursor-pointer bg-base-200/50 dark:bg-dark-base-200/50 hover:bg-base-200 dark:hover:bg-dark-base-200">
                            @if ($image)
                                <div class="relative w-full h-full">
                                    <img src="{{ $image->temporaryUrl() }}" alt="Preview" class="w-full h-full object-cover rounded-lg">
                                </div>
                            @else
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg class="w-12 h-12 mb-4 text-base-content/50 dark:text-dark-base-content/50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15
                                        13l-3-3m0 0l-3 3m3-3v12"></path>
                                    </svg>
                                    <p class="mb-2 text-sm text-base-content dark:text-dark-base-content"><span class="font-semibold">Klik untuk upload</span> atau drag & drop</p>
                                    <p class="text-xs text-base-content/70 dark:text-dark-base-content/70">PNG, JPG (MAX. 5MB)</p>
                                </div>
                            @endif
                            <input wire:model="image" id="image" type="file" class="hidden" accept="image/*" />
                        </label>
                    </div>
                    @error('image') <span class="text-danger">{{ $message }}</span> @enderror
                    <div wire:loading wire:target="image" class="text-sm text-base-content/70 dark:text-dark-base-content/70 mt-2">Uploading...</div>
                </div>

                {{-- Title --}}
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Judul *
                    </label>
                    <input type="text" wire:model="title" id="title"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white"
                        placeholder="Contoh: Ruang Tamu Minimalis Modern">
                    @error('title') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                {{-- Description --}}
                <div>
                    <label for="description" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Deskripsi
                    </label>
                    <textarea wire:model="description" id="description" rows="4"
                        class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white"
                        placeholder="Ceritakan tentang inspirasi dekorasi ini..."></textarea>
                    @error('description') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    {{-- Ruangan --}}
                    <div>
                        <label for="ruangan_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Ruangan
                        </label>
                        <select wire:model="ruangan_id" id="ruangan_id"
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                            <option value="">Pilih Ruangan</option>
                            @foreach($ruangans as $ruangan)
                                <option value="{{ $ruangan->id }}">{{ $ruangan->name }}</option>
                            @endforeach
                        </select>
                        @error('ruangan_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>

                    {{-- Tag/Style --}}
                    <div>
                        <label for="tags_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Gaya Desain
                        </label>
                        <select wire:model="tags_id" id="tags_id"
                            class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white">
                            <option value="">Pilih Gaya</option>
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tags_id') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                    </div>
                </div>

                {{-- Optional Fields --}}
                <div class="border-t border-gray-200 dark:border-gray-700 pt-6">
                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-4">Informasi Tambahan (Opsional)</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="design_by" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Desainer
                            </label>
                            <input type="text" wire:model="design_by" id="design_by"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white"
                                placeholder="Nama desainer">
                            @error('design_by') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="area" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Luas Area
                            </label>
                            <input type="text" wire:model="area" id="area"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white"
                                placeholder="Contoh: 3x4 meter">
                            @error('area') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="year" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Tahun
                            </label>
                            <input type="number" wire:model="year" id="year"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white"
                                placeholder="{{ date('Y') }}">
                            @error('year') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div>
                            <label for="country" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Lokasi/Negara
                            </label>
                            <input type="text" wire:model="country" id="country"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white"
                                placeholder="Contoh: Indonesia">
                            @error('country') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label for="jenis_material" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Jenis Material
                            </label>
                            <input type="text" wire:model="jenis_material" id="jenis_material"
                                class="w-full px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-indigo-500 dark:bg-gray-700 dark:text-white"
                                placeholder="Contoh: Kayu jati, Granit, Kaca">
                            @error('jenis_material') <span class="text-red-500 text-sm">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>

                {{-- Submit Button --}}
                <div class="flex items-center justify-end gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('gallery') }}" wire:navigate
                        class="px-6 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition-colors">
                        Batal
                    </a>
                    <button type="submit"
                        class="px-6 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition-colors flex items-center gap-2">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                        </svg>
                        <span>Unggah Inspirasi</span>
                    </button>
                </div>
            </form>

            <div class="mt-6 p-4 bg-info/10 dark:bg-info/20 rounded-lg">
                <p class="text-sm text-info-content dark:text-info-content">
                    <strong>Catatan:</strong> Unggahan Anda akan ditinjau oleh tim moderator sebelum ditampilkan di galeri publik. Proses ini biasanya memakan waktu 1-2 hari kerja.
                </p>
            </div>
        </div>
    </div>
</div>

