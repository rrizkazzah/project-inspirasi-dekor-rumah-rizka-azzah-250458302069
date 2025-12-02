<?php

namespace App\Livewire;

use App\Models\Inspiration;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class MyLikes extends Component
{
    use WithPagination;

    public $search = '';
    public $sortBy = 'latest'; // latest, oldest

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatingSortBy()
    {
        $this->resetPage();
    }

    public function unlikeInspiration($inspirationId)
    {
        $user = auth()->user();
        $user->likes()->detach($inspirationId);

        session()->flash('success', 'Inspirasi berhasil dihapus dari daftar yang disukai!');
    }

    public function render()
    {
        $user = auth()->user();

        $query = $user->likes()
            ->with(['user', 'ruangan', 'tag'])
            ->approved();

        // Search
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%')
                  ->orWhere('design_by', 'like', '%' . $this->search . '%');
            });
        }

        // Sort
        if ($this->sortBy === 'oldest') {
            $query->orderBy('likes.created_at', 'asc');
        } else {
            $query->orderBy('likes.created_at', 'desc');
        }

        $inspirations = $query->paginate(12);

        $totalLikes = $user->likes()->approved()->count();

        return view('livewire.my-likes', [
            'inspirations' => $inspirations,
            'totalLikes' => $totalLikes,
        ]);
    }
}
