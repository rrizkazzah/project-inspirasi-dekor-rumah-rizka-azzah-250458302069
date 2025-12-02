<div class="py-12">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Back Button -->
        <div class="mb-6">
            <a href="{{ route('articles.index') }}" wire:navigate
               class="inline-flex items-center text-indigo-600 dark:text-indigo-400 hover:text-indigo-700 dark:hover:text-indigo-300">
                <svg class="w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Kembali ke Artikel
            </a>
        </div>

        <article class="bg-white dark:bg-gray-800 rounded-lg shadow-md overflow-hidden">
            <!-- Header -->
            <div class="p-8">
                <!-- Date -->
                <div class="flex items-center text-sm text-gray-500 dark:text-gray-400 mb-4">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                    </svg>
                    {{ $article->published_at->format('d F Y') }}
                </div>

                <!-- Title -->
                <h1 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">
                    {{ $article->title }}
                </h1>

                <!-- Featured Image -->
                @if($article->thumbnail_image_url)
                    <img src="{{ asset('storage/' . $article->thumbnail_image_url) }}"
                         alt="{{ $article->title }}"
                         class="w-full h-96 object-cover rounded-lg mb-8">
                @else
                    <div class="h-96 bg-gradient-to-br from-indigo-400 to-purple-500 rounded-lg mb-8 flex items-center justify-center">
                        <svg class="w-24 h-24 text-white opacity-50" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                @endif

                <!-- Content -->
                <div class="prose dark:prose-invert max-w-none">
                    {!! nl2br(e($article->content)) !!}
                </div>
            </div>
        </article>
    </div>
</div>
