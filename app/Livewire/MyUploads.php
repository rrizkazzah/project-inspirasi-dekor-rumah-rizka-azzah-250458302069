<?php

namespace App\Livewire;

use App\Models\Inspiration;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithPagination;

#[Layout('layouts.app')]
class MyUploads extends Component
{
    use WithPagination;

    public $statusFilter = 'all'; // all, pending, approved, rejected

    public function setStatusFilter($status)
    {
        $this->statusFilter = $status;
        $this->resetPage();
    }

    public function deleteInspiration($id)
    {
        $inspiration = Inspiration::where('id', $id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        // Delete image file if exists
        if ($inspiration->image_url && \Storage::disk('public')->exists($inspiration->image_url)) {
            \Storage::disk('public')->delete($inspiration->image_url);
        }

        $inspiration->delete();

        session()->flash('success', 'Inspirasi berhasil dihapus!');
    }

    public function render()
    {
        $query = Inspiration::where('user_id', auth()->id())
            ->with(['ruangan', 'tag'])
            ->latest();

        // Filter by status
        if ($this->statusFilter !== 'all') {
            $query->where('status', $this->statusFilter);
        }

        $inspirations = $query->paginate(12);

        // Count by status
        $stats = [
            'all' => Inspiration::where('user_id', auth()->id())->count(),
            'pending' => Inspiration::where('user_id', auth()->id())->where('status', 'pending')->count(),
            'approved' => Inspiration::where('user_id', auth()->id())->where('status', 'approved')->count(),
            'rejected' => Inspiration::where('user_id', auth()->id())->where('status', 'rejected')->count(),
        ];

        return view('livewire.my-uploads', [
            'inspirations' => $inspirations,
            'stats' => $stats,
        ]);
    }
}
