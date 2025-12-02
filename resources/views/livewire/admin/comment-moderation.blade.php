<div>
    <div class="page-heading mb-4">
        <div>
            <h3><i class="bi bi-chat-dots-fill me-2"></i>Moderasi Komentar</h3>
            <p class="text-subtitle">Kelola komentar dari pengguna</p>
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
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Total Komentar</h6>
                            <h3 class="mb-0">{{ $stats['total'] }}</h3>
                        </div>
                        <div class="stats-icon purple">
                            <i class="bi bi-chat-dots"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Comments List -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Pengguna</th>
                            <th>Komentar</th>
                            <th>Inspirasi</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($comments as $comment)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person-circle fs-4 text-primary me-2"></i>
                                        <div>
                                            <div class="fw-bold">{{ $comment->user->name }}</div>
                                            <small class="text-muted">{{ $comment->user->email }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td style="max-width: 300px;">
                                    <p class="mb-0">{{ Str::limit($comment->content, 100) }}</p>
                                </td>
                                <td>
                                    <a href="{{ route('inspiration.show', $comment->inspiration_id) }}"
                                       target="_blank"
                                       class="text-decoration-none">
                                        {{ Str::limit($comment->inspiration->title ?? 'N/A', 30) }}
                                        <i class="bi bi-box-arrow-up-right small"></i>
                                    </a>
                                </td>
                                <td>
                                    <small>{{ $comment->created_at->format('d M Y') }}<br>{{ $comment->created_at->format('H:i') }}</small>
                                </td>
                                <td>
                                    <div class="d-flex gap-2">
                                        @if($comment->status === 'pending')
                                            <button wire:click="approveComment({{ $comment->id }})"
                                                    class="btn btn-sm btn-success"
                                                    wire:confirm="Setujui komentar ini?">
                                                <i class="bi bi-check-lg"></i>
                                            </button>
                                        @endif
                                        <button wire:click="deleteComment({{ $comment->id }})"
                                                class="btn btn-sm btn-danger"
                                                wire:confirm="Hapus komentar ini?">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="bi bi-inbox display-4 text-muted d-block mb-3"></i>
                                    <p class="text-muted">Tidak ada komentar yang ditemukan.</p>
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
        {{ $comments->links() }}
    </div>
</div>
