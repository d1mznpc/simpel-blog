<?php
namespace App\Http\Livewire\Posts;

use Livewire\Component;
use App\Models\Posts;

class Index extends Component
{
    public $posts;

    public function mount()
    {
        $this->posts = Posts::all();
    }

    public function delete($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();
        session()->flash('deleted', 'Post berhasil dihapus!');
        $this->posts = Posts::all(); // Refresh data
    }

    public function render()
    {
        return view('livewire.posts.index');
    }
}
