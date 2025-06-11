<?php
namespace App\Http\Livewire\Posts;

use Livewire\Component;
use App\Models\Posts;

class Create extends Component
{
    public $title, $content;

    public function store()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Posts::create([
            'title' => $this->title,
            'content' => $this->content,
        ]);

        session()->flash('success', 'Post berhasil dibuat!');
        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.posts.create');
    }
}
