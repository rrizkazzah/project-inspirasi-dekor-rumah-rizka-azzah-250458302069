<div>
    <div class="page-heading mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3><i class="bi bi-newspaper me-2"></i>Manajemen Artikel</h3>
                <p class="text-subtitle">Kelola artikel dan konten blog</p>
            </div>
            <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">
                <i class="bi bi-plus-circle me-1"></i> Tambah Artikel
            </a>
        </div>
    </div>

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle me-2"></i>{{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Total Artikel</h6>
                            <h3 class="mb-0">{{ $stats['all'] }}</h3>
                        </div>
                        <div class="stats-icon purple">
                            <i class="bi bi-newspaper"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Dipublikasikan</h6>
                            <h3 class="mb-0">{{ $stats['published'] }}</h3>
                        </div>
                        <div class="stats-icon green">
                            <i class="bi bi-check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Draft</h6>
                            <h3 class="mb-0">{{ $stats['draft'] }}</h3>
                        </div>
                        <div class="stats-icon blue">
                            <i class="bi bi-file-earmark-text"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Filter & Search -->
    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <ul class="nav nav-pills">
                        <li class="nav-item">
                            <a class="nav-link {{ $filterStatus === 'all' ? 'active' : '' }}" 
                               href="#" wire:click.prevent="setFilter('all')">
                                Semua ({{ $stats['all'] }})
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $filterStatus === 'published' ? 'active' : '' }}" 
                               href="#" wire:click.prevent="setFilter('published')">
                                Published ({{ $stats['published'] }})
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ $filterStatus === 'draft' ? 'active' : '' }}" 
                               href="#" wire:click.prevent="setFilter('draft')">
                                Draft ({{ $stats['draft'] }})
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-search"></i></span>
                        <input type="text" 
                               class="form-control" 
                               placeholder="Cari artikel..." 
                               wire:model.live.debounce.300ms="search">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Articles Table -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th width="80">Thumbnail</th>
                            <th>Judul</th>
                            <th>Penulis</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th width="200">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($articles as $article)
                            <tr>
                                <td>
                                    @if($article->thumbnail_image_url)
                                        <img src="{{ asset('storage/' . $article->thumbnail_image_url) }}" 
                                             alt="Thumbnail"
                                             class="img-thumbnail"
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-secondary d-flex align-items-center justify-content-center" 
                                             style="width: 60px; height: 60px;">
                                            <i class="bi bi-image text-white"></i>
                                        </div>
                                    @endif
                                </td>
                                <td>
                                    <div class="fw-bold">{{ Str::limit($article->title, 50) }}</div>
                                    <small class="text-muted">{{ $article->slug }}</small>
                                </td>
                                <td>{{ $article->user ? $article->user->name : 'N/A' }}</td>
                                <td>
                                    @if($article->published_at)
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle"></i> Published
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            <i class="bi bi-file-earmark"></i> Draft
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <small>
                                        {{ $article->published_at ? $article->published_at->format('d M Y') : $article->created_at->format('d M Y') }}
                                    </small>
                                </td>
                                <td>
                                    <div class="btn-group btn-group-sm" role="group">
                                        <a href="{{ route('articles.show', $article->slug) }}" 
                                           target="_blank"
                                           class="btn btn-info" 
                                           title="Lihat">
                                            <i class="bi bi-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.articles.edit', $article->id) }}" 
                                           class="btn btn-warning" 
                                           title="Edit">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <button wire:click="togglePublish({{ $article->id }})" 
                                                class="btn {{ $article->published_at ? 'btn-secondary' : 'btn-success' }}"
                                                title="{{ $article->published_at ? 'Unpublish' : 'Publish' }}">
                                            <i class="bi bi-{{ $article->published_at ? 'x-circle' : 'check-circle' }}"></i>
                                        </button>
                                        <button wire:click="deleteArticle({{ $article->id }})" 
                                                wire:confirm="Hapus artikel ini secara permanen?"
                                                class="btn btn-danger" 
                                                title="Hapus">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4">
                                    <i class="bi bi-inbox display-4 text-muted d-block mb-2"></i>
                                    <p class="text-muted">Tidak ada artikel ditemukan.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination -->
    <div class="mt-4">
        {{ $articles->links() }}
    </div>
</div>
