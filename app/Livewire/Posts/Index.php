<?php

namespace App\Livewire\Posts;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Posts;

class Index extends Component
{
    public $posts;

    public function mount()
    {
        $this->posts = Posts::all();
    }

    #[On('deletePostConfirmed')]
    public function deletePostConfirmed($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus!');
    }


    public function render()
    {
        return view('livewire.posts.index')
            ->layout('layouts.app');
    }
}
