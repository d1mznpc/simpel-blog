<?php
namespace App\Http\Livewire\Posts;

use Livewire\Component;
use App\Models\Posts;

class Edit extends Component
{
    public $postId, $title, $content;

    public function mount($id)
    {
        $post = Posts::findOrFail($id);
        $this->postId = $post->id;
        $this->title = $post->title;
        $this->content = $post->content;
    }

    public function update()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Posts::findOrFail($this->postId);
        $post->update([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        session()->flash('success', 'Post berhasil diupdate!');
        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.posts.edit');
    }
}
