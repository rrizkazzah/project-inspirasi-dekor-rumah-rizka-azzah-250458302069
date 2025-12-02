<?php

namespace App\Livewire\Admin;

use App\Models\Inspiration;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

#[Layout('layouts.admin')]
class InspirationModeration extends Component
{
    use WithPagination;

    public $filterStatus = 'all';

    public function setFilter($status)
    {
        $this->filterStatus = $status;
        $this->resetPage();
    }

    public function approveInspiration($id)
    {
        $inspiration = Inspiration::findOrFail($id);
        $inspiration->update(['status' => 'approved']);
        session()->flash('message', 'Inspirasi berhasil disetujui!');
    }

    public function rejectInspiration($id)
    {
        $inspiration = Inspiration::findOrFail($id);
        $inspiration->update(['status' => 'rejected']);
        session()->flash('message', 'Inspirasi ditolak.');
    }

    public function deleteInspiration($id)
    {
        $inspiration = Inspiration::findOrFail($id);
        if ($inspiration->image_url && Storage::disk('public')->exists($inspiration->image_url)) {
            Storage::disk('public')->delete($inspiration->image_url);
        }
        $inspiration->delete();
        session()->flash('message', 'Inspirasi berhasil dihapus!');
    }

    public function render()
    {
        $query = Inspiration::with(['user', 'ruangan', 'tag']);

        if ($this->filterStatus !== 'all') {
            $query->where('status', $this->filterStatus);
        }

        $inspirations = $query->latest()->paginate(12);

        $stats = [
            'all' => Inspiration::count(),
            'pending' => Inspiration::where('status', 'pending')->count(),
            'approved' => Inspiration::where('status', 'approved')->count(),
            'rejected' => Inspiration::where('status', 'rejected')->count(),
        ];

        return view('livewire.admin.inspiration-moderation', [
            'inspirations' => $inspirations,
            'stats' => $stats,
        ]);
    }
}
