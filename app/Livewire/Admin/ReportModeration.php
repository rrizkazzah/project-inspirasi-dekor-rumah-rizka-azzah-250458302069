<?php

namespace App\Livewire\Admin;

use App\Models\Report;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class ReportModeration extends Component
{
    use WithPagination;

    public function reviewReport($id, $action)
    {
        $report = Report::findOrFail($id);
        
        if ($action === 'remove_content') {
            $inspiration = $report->inspiration;
            if ($inspiration) {
                $inspiration->update(['status' => 'rejected']);
            }
            $report->update(['status' => 'resolved']);
            session()->flash('message', 'Konten berhasil dihapus!');
        } elseif ($action === 'reject') {
            $report->update(['status' => 'rejected']);
            session()->flash('message', 'Laporan ditolak.');
        }
    }

    public function render()
    {
        $reports = Report::with(['user', 'inspiration'])
            ->latest()
            ->paginate(15);

        $stats = [
            'total' => Report::count(),
            'pending' => Report::where('status', 'pending')->count(),
            'resolved' => Report::where('status', 'resolved')->count(),
            'rejected' => Report::where('status', 'rejected')->count(),
        ];

        return view('livewire.admin.report-moderation', [
            'reports' => $reports,
            'stats' => $stats,
        ]);
    }
}
