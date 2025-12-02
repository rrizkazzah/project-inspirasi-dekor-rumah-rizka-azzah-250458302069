<?php

namespace App\Livewire;

use App\Models\Inspiration;
use App\Models\Report;
use Livewire\Component;

class ReportForm extends Component
{
    public Inspiration $inspiration;
    public $showModal = false;
    public $reason = '';
    public $description = '';

    public function openModal()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }
        
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['reason', 'description']);
    }

    public function submitReport()
    {
        $this->validate([
            'reason' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
        ]);

        Report::create([
            'user_id' => auth()->id(),
            'inspiration_id' => $this->inspiration->id,
            'reason' => $this->reason,
            'description' => $this->description,
            'status' => 'pending',
        ]);

        $this->closeModal();
        
        // Dispatch event untuk menampilkan toast notification
        $this->dispatch('notify', 
            type: 'success',
            message: 'Laporan Anda telah dikirim dan akan ditinjau oleh tim kami.'
        );
    }

    public function render()
    {
        return view('livewire.report-form');
    }
}

