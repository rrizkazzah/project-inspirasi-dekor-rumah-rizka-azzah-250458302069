<div class="py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        {{-- Search & Filter Section --}}
        <div class="mb-8 space-y-4">
            {{-- Search Bar --}}
            <div class="relative">
                <input type="text" 
                    wire:model.live.debounce.300ms="search"
                    placeholder="Cari inspirasi dekorasi rumah..." 
                    class="w-full px-4 py-3 pr-12 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-indigo-500 focus:border-transparent">
                <svg class="absolute right-4 top-3.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </div>

            {{-- Filters --}}
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                {{-- Ruangan Filter --}}
                <select wire:model.live="ruanganFilter" 
                    class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-indigo-500">
                    <option value="">Semua Ruangan</option>
                    @foreach($ruangans as $ruangan)
                        <option value="{{ $ruangan->id }}">{{ $ruangan->name }}</option>
                    @endforeach
                </select>

                {{-- Tag Filter --}}
                <select wire:model.live="tagFilter" 
                    class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-indigo-500">
                    <option value="">Semua Gaya</option>
                    @foreach($tags as $tag)
                        <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>

                {{-- Sort Filter --}}
                <select wire:model.live="sortBy" 
                    class="px-4 py-2 rounded-lg border border-gray-300 dark:border-gray-600 dark:bg-gray-800 dark:text-white focus:ring-2 focus:ring-indigo-500">
                    <option value="latest">Terbaru</option>
                    <option value="oldest">Terlama</option>
                </select>

                {{-- Clear Filters --}}
                <button wire:click="clearFilters" 
                    class="px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg hover:bg-gray-300 dark:hover:bg-gray-600 transition">
                    Reset Filter
                </button>
            </div>

            {{-- Active Filters Info --}}
            @if($search || $ruanganFilter || $tagFilter)
            <div class="flex items-center gap-2 text-sm text-gray-600 dark:text-gray-400">
                <span>Filter aktif:</span>
                @if($search)
                    <span class="px-3 py-1 bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 rounded-full">
                        Pencarian: "{{ $search }}"
                    </span>
                @endif
                @if($ruanganFilter)
                    <span class="px-3 py-1 bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 rounded-full">
                        {{ $ruangans->find($ruanganFilter)->name }}
                    </span>
                @endif
                @if($tagFilter)
                    <span class="px-3 py-1 bg-indigo-100 dark:bg-indigo-900 text-indigo-800 dark:text-indigo-200 rounded-full">
                        {{ $tags->find($tagFilter)->name }}
                    </span>
                @endif
            </div>
            @endif
        </div>

        {{-- Gallery Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            @forelse($inspirations as $inspiration)
                <div class="group relative bg-white dark:bg-gray-800 rounded-lg overflow-hidden shadow-md hover:shadow-xl transition-shadow duration-300">
                    <a href="{{ route('inspiration.show', $inspiration->id) }}" wire:navigate>
                        <div class="aspect-[3/4] overflow-hidden bg-gray-200 dark:bg-gray-700">
                            @if($inspiration->image_url)
                                <img src="{{ asset('storage/' . $inspiration->image_url) }}" 
                                     alt="{{ $inspiration->title }}"
                                     class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-gray-400">
                                    <svg class="w-16 h-16" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            @endif
                        </div>
                        
                        <div class="p-4">
                            <h3 class="font-semibold text-gray-900 dark:text-white line-clamp-2 mb-2">
                                {{ $inspiration->title }}
                            </h3>
                            
                            <div class="flex items-center gap-2 text-sm text-gray-500 dark:text-gray-400 mb-3">
                                @if($inspiration->ruangan)
                                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 rounded text-xs">
                                        {{ $inspiration->ruangan->name }}
                                    </span>
                                @endif
                                @if($inspiration->tag)
                                    <span class="px-2 py-1 bg-gray-100 dark:bg-gray-700 rounded text-xs">
                                        {{ $inspiration->tag->name }}
                                    </span>
                                @endif
                            </div>

                            <div class="flex items-center justify-between text-sm text-gray-500 dark:text-gray-400">
                                <span class="flex items-center gap-1">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                    </svg>
                                    {{ $inspiration->likedBy()->count() }}
                                </span>
                                <span>{{ $inspiration->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-span-full text-center py-12">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    <h3 class="mt-2 text-sm font-medium text-gray-900 dark:text-white">Tidak ada inspirasi ditemukan</h3>
                    <p class="mt-1 text-sm text-gray-500 dark:text-gray-400">
                        @if($search || $ruanganFilter || $tagFilter)
                            Coba ubah filter atau kata kunci pencarian Anda.
                        @else
                            Belum ada inspirasi yang disetujui. Inspirasi yang baru di-upload sedang dalam proses moderasi.
                        @endif
                    </p>
                    @auth
                        <div class="mt-4">
                            <a href="{{ route('inspiration.upload') }}" class="btn btn-primary">
                                Unggah Inspirasi Pertama
                            </a>
                        </div>
                    @endauth
                </div>
            @endforelse
        </div>

        {{-- Pagination --}}
        <div class="mt-8">
            {{ $inspirations->links() }}
        </div>
    </div>
</div>