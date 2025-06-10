<?php

namespace App\Http\Controllers;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Posts::all();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
    ]);

    Posts::create($validated);

    // Flash message
    return redirect()->route('posts.index')->with('success', 'Post berhasil dibuat!');
}

    
    public function edit($id)
    {
        $post = Posts::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $post = Posts::findOrFail($id);
        $post->update($validated);

        // Tambahkan flash message sukses
        return redirect()->route('posts.index')->with('success', 'Selamat, post berhasil diedit!');
    }


    public function show($id)
    {
        $post = Posts::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    public function destroy($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();

        return redirect()->route('posts.index')->with('deleted', 'Post telah berhasil dihapus!');
    }

}
