<?php

namespace App\Livewire\App;

use App\Models\Post;
use Livewire\Component;

class NavbarSearch extends Component
{
    public $search = '';

    public function render()
    {
        return view('livewire.app.navbar-search', [
            'posts' => Post::query()
                ->where('title', 'like', '%'.$this->search.'%')
                ->with('category', 'user')
                ->limit(5)
                ->get(),
        ]);
    }
}
