<?php

namespace App\Livewire\App;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentForm extends Component
{
    public Post $post;

    public string $content = '';

    protected $rules = [
        'content' => 'required|min:3',
    ];

    public function addComment()
    {
        $this->checkAuth();
        $this->validate();

        $this->post->comments()->create([
            'user_id' => Auth::id(),
            'content' => $this->content,
        ]);

        $this->reset('content');
        $this->dispatch('refresh-post-detail-page');
    }

    public function checkAuth()
    {
        if (! Auth::check()) {
            return redirect(route('login'));
        }
    }

    public function render()
    {
        return view('livewire.app.comment-form');
    }
}
