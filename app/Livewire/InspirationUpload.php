<?php

namespace App\Livewire;

use App\Models\Tag;
use App\Models\Ruangan;
use Livewire\Component;
use App\Models\Inspiration;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Auth;

#[Layout('layouts.app')]
class InspirationUpload extends Component
{
    use WithFileUploads;

    public $image;
    public $title;
    public $description;
    public $ruangan_id;
    public $tags_id;
    public $design_by;
    public $area;
    public $year;
    public $country;
    public $jenis_material;

    protected function rules()
    {
        return [
            'image' => 'required|image|max:5120', // 5MB Max
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'ruangan_id' => 'nullable|exists:ruangan,id',
            'tags_id' => 'nullable|exists:tags,id',
            'design_by' => 'nullable|string|max:100',
            'area' => 'nullable|string|max:100',
            'year' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'country' => 'nullable|string|max:100',
            'jenis_material' => 'nullable|string|max:255',
        ];
    }

    public function submit()
    {
        $this->validate();

        $imagePath = $this->image->store('inspirations', 'public');

        // Cek role user: admin tidak perlu moderasi, user biasa perlu moderasi
        /** @var \App\Models\User $user */
        $user = Auth::user();
        $status = $user->isAdmin() ? 'approved' : 'pending';

        Inspiration::create([
            'user_id' => auth()->id(),
            'title' => $this->title,
            'description' => $this->description,
            'ruangan_id' => $this->ruangan_id,
            'tags_id' => $this->tags_id,
            'design_by' => $this->design_by,
            'area' => $this->area,
            'year' => $this->year,
            'country' => $this->country,
            'jenis_material' => $this->jenis_material,
            'image_url' => $imagePath,
            'status' => $status,
        ]);

        // Pesan sukses berbeda berdasarkan role
        if ($user->isAdmin()) {
            session()->flash('success', 'Inspirasi berhasil diunggah dan langsung dipublikasikan! 🎉');
        } else {
            session()->flash('success', 'Inspirasi berhasil diunggah! 🎉 Inspirasi Anda sedang dalam proses moderasi dan akan muncul di galeri setelah disetujui admin (1-2 hari kerja).');
        }

        return redirect()->route('gallery');
    }

    public function render()
    {
        $ruangans = Ruangan::orderBy('name')->get();
        $tags = Tag::orderBy('name')->get();

        return view('livewire.inspiration-upload', [
            'ruangans' => $ruangans,
            'tags' => $tags,
        ]);
    }
}

