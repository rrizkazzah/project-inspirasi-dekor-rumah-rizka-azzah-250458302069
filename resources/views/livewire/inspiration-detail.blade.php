<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Back Button --}}
        <div class="mb-6">
            <a href="{{ route('gallery') }}" wire:navigate 
               class="inline-flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-800 dark:hover:text-indigo-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali ke Galeri
            </a>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            {{-- Image Section --}}
            <div class="space-y-4">
                <div class="aspect-[3/4] rounded-lg overflow-hidden bg-gray-200 dark:bg-gray-700">
                    @if($inspiration->image_url)
                        <img src="{{ asset('storage/' . $inspiration->image_url) }}" 
                             alt="{{ $inspiration->title }}"
                             class="w-full h-full object-cover">
                    @else
                        <div class="w-full h-full flex items-center justify-center text-gray-400">
                            <svg class="w-24 h-24" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    @endif
                </div>

                {{-- Actions --}}
                <div class="flex items-center gap-4">
                    <livewire:toggle-like :inspiration="$inspiration" />
                    <livewire:toggle-favorite :inspiration="$inspiration" />
                    <livewire:report-form :inspiration="$inspiration" />
                </div>
            </div>

            {{-- Details Section --}}
            <div class="space-y-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900 dark:text-white mb-2">
                        {{ $inspiration->title }}
                    </h1>
                    
                    <div class="flex flex-wrap gap-2 mb-4">
                        @if($inspiration->ruangan)
                            <span class="px-3 py-1 bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 rounded-full text-sm">
                                {{ $inspiration->ruangan->name }}
                            </span>
                        @endif
                        @if($inspiration->tag)
                            <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200 rounded-full text-sm">
                                {{ $inspiration->tag->name }}
                            </span>
                        @endif
                    </div>

                    @if($inspiration->description)
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            {{ $inspiration->description }}
                        </p>
                    @endif
                </div>

                {{-- Additional Info --}}
                <div class="border-t border-gray-200 dark:border-gray-700 pt-6 space-y-3">
                    @if($inspiration->design_by)
                        <div class="flex items-center text-sm">
                            <span class="font-semibold text-gray-600 dark:text-gray-400 w-32">Desainer:</span>
                            <span class="text-gray-900 dark:text-white">{{ $inspiration->design_by }}</span>
                        </div>
                    @endif

                    @if($inspiration->area)
                        <div class="flex items-center text-sm">
                            <span class="font-semibold text-gray-600 dark:text-gray-400 w-32">Luas:</span>
                            <span class="text-gray-900 dark:text-white">{{ $inspiration->area }}</span>
                        </div>
                    @endif

                    @if($inspiration->year)
                        <div class="flex items-center text-sm">
                            <span class="font-semibold text-gray-600 dark:text-gray-400 w-32">Tahun:</span>
                            <span class="text-gray-900 dark:text-white">{{ $inspiration->year }}</span>
                        </div>
                    @endif

                    @if($inspiration->country)
                        <div class="flex items-center text-sm">
                            <span class="font-semibold text-gray-600 dark:text-gray-400 w-32">Lokasi:</span>
                            <span class="text-gray-900 dark:text-white">{{ $inspiration->country }}</span>
                        </div>
                    @endif

                    @if($inspiration->jenis_material)
                        <div class="flex items-center text-sm">
                            <span class="font-semibold text-gray-600 dark:text-gray-400 w-32">Material:</span>
                            <span class="text-gray-900 dark:text-white">{{ $inspiration->jenis_material }}</span>
                        </div>
                    @endif

                    <div class="flex items-center text-sm">
                        <span class="font-semibold text-gray-600 dark:text-gray-400 w-32">Diunggah oleh:</span>
                        <span class="text-gray-900 dark:text-white">{{ $inspiration->user->name }}</span>
                    </div>

                    <div class="flex items-center text-sm">
                        <span class="font-semibold text-gray-600 dark:text-gray-400 w-32">Tanggal:</span>
                        <span class="text-gray-900 dark:text-white">{{ $inspiration->created_at->format('d M Y') }}</span>
                    </div>
                </div>

                {{-- Stats --}}
                <div class="flex items-center gap-6 text-sm text-gray-600 dark:text-gray-400 border-t border-gray-200 dark:border-gray-700 pt-6">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ $inspiration->likedBy()->count() }} Likes</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-yellow-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                        </svg>
                        <span>{{ $inspiration->favoritedBy()->count() }} Favorites</span>
                    </div>
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5 text-blue-500" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10c0 3.866-3.582 7-8 7a8.841 8.841 0 01-4.083-.98L2 17l1.338-3.123C2.493 12.767 2 11.434 2 10c0-3.866 3.582-7 8-7s8 3.134 8 7zM7 9H5v2h2V9zm8 0h-2v2h2V9zM9 9h2v2H9V9z" clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ $inspiration->comments()->approved()->count() }} Komentar</span>
                    </div>
                </div>
            </div>
        </div>

        {{-- Comments Section --}}
        <div class="mt-12">
            <livewire:comment-section :inspiration="$inspiration" />
        </div>
    </div>
</div>

