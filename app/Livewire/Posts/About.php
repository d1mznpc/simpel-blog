<?php

namespace App\Livewire\Posts;

use Livewire\Component;

class About extends Component
{
    public function render()
    {
        return view('livewire.posts.about')->layout('layouts.app');
    }
}

