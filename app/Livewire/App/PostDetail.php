<?php

namespace App\Livewire\App;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostDetail extends Component
{
    public Post $post;

    public function like($type, $commentId = null)
    {
        if (! Auth::check()) {
            return $this->redirect(route('login'));
        }

        if ($type === 'post') {
            $reaction = $this->post->reactions()->where('user_id', Auth::id())->where('type', 'like')->first();
            if ($reaction) {
                $reaction->delete();
            } else {
                $this->post->reactions()->create([
                    'user_id' => Auth::id(),
                    'post_id' => $this->post->id,
                    'type' => 'like',
                ]);
            }
            $this->post->save();
        } else {
            $comment = $this->post->comments()->find($commentId);
            $reaction = $comment->reactions()->where('user_id', Auth::id())->where('type', 'like')->first();
            if ($reaction) {
                $reaction->delete();
            } else {
                $comment->reactions()->create([
                    'user_id' => Auth::id(),
                    'comment_id' => $commentId,
                    'type' => 'like',
                ]);
            }
            $comment->save();
        }
    }

    public function dislike($type, $commentId = null)
    {
        if (! Auth::check()) {
            return $this->redirect(route('login'));
        }

        if ($type === 'post') {
            $reaction = $this->post->reactions()->where('user_id', Auth::id())->where('type', 'dislike')->first();
            if ($reaction) {
                $reaction->delete();
            } else {
                $this->post->reactions()->create([
                    'user_id' => Auth::id(),
                    'post_id' => $this->post->id,
                    'type' => 'dislike',
                ]);
            }
            $this->post->save();
        } else {
            $comment = $this->post->comments()->find($commentId);
            $reaction = $comment->reactions()->where('user_id', Auth::id())->where('type', 'dislike')->first();
            if ($reaction) {
                $reaction->delete();
            } else {
                $comment->reactions()->create([
                    'user_id' => Auth::id(),
                    'comment_id' => $commentId,
                    'type' => 'dislike',
                ]);
            }
            $comment->save();
        }
    }

    public function report($id, $type)
    {
        if (! Auth::check()) {
            return $this->redirect(route('login'));
        }

        $this->dispatch('set-report-modal', $id, $type);
    }

    public function render()
    {
        return view('livewire.app.post-detail');
    }
}
