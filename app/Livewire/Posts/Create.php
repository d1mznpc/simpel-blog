<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Posts;

class Create extends Component
{
    use WithFileUploads;

    public $title, $content, $image;

    public function store()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        logger('Image upload start');
        logger($this->image); // cek isi image

        $imagePath = $this->image->store('images/posts', 'public');

        logger('Stored at: ' . $imagePath);

        Posts::create([
            'title' => $this->title,
            'content' => $this->content,
            'image' => $imagePath,
        ]);

        session()->flash('success', 'Post berhasil dibuat!');
        return redirect()->route('posts.index');
    }



    public function render()
    {
        return view('livewire.posts.create')
            ->layout('layouts.app');
    }
}
