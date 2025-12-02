<?php

namespace App\Livewire\Admin;

use App\Models\Comment;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class CommentModeration extends Component
{
    use WithPagination;

    public function deleteComment($id)
    {
        Comment::findOrFail($id)->delete();
        session()->flash('message', 'Komentar berhasil dihapus!');
    }

    public function render()
    {
        $comments = Comment::with(['user', 'inspiration'])
            ->latest()
            ->paginate(15);

        $stats = [
            'total' => Comment::count(),
        ];

        return view('livewire.admin.comment-moderation', [
            'comments' => $comments,
            'stats' => $stats,
        ]);
    }
}
