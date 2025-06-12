<?php

namespace App\Livewire\Posts;

use Livewire\Component;
use App\Models\Posts;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Validator;

class Create extends Component
{
    public string $title = '';
    public string $content = '';

    public function store()
    {
        // Validasi menggunakan aturan dari Form Request
        $validated = Validator::make(
            ['title' => $this->title, 'content' => $this->content],
            (new PostRequest())->rules()
        )->validate();

        Posts::create($validated);

        session()->flash('success', 'Post berhasil ditambahkan!');
        return redirect()->route('posts.index');
    }

    public function render()
    {
        return view('livewire.posts.create')
            ->layout('layouts.app');
    }
}
