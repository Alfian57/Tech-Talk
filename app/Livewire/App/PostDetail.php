<?php

namespace App\Livewire\App;

use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostDetail extends Component
{
    public Post $post;
    public string $newComment = '';

    public function addComment()
    {
        if (! Auth::check()) {
            return $this->redirect(route('login'));
        }

        $this->validate([
            'newComment' => 'required',
        ]);

        $this->post->comments()->create([
            'user_id' => Auth::id(),
            'content' => $this->newComment,
        ]);

        $this->newComment = '';
    }

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

    public function closePost()
    {
        $this->post->is_closed = true;
        $this->post->save();

        toast('Topik berhasil ditutup.', 'success');
        return $this->redirect(route('posts.index', $this->post->id));
    }

    public function deletePost()
    {
        $this->post->delete();

        toast('Topik berhasil dihapus.', 'success');
        return $this->redirect(route('home'));
    }

    public function togglePinPost()
    {
        $this->post->is_pinned = !$this->post->is_pinned;
        $this->post->save();

        toast('Topik berhasil di-' . ($this->post->is_pinned ? 'pin' : 'unpin') . '.', 'success');
    }

    public function deleteComment($commentId)
    {
        $comment = $this->post->comments()->find($commentId);
        $comment->delete();

        toast('Komentar berhasil dihapus.', 'success');
    }

    public function toggleAsBest($commentId)
    {
        $comment = $this->post->comments()->find($commentId);
        $comment->is_best = !$comment->is_best;
        $comment->save();

        toast('Komentar berhasil di-' . ($comment->is_best ? 'jadikan jawaban terbaik' : 'hapus jawaban terbaik') . '.', 'success');
    }

    public function render()
    {
        return view('livewire.app.post-detail');
    }
}
