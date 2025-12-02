<?php

namespace App\Livewire;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class TestimonialList extends Component
{
    public function render()
    {
        $testimonials = Testimonial::published()->latest()->get();

        return view('livewire.testimonial-list', ['testimonials' => $testimonials]);
    }
}
