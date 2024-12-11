<?php

namespace App\Livewire\App;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostInteraction extends Component
{
    public Post $post;

    public function like()
    {
        $this->checkAuth();
        $this->updateReaction('like');
    }

    public function dislike()
    {
        $this->checkAuth();
        $this->updateReaction('dislike');
    }

    public function tooglePostStatus()
    {
        $this->post->is_closed = ! $this->post->is_closed;
        $this->post->save();

        toast('Topik berhasil '.($this->post->is_closed ? 'ditutup' : 'dibuka').'.', 'success');

        return $this->redirect(route('posts.index', $this->post->id));
    }

    public function togglePinPost()
    {
        $this->post->is_pinned = ! $this->post->is_pinned;
        $this->post->save();

        toast('Topik berhasil di-'.($this->post->is_pinned ? 'pin' : 'unpin').'.', 'success');

        return $this->redirect(route('posts.index', $this->post->id));
    }

    public function deletePost()
    {
        $this->post->delete();
        toast('Topik berhasil dihapus.', 'success');

        return $this->redirect(route('home'));
    }

    public function report($id, $type)
    {
        if (! Auth::check()) {
            return $this->redirect(route('login'));
        }

        $this->dispatch('set-report-modal', $id, $type);
    }

    private function updateReaction($type)
    {
        $reaction = $this->post->reactions()->where('user_id', Auth::id())->where('type', $type)->first();
        if ($reaction) {
            $reaction->delete();
        } else {
            $this->post->reactions()->create([
                'user_id' => Auth::id(),
                'post_id' => $this->post->id,
                'type' => $type,
            ]);
        }
    }

    private function checkAuth()
    {
        if (! Auth::check()) {
            return $this->redirect(route('login'));
        }
    }

    public function render()
    {
        return view('livewire.app.post-interaction');
    }
}
