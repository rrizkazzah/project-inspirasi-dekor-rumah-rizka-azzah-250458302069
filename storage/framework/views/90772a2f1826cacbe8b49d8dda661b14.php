<div>
    <div class="page-heading mb-4">
        <h3>
            <i class="bi bi-newspaper me-2"></i>
            <?php echo e($articleId ? 'Edit Artikel' : 'Tambah Artikel Baru'); ?>

        </h3>
        <p class="text-subtitle"><?php echo e($articleId ? 'Perbarui informasi artikel' : 'Buat artikel baru untuk blog'); ?></p>
    </div>

    <div class="card">
        <div class="card-body">
            <form wire:submit.prevent="save">
                <!-- Thumbnail Image -->
                <div class="mb-3">
                    <label for="thumbnail" class="form-label">Gambar Thumbnail</label>

                    <!--[if BLOCK]><![endif]--><?php if($existing_thumbnail): ?>
                        <div class="mb-2">
                            <img src="<?php echo e(asset('storage/' . $existing_thumbnail)); ?>"
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
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <!--[if BLOCK]><![endif]--><?php if($thumbnail): ?>
                        <div class="mb-2">
                            <img src="<?php echo e($thumbnail->temporaryUrl()); ?>"
                                 alt="Preview thumbnail"
                                 class="img-thumbnail"
                                 style="max-width: 300px; max-height: 200px; object-fit: cover;">
                        </div>
                    <?php endif; ?><!--[if ENDBLOCK]><![endif]-->

                    <input type="file"
                           class="form-control <?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           id="thumbnail"
                           wire:model="thumbnail"
                           accept="image/*">
                    <small class="text-muted">Format: JPG, PNG, GIF. Maksimal 2MB.</small>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['thumbnail'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->

                    <div wire:loading wire:target="thumbnail" class="text-primary mt-1">
                        <i class="bi bi-hourglass-split"></i> Mengupload gambar...
                    </div>
                </div>

                <!-- Title -->
                <div class="mb-3">
                    <label for="title" class="form-label">Judul Artikel <span class="text-danger">*</span></label>
                    <input type="text"
                           class="form-control <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           id="title"
                           wire:model.live="title"
                           placeholder="Masukkan judul artikel">
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                <!-- Slug -->
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug <span class="text-danger">*</span></label>
                    <input type="text"
                           class="form-control <?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                           id="slug"
                           wire:model="slug"
                           placeholder="url-artikel-anda">
                    <small class="text-muted">URL-friendly version dari judul. Otomatis dibuat dari judul.</small>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['slug'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
                </div>

                <!-- Content -->
                <div class="mb-3">
                    <label for="content" class="form-label">Konten Artikel <span class="text-danger">*</span></label>
                    <textarea class="form-control <?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                              id="content"
                              wire:model="content"
                              rows="15"
                              placeholder="Tulis konten artikel Anda di sini..."></textarea>
                    <small class="text-muted">Minimal 100 karakter.</small>
                    <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['content'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="invalid-feedback"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?><!--[if ENDBLOCK]><![endif]-->
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
                                <?php echo e($is_published ? 'Artikel akan langsung dipublikasikan dan dapat dilihat oleh pengunjung.' : 'Artikel akan disimpan sebagai draft.'); ?>

                            </small>
                        </label>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save me-1"></i>
                        <?php echo e($articleId ? 'Perbarui Artikel' : 'Simpan Artikel'); ?>

                    </button>
                    <button type="button" wire:click="cancel" class="btn btn-secondary">
                        <i class="bi bi-x-circle me-1"></i> Batal
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\user\Documents\WEB_HOMESPIRE\resources\views/livewire/admin/article-form.blade.php ENDPATH**/ ?>