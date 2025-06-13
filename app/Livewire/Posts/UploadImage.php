<?php
namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class UploadImage extends Component
{
    use WithFileUploads;

    public $image;

    public function updatedImage()
    {
        $this->validate([
            'image' => 'image|max:2048', // max 2MB
        ]);

        // Validasi rasio 3:2
        [$width, $height] = getimagesize($this->image->getRealPath());
        $ratio = round($width / $height, 2);

        if ($ratio !== round(3 / 2, 2)) {
            $this->reset('image');
            session()->flash('error', 'Gambar harus memiliki rasio 3:2.');
        }
    }

    public function save()
    {
        $this->validate([
            'image' => 'required|image|max:2048',
        ]);

        // Simpan gambar ke public/uploads
        $filename = uniqid() . '.' . $this->image->getClientOriginalExtension();
        $path = $this->image->storeAs('public/uploads', $filename);

        session()->flash('success', 'Gambar berhasil diunggah!');
    }

    public function render()
    {
        return view('livewire.upload-image');
    }
}
