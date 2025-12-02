<?php

namespace App\Livewire\Admin;

use App\Models\Testimonial;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.admin')]
class TestimonialForm extends Component
{
    public $testimonialId;
    public $name = '';
    public $content = '';
    public $rating = 5;
    public $is_published = false;

    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'content' => 'required|string|max:1000',
            'rating' => 'required|integer|min:1|max:5',
            'is_published' => 'boolean',
        ];
    }

    public function mount($id = null)
    {
        if ($id) {
            $testimonial = Testimonial::findOrFail($id);
            $this->testimonialId = $testimonial->id;
            $this->name = $testimonial->name;
            $this->content = $testimonial->content;
            $this->rating = $testimonial->rating;
            $this->is_published = $testimonial->is_published;
        }
    }

    public function save()
    {
        $this->validate();

        if ($this->testimonialId) {
            $testimonial = Testimonial::findOrFail($this->testimonialId);
            $testimonial->update([
                'name' => $this->name,
                'content' => $this->content,
                'rating' => $this->rating,
                'is_published' => $this->is_published,
            ]);
            session()->flash('message', 'Testimoni berhasil diupdate!');
        } else {
            Testimonial::create([
                'name' => $this->name,
                'content' => $this->content,
                'rating' => $this->rating,
                'is_published' => $this->is_published,
            ]);
            session()->flash('message', 'Testimoni berhasil ditambahkan!');
        }

        return redirect()->route('admin.testimonials');
    }

    public function cancel()
    {
        return redirect()->route('admin.testimonials');
    }

    public function delete()
    {
        if ($this->testimonialId) {
            Testimonial::findOrFail($this->testimonialId)->delete();
            session()->flash('message', 'Testimoni berhasil dihapus!');
            return redirect()->route('admin.testimonials');
        }
    }

    public function render()
    {
        return view('livewire.admin.testimonial-form');
    }
}
