<?php

namespace App\Livewire;

use App\Models\Inspiration;
use Livewire\Component;

class ToggleFavorite extends Component
{
    public Inspiration $inspiration;
    public $isFavorited = false;

    public function mount()
    {
        $this->updateFavoriteStatus();
    }

    public function toggleFavorite()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        if ($this->isFavorited) {
            $user->favorites()->detach($this->inspiration->id);
        } else {
            $user->favorites()->attach($this->inspiration->id);
        }

        $this->updateFavoriteStatus();
    }

    public function updateFavoriteStatus()
    {
        $this->isFavorited = auth()->check() && $this->inspiration->isFavoritedBy(auth()->user());
    }

    public function render()
    {
        return view('livewire.toggle-favorite');
    }
}

