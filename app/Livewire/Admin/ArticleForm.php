<?php

namespace App\Livewire\Admin;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.admin')]
class ArticleForm extends Component
{
    use WithFileUploads;

    public $articleId;
    public $title = '';
    public $slug = '';
    public $content = '';
    public $thumbnail;
    public $existing_thumbnail;
    public $is_published = false;

    public function mount($id = null)
    {
        if ($id) {
            $article = Article::findOrFail($id);
            $this->articleId = $article->id;
            $this->title = $article->title;
            $this->slug = $article->slug;
            $this->content = $article->content;
            $this->existing_thumbnail = $article->thumbnail_image_url;
            $this->is_published = $article->published_at !== null;
        }
    }

    public function updatedTitle()
    {
        if (!$this->articleId) {
            $this->slug = Str::slug($this->title);
        }
    }

    public function removeThumbnail()
    {
        $this->thumbnail = null;
        
        if ($this->articleId && $this->existing_thumbnail) {
            $article = Article::findOrFail($this->articleId);
            if ($article->thumbnail_image_url && Storage::disk('public')->exists($article->thumbnail_image_url)) {
                Storage::disk('public')->delete($article->thumbnail_image_url);
            }
            $article->update(['thumbnail_image_url' => null]);
            $this->existing_thumbnail = null;
            session()->flash('message', 'Thumbnail berhasil dihapus!');
        }
    }

    public function save()
    {
        $rules = [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:articles,slug,' . ($this->articleId ?? 'NULL'),
            'content' => 'required|string|min:100',
        ];

        if ($this->thumbnail) {
            $rules['thumbnail'] = 'image|max:2048'; // max 2MB
        }

        $validated = $this->validate($rules, [
            'title.required' => 'Judul artikel harus diisi.',
            'slug.required' => 'Slug artikel harus diisi.',
            'slug.unique' => 'Slug sudah digunakan, gunakan slug lain.',
            'content.required' => 'Konten artikel harus diisi.',
            'content.min' => 'Konten artikel minimal 100 karakter.',
            'thumbnail.image' => 'File harus berupa gambar.',
            'thumbnail.max' => 'Ukuran gambar maksimal 2MB.',
        ]);

        $data = [
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'content' => $validated['content'],
            'user_id' => auth()->id(),
        ];

        if ($this->is_published) {
            $data['published_at'] = now();
        } else {
            $data['published_at'] = null;
        }

        // Handle thumbnail upload
        if ($this->thumbnail) {
            // Delete old thumbnail if exists
            if ($this->articleId) {
                $article = Article::find($this->articleId);
                if ($article && $article->thumbnail_image_url && Storage::disk('public')->exists($article->thumbnail_image_url)) {
                    Storage::disk('public')->delete($article->thumbnail_image_url);
                }
            }

            // Store new thumbnail
            $thumbnailPath = $this->thumbnail->store('articles', 'public');
            $data['thumbnail_image_url'] = $thumbnailPath;
        }

        if ($this->articleId) {
            $article = Article::findOrFail($this->articleId);
            $article->update($data);
            session()->flash('message', 'Artikel berhasil diperbarui!');
        } else {
            Article::create($data);
            session()->flash('message', 'Artikel berhasil dibuat!');
        }

        return redirect()->route('admin.articles');
    }

    public function cancel()
    {
        return redirect()->route('admin.articles');
    }

    public function render()
    {
        return view('livewire.admin.article-form');
    }
}
