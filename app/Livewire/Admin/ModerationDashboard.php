<?php

namespace App\Livewire\Admin;

use App\Models\Inspiration;
use App\Models\Comment;
use App\Models\Report;
use App\Models\Testimonial;
use App\Models\Article;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\DB;

#[Layout('layouts.admin')]
class ModerationDashboard extends Component
{
    public function render()
    {
        $stats = [
            'pending_inspirations' => Inspiration::where('status', 'pending')->count(),
            'pending_comments' => Comment::where('status', 'pending')->count(),
            'pending_reports' => Report::where('status', 'pending')->count(),
            'testimonials_count' => Testimonial::count(),
        ];

        // Prepare 6 bulan terakhir (including current month)
        $months = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $months[] = [
                'key' => $date->format('Y-m'),
                'label' => $date->locale('id')->isoFormat('MMM YYYY')
            ];
        }

        // Data untuk chart - Inspirasi per bulan
        $inspirationsData = Inspiration::select(
            DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'),
            DB::raw('count(*) as total')
        )
        ->where('created_at', '>=', now()->subMonths(6))
        ->groupBy('month')
        ->orderBy('month')
        ->pluck('total', 'month')
        ->toArray();

        $inspirationsPerMonth = collect($months)->map(function($month) use ($inspirationsData) {
            return [
                'month' => $month['label'],
                'total' => $inspirationsData[$month['key']] ?? 0
            ];
        });

        // Data untuk chart - Status Inspirasi
        $inspirationsByStatus = Inspiration::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->get();

        return view('livewire.admin.moderation-dashboard', compact(
            'stats',
            'inspirationsPerMonth',
            'inspirationsByStatus'
        ));
    }
}
