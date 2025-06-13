<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Posts;

class Index extends Component
{
    public function render()
    {
        $posts = Posts::latest()->get();

        return view('livewire.posts.index', compact('posts'))
            ->layout('layouts.app');
    }
}
