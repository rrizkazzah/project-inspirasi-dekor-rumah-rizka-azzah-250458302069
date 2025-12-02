<?php

namespace App\Livewire;

use App\Models\Inspiration;
use App\Models\Ruangan;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;

class InspirationGallery extends Component
{
    use WithPagination;

    public $search = '';
    public $ruanganFilter = '';
    public $tagFilter = '';
    public $sortBy = 'latest'; // latest, oldest

    protected $queryString = [
        'search' => ['except' => ''],
        'ruanganFilter' => ['except' => ''],
        'tagFilter' => ['except' => ''],
        'earortBy' => ['except' => 'latest'],
    ];

    public function updatingarcharch()
    {
        $this->resetPage();
    }

    public function updatingRuanganFilter()
    {
        $this->resetPage();
    }

    public function updatingTagFilter()
    {
        $this->resetPage();
    }

    public function updatingSortBy()
    {
        $this->resetPage();
    }

    public function clearFilters()
    {
        $this->reset(['search', 'ruanganFilter', 'tagFilter', 'sortBy']);
        $this->resetPage();
    }

    public function render()
    {
        $query = Inspiration::with(['user', 'ruangan', 'tag'])
            ->approved();

        // Search
        if ($this->search) {
            $query->where(function ($q) {
                $q->where('title', 'like', '%' . $this->search . '%')
                  ->orWhere('description', 'like', '%' . $this->search . '%')
                  ->orWhere('design_by', 'like', '%' . $this->search . '%');
            });
        }

        // Filter by Ruangan
        if ($this->ruanganFilter) {
            $query->where('ruangan_id', $this->ruanganFilter);
        }

        // Filter by Tag
        if ($this->tagFilter) {
            $query->where('tags_id', $this->tagFilter);
        }

        // Sort
        if ($this->sortBy === 'oldest') {
            $query->oldest();
        } else {
            $query->latest();
        }

        $inspirations = $query->paginate(12);

        $ruangans = Ruangan::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        return view('livewire.inspiration-gallery', [
            'inspirations' => $inspirations,
            'ruangans' => $ruangans,
            'tags' => $tags,
        ]);
    }
}

