<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Posts;

class Show extends Component
{
    public $post;

    public function mount($id)
    {
        $this->post = Posts::findOrFail($id);
    }

    public function render()
    {
        return view('livewire.posts.show')
            ->layout('layouts.app');
    }
}
