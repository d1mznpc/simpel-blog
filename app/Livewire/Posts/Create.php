<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Posts;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Validator;

class Create extends Component
{
    public $title = '';
    public $content = '';

    public function store()
    {
        // Menggunakan rules dari PostRequest
        $validated = Validator::make(
            ['title' => $this->title, 'content' => $this->content],
            (new PostRequest())->rules()
        )->validate();

        Posts::create($validated);

        session()->flash('success', 'Post berhasil dibuat!');
        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.posts.create')
            ->layout('layouts.app');
    }
}
