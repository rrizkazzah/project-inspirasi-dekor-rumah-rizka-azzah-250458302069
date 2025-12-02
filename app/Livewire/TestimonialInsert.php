<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Testimonial;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')]
class TestimonialInsert extends Component
{

    public $name = '';
    public $testimoni = '';
    public $content = '';
    public $rating = 5;

    protected function rules () {
        return [
            'name' => 'required|string|max:255',
            'content' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
        ];
    }

    public function submit()
    {

        $this->validate();
        Testimonial::create([
            'name' => $this->name,
            'content' => $this->content,
            'rating' => $this->rating,
            'is_published' => true, // otomatis publish
        ]);
        session()->flash('message', 'Testimoni berhasil ditambahkan!');
        return redirect()->route('testimonials');
    }

    public function render()
    {
        return view('livewire.testimonial-insert');
    }
}
