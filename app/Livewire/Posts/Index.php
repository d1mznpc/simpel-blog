<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\Posts;

class Index extends Component
{
    public $search = '';

    #[On('deletePostConfirmed')]
    public function deletePostConfirmed($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('success', 'Post berhasil dihapus!');
    }

    public function render()
    {
        $posts = Posts::query()
            ->when($this->search, fn($q) =>
                $q->where('title', 'like', '%' . $this->search . '%')
            )
            ->latest()
            ->get();

        return view('livewire.posts.index', compact('posts'))->layout('layouts.app');
    }
}
