<?php

namespace App\Livewire\Admin;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class ArticleManagement extends Component
{
    use WithPagination;

    public $search = '';
    public $filterStatus = 'all';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function setFilter($status)
    {
        $this->filterStatus = $status;
        $this->resetPage();
    }

    public function togglePublish($id)
    {
        $article = Article::findOrFail($id);
        
        if ($article->published_at) {
            $article->update(['published_at' => null]);
            session()->flash('message', 'Artikel berhasil di-unpublish.');
        } else {
            $article->update(['published_at' => now()]);
            session()->flash('message', 'Artikel berhasil dipublikasikan!');
        }
    }

    public function deleteArticle($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        session()->flash('message', 'Artikel berhasil dihapus!');
    }

    public function render()
    {
        $query = Article::with('user');

        if ($this->search) {
            $query->where(function($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('content', 'like', '%' . $this->search . '%');
            });
        }

        if ($this->filterStatus === 'published') {
            $query->published();
        } elseif ($this->filterStatus === 'draft') {
            $query->whereNull('published_at');
        }

        $articles = $query->latest('created_at')->paginate(10);

        $stats = [
            'all' => Article::count(),
            'published' => Article::published()->count(),
            'draft' => Article::whereNull('published_at')->count(),
        ];

        return view('livewire.admin.article-management', [
            'articles' => $articles,
            'stats' => $stats,
        ]);
    }
}
