<?php

namespace App\Livewire\Admin;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class TestimonialManagement extends Component
{
    use WithPagination;

    public function deleteTestimonial($id)
    {
        Testimonial::findOrFail($id)->delete();
        session()->flash('message', 'Testimoni berhasil dihapus!');
    }

    public function render()
    {
        $testimonials = Testimonial::latest()->paginate(12);

        $stats = [
            'total' => Testimonial::count(),
        ];

        return view('livewire.admin.testimonial-management', [
            'testimonials' => $testimonials,
            'stats' => $stats,
        ]);
    }
}
