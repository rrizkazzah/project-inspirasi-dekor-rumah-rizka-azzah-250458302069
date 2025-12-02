<div>
    <div class="page-heading mb-4">
        <div>
            <h3><i class="bi bi-flag-fill me-2"></i>Moderasi Laporan</h3>
            <p class="text-subtitle">Tinjau dan kelola laporan konten dari pengguna</p>
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
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Total Laporan</h6>
                            <h3 class="mb-0">{{ $stats['total'] }}</h3>
                        </div>
                        <div class="stats-icon purple">
                            <i class="bi bi-flag"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Menunggu</h6>
                            <h3 class="mb-0">{{ $stats['pending'] }}</h3>
                        </div>
                        <div class="stats-icon blue">
                            <i class="bi bi-clock-history"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Diselesaikan</h6>
                            <h3 class="mb-0">{{ $stats['resolved'] }}</h3>
                        </div>
                        <div class="stats-icon green">
                            <i class="bi bi-check-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <h6 class="text-muted mb-1">Ditolak</h6>
                            <h3 class="mb-0">{{ $stats['rejected'] }}</h3>
                        </div>
                        <div class="stats-icon red">
                            <i class="bi bi-x-circle"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reports List -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Pelapor</th>
                            <th>Alasan</th>
                            <th>Konten Dilaporkan</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($reports as $report)
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <i class="bi bi-person-circle fs-4 text-primary me-2"></i>
                                        <div>
                                            <div class="fw-bold">{{ $report->user->name }}</div>
                                            <small class="text-muted">{{ $report->user->email }}</small>
                                        </div>
                                    </div>
                                </td>
                                <td style="max-width: 250px;">
                                    <strong>{{ $report->reason }}</strong>
                                    @if($report->description)
                                        <p class="mb-0 text-muted small">{{ Str::limit($report->description, 80) }}</p>
                                    @endif
                                </td>
                                <td>
                                    @if($report->inspiration)
                                        <a href="{{ route('inspiration.show', $report->inspiration_id) }}" 
                                           target="_blank" 
                                           class="text-decoration-none">
                                            <img src="{{ asset('storage/' . $report->inspiration->image_url) }}" 
                                                 style="width: 60px; height: 60px; object-fit: cover; border-radius: 8px;"
                                                 alt="Thumbnail">
                                            <div class="small mt-1">{{ Str::limit($report->inspiration->title, 25) }}</div>
                                        </a>
                                    @else
                                        <span class="text-muted">Konten telah dihapus</span>
                                    @endif
                                </td>
                                <td>
                                    @if($report->status === 'pending')
                                        <span class="badge bg-warning text-dark">
                                            <i class="bi bi-clock"></i> Pending
                                        </span>
                                    @elseif($report->status === 'resolved')
                                        <span class="badge bg-success">
                                            <i class="bi bi-check-circle"></i> Resolved
                                        </span>
                                    @else
                                        <span class="badge bg-secondary">
                                            <i class="bi bi-x-circle"></i> Rejected
                                        </span>
                                    @endif
                                </td>
                                <td>
                                    <small>{{ $report->created_at->format('d M Y') }}<br>{{ $report->created_at->format('H:i') }}</small>
                                </td>
                                <td>
                                    @if($report->status === 'pending' && $report->inspiration)
                                        <div class="d-flex gap-2">
                                            <button wire:click="reviewReport({{ $report->id }}, 'remove_content')" 
                                                    class="btn btn-sm btn-danger"
                                                    wire:confirm="Hapus konten yang dilaporkan?">
                                                <i class="bi bi-trash"></i> Hapus
                                            </button>
                                            <button wire:click="reviewReport({{ $report->id }}, 'reject')" 
                                                    class="btn btn-sm btn-secondary"
                                                    wire:confirm="Tolak laporan ini?">
                                                <i class="bi bi-x-lg"></i> Tolak
                                            </button>
                                        </div>
                                    @else
                                        <span class="text-muted small">Selesai</span>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5">
                                    <i class="bi bi-inbox display-4 text-muted d-block mb-3"></i>
                                    <p class="text-muted">Tidak ada laporan yang ditemukan.</p>
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
        {{ $reports->links() }}
    </div>
</div>
