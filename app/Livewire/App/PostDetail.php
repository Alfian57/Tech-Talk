<?php

namespace App\Livewire\App;

use App\Models\Post;
use Livewire\Component;

class PostDetail extends Component
{
    public Post $post;

    protected $listeners = [
        'refresh-post-detail-page' => '$refresh',
    ];

    public function render()
    {
        return view('livewire.app.post-detail');
    }
}
