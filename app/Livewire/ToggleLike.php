<?php

namespace App\Livewire;

use App\Models\Inspiration;
use Livewire\Component;

class ToggleLike extends Component
{
    public Inspiration $inspiration;
    public $isLiked = false;
    public $likesCount = 0;

    public function mount()
    {
        $this->updateLikeStatus();
    }

    public function toggleLike()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $user = auth()->user();
        
        if ($this->isLiked) {
            $user->likes()->detach($this->inspiration->id);
        } else {
            $user->likes()->attach($this->inspiration->id);
        }

        $this->updateLikeStatus();
    }

    public function updateLikeStatus()
    {
        $this->isLiked = auth()->check() && $this->inspiration->isLikedBy(auth()->user());
        $this->likesCount = $this->inspiration->likedBy()->count();
    }

    public function render()
    {
        return view('livewire.toggle-like');
    }
}

