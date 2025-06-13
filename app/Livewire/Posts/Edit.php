<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Posts;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostRequest;

class Edit extends Component
{
    use WithFileUploads;

    public $postId;
    public $title;
    public $content;
    public $image;      // Gambar lama (path-nya)
    public $newImage;   // Gambar baru (upload)

    public function mount($id)
    {
        $post = Posts::findOrFail($id);
        $this->postId = $post->id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->image = $post->image;
    }

    public function update()
    {
        $data = [
            'title' => $this->title,
            'content' => $this->content,
        ];

        // Validasi teks
        $validated = Validator::make($data, (new PostRequest())->rules())->validate();

        // Validasi dan simpan gambar baru jika ada
        if ($this->newImage) {
            $this->validate([
                'newImage' => 'image|max:2048', // max 2MB
            ]);

            // Hapus gambar lama (jika ada)
            if ($this->image && Storage::disk('public')->exists($this->image)) {
                Storage::disk('public')->delete($this->image);
            }

            // Simpan gambar baru
            $path = $this->newImage->store('images/posts', 'public');
            $validated['image'] = $path;
        }

        // Update post
        Posts::findOrFail($this->postId)->update($validated);

        session()->flash('success', 'Post berhasil diperbarui!');
        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.posts.edit')->layout('layouts.app');
    }
}
