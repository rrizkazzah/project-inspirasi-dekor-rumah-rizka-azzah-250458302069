<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ArticleDetail extends Component
{
    public $article;

    public function mount($slug)
    {
        $this->article = Article::where('slug', $slug)->published()->firstOrFail();
    }

    public function render()
    {
        return view('livewire.article-detail');
    }
}
