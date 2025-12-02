<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Inspiration;
use Livewire\Component;

class CommentSection extends Component
{
    public Inspiration $inspiration;
    public $newComment = '';
    public $comments;

    public function mount()
    {
        $this->loadComments();
    }

    public function loadComments()
    {
        $this->comments = $this->inspiration->comments()
            ->with('user')
            ->approved()
            ->latest()
            ->get();
    }

    public function addComment()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $this->validate([
            'newComment' => 'required|min:3|max:1000',
        ]);

        Comment::create([
            'user_id' => auth()->id(),
            'inspiration_id' => $this->inspiration->id,
            'content' => $this->newComment,
        ]);

        $this->newComment = '';
        $this->loadComments();

        session()->flash('message', 'Komentar berhasil ditambahkan!');
    }

    public function render()
    {
        return view('livewire.comment-section');
    }
}

