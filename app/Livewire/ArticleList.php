<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class ArticleList extends Component
{
    use WithPagination;

    public function render()
    {
        $articles = Article::published()->latest('published_at')->paginate(9);

        return view('livewire.article-list', ['articles' => $articles]);
    }
}
