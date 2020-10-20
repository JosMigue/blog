<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

use App\Models\Post;

class PostsTable extends Component
{
    use WithPagination;

    public $queryString = ['search'=> ['except' => '']];

    public $search = '';


    public function render()
    {
        $posts = Post::where('title', 'LIKE', '%'.$this->search.'%')->with('user')->paginate(3);
        return view('livewire.posts-table', compact('posts'));
    }
}
