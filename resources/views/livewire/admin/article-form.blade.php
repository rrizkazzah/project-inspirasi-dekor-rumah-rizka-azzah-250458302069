<div>
    <div class="page-heading mb-4">
        <h3>
            <i class="bi bi-newspaper me-2"></i>
            {{ $articleId ? 'Edit Artikel' : 'Tambah Artikel Baru' }}
        </h3>
        <p class="text-subtitle">{{ $articleId ? 'Perbarui informasi artikel' : 'Buat artikel baru untuk blog' }}</p>
    </div>

    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="save">
                <!-- Thumbnail Image -->
                <div class="mb-3">
                    <label for="thumbnail" class="form-label">Gambar Thumbnail</label>

                    @if($existing_thumbnail)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $existing_thumbnail) }}"
                                 alt="Current thumbnail"
                                 class="img-thumbnail"
                                 style="max-width: 300px; max-height: 200px; object-fit: cover;">
                            <button type="button"
                                    wire:click="removeThumbnail"
                                    wire:confirm="Hapus thumbnail ini?"
                                    class="btn btn-sm btn-danger mt-2">
                                <i class="bi bi-trash"></i> Hapus Thumbnail
                            </button>
                        </div>
                    @endif

                    @if($thumbnail)
                        <div class="mb-2">
                            <img src="{{ $thumbnail->temporaryUrl() }}"
                                 alt="Preview thumbnail"
                                 class="img-thumbnail"
                                 style="max-width: 300px; max-height: 200px; object-fit: cover;">
                        </div>
                    @endif

                    <input type="file"
                           class="form-control @error('thumbnail') is-invalid @enderror"
                           id="thumbnail"
                           wire:model="thumbnail"
                           accept="image/*">
                    <small class="text-muted">Format: JPG, PNG, GIF. Maksimal 2MB.</small>
                    @error('thumbnail')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    <div wire:loading wire:target="thumbnail" class="text-primary mt-1">
                        <i class="bi bi-hourglass-split"></i> Mengupload gambar...
                    </div>
                </div>

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Artikel <span class="text-danger">*</span></label>
                    <input type="text"
                           class="form-control @error('title') is-invalid @enderror"
                           id="title"
                           wire:model.live="title"
                           placeholder="Masukkan judul artikel">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Slug -->
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                    <input type="text"
                           class="form-control @error('slug') is-invalid @enderror"
                           id="slug"
                           wire:model="slug"
                           placeholder="url-artikel-anda">
                    <small class="text-muted">URL-friendly version dari judul. Otomatis dibuat dari judul.</small>
                    @error('slug')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Content -->
                <div class="mb-3">
                    <label for="content" class="form-label">Konten Artikel <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('content') is-invalid @enderror"
                              id="content"
                              wire:model="content"
                              rows="15"
                              placeholder="Tulis konten artikel Anda di sini..."></textarea>
                    <small class="text-muted">Minimal 100 karakter.</small>
                    @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Published Status -->
                <div class="mb-4">
                    <div class="form-check form-switch">
                        <input class="form-check-input"
                               type="checkbox"
                               id="is_published"
                               wire:model="is_published">
                        <label class="form-check-label" for="is_published">
                            <strong>Publikasikan artikel</strong>
                            <br>
                            <small class="text-muted">
                                {{ $is_published ? 'Artikel akan langsung dipublikasikan dan dapat dilihat oleh pengunjung.' : 'Artikel akan disimpan sebagai draft.' }}
                            </small>
                        </label>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>
                        {{ $articleId ? 'Perbarui Artikel' : 'Simpan Artikel' }}
                    </button>
                    <button type="button" wire:click="cancel" class="btn btn-secondary">
                        <i class="bi bi-x-circle me-1"></i> Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
