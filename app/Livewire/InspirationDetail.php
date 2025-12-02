<?php

namespace App\Livewire;

use App\Models\Inspiration;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class InspirationDetail extends Component
{
    public Inspiration $inspiration;

    public function mount($id)
    {
        $this->inspiration = Inspiration::with(['user', 'ruangan', 'tag', 'comments.user'])
            ->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.inspiration-detail');
    }
}

