<?php

use App\Livewire\Faq;
use App\Livewire\MyLikes;
use App\Livewire\MyUploads;
use App\Livewire\ArticleList;
use App\Livewire\MyFavorites;
use App\Livewire\ArticleDetail;
use App\Livewire\TestimonialList;
use App\Livewire\InspirationDetail;
use App\Livewire\InspirationUpload;
use App\Livewire\TestimonialInsert;
use App\Livewire\InspirationGallery;
use Illuminate\Support\Facades\Route;
use App\Livewire\Admin\TestimonialForm;
use App\Livewire\Admin\ModerationDashboard;
use App\Http\Controllers\Admin\AdminAuthController;

Route::view('/', 'welcome')->name('home');

Route::view('/gallery', 'gallery')->name('gallery');
Route::get('/inspiration/{id}', InspirationDetail::class)->name('inspiration.show');
Route::get('/faq', Faq::class)->name('faq');
Route::get('/testimonials', TestimonialList::class)->name('testimonials');
Route::get('/testimonials-Insert', TestimonialInsert::class)->name('testimonials.insert');
Route::get('/articles', ArticleList::class)->name('articles.index');
Route::get('/articles/{slug}', ArticleDetail::class)->name('articles.show');

Route::middleware(['auth'])->group(function () {
    Route::get('/upload', InspirationUpload::class)->name('inspiration.upload');
    Route::get('/my-uploads', MyUploads::class)->name('my.uploads');
    Route::get('/my-likes', MyLikes::class)->name('my.likes');
    Route::get('/my-favorites', MyFavorites::class)->name('my.favorites');
    Route::view('profile', 'profile')->name('profile');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Admin Authentication Routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [AdminAuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AdminAuthController::class, 'login'])->name('login.post');
    Route::post('/logout', [AdminAuthController::class, 'logout'])->name('logout');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', ModerationDashboard::class)->name('dashboard');
    Route::get('/inspirations', \App\Livewire\Admin\InspirationModeration::class)->name('inspirations');
    Route::get('/comments', \App\Livewire\Admin\CommentModeration::class)->name('comments');
    Route::get('/reports', \App\Livewire\Admin\ReportModeration::class)->name('reports');
    Route::get('/testimonials', \App\Livewire\Admin\TestimonialManagement::class)->name('testimonials');
    Route::get('/testimonials/create', TestimonialForm::class)->name('testimonials.create');
    Route::get('/testimonials/{id}/edit', TestimonialForm::class)->name('testimonials.edit');
    Route::get('/articles', \App\Livewire\Admin\ArticleManagement::class)->name('articles');
    Route::get('/articles/create', \App\Livewire\Admin\ArticleForm::class)->name('articles.create');
    Route::get('/articles/{id}/edit', \App\Livewire\Admin\ArticleForm::class)->name('articles.edit');
});

require __DIR__.'/auth.php';

