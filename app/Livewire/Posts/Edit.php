<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Posts;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\PostRequest;

class Edit extends Component
{
    public $postId;
    public $title;
    public $content;

    public function mount($id)
    {
        $post = Posts::findOrFail($id);
        $this->postId = $post->id;
        $this->title = $post->title;
        $this->content = $post->content;
    }

    public function update()
    {
        $data = [
            'title' => $this->title,
            'content' => $this->content,
        ];

        // Validasi menggunakan PostRequest
        $validated = Validator::make($data, (new PostRequest())->rules())->validate();

        // Update post
        Posts::findOrFail($this->postId)->update($validated);

        session()->flash('success', 'Post berhasil diupdate!');
        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.posts.edit')->layout('layouts.app');
    }
}
