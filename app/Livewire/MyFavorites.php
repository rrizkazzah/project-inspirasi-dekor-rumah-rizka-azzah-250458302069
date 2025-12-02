<?php

namespace App\Livewire;

use App\Models\Inspiration;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class MyFavorites extends Component
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

    public function removeFavorite($inspirationId)
    {
        $user = auth()->user();
        $user->favorites()->detach($inspirationId);

        session()->flash('success', 'Inspirasi berhasil dihapus dari favorit!');
    }

    public function render()
    {
        $user = auth()->user();

        $query = $user->favorites()
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
            $query->orderBy('user_favorites.created_at', 'asc');
        } else {
            $query->orderBy('user_favorites.created_at', 'desc');
        }

        $inspirations = $query->paginate(12);

        $totalFavorites = $user->favorites()->approved()->count();

        return view('livewire.my-favorites', [
            'inspirations' => $inspirations,
            'totalFavorites' => $totalFavorites,
        ]);
    }
}
