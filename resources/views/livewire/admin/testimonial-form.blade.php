<div>
    <div class="page-heading mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h3><i class="bi bi-star-fill me-2"></i>{{ $testimonialId ? 'Edit Testimoni' : 'Tambah Testimoni' }}</h3>
                <p class="text-subtitle">Kelola testimoni pengguna Homespire</p>
            </div>
            <a href="{{ route('admin.testimonials') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-2"></i>Kembali
            </a>
        </div>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form wire:submit.prevent="save">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" wire:model="name" placeholder="Masukkan nama">
                                @error('name') 
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="content" class="form-label">Testimoni <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('content') is-invalid @enderror" 
                                          id="content" wire:model="content" rows="4" 
                                          placeholder="Masukkan testimoni"></textarea>
                                @error('content') 
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="rating" class="form-label">Rating <span class="text-danger">*</span></label>
                                <select class="form-select @error('rating') is-invalid @enderror" 
                                        id="rating" wire:model="rating">
                                    <option value="1">⭐ 1 - Kurang Baik</option>
                                    <option value="2">⭐⭐ 2 - Cukup</option>
                                    <option value="3">⭐⭐⭐ 3 - Baik</option>
                                    <option value="4">⭐⭐⭐⭐ 4 - Sangat Baik</option>
                                    <option value="5">⭐⭐⭐⭐⭐ 5 - Luar Biasa</option>
                                </select>
                                @error('rating') 
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Status</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" 
                                           id="is_published" wire:model="is_published">
                                    <label class="form-check-label" for="is_published">
                                        Publish Testimoni
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <div>
                            <button type="submit" class="btn btn-primary me-2">
                                <i class="bi bi-save me-2"></i>{{ $testimonialId ? 'Update' : 'Simpan' }}
                            </button>
                            <button type="button" wire:click="cancel" class="btn btn-secondary">
                                <i class="bi bi-x-circle me-2"></i>Batal
                            </button>
                        </div>
                        
                        @if($testimonialId)
                            <button type="button" wire:click="delete" 
                                    wire:confirm="Yakin ingin menghapus testimoni ini?"
                                    class="btn btn-danger">
                                <i class="bi bi-trash me-2"></i>Hapus
                            </button>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>
