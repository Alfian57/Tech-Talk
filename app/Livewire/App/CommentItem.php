<?php

namespace App\Livewire\App;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CommentItem extends Component
{
    public Post $post;

    public Comment $comment;

    public bool $isEdit = false;

    public string $new_comment;

    public function mount()
    {
        $this->new_comment = $this->comment->content;
    }

    public function like($commentId = null)
    {
        $this->checkAuth();
        $this->updateCommentReaction('like', $commentId);
    }

    public function dislike($commentId = null)
    {
        $this->checkAuth();
        $this->updateCommentReaction('dislike', $commentId);
    }

    public function report($id)
    {
        $this->checkAuth();
        $this->dispatch('set-report-modal', $id, 'comment');
    }

    public function delete($commentId)
    {
        $comment = Comment::where('id', $commentId)->first();
        if ($comment) {
            $comment->delete();
        }
        $this->dispatch('refresh-post-detail-page');
        $refresh = true;
    }

    public function toggleAsBest($commentId)
    {
        $comment = Comment::where('id', $commentId)->first();
        if ($comment) {
            $comment->update([
                'is_best' => ! $comment->is_best,
            ]);
        }

        $refresh = true;
    }

    public function toggleEdit()
    {
        $this->isEdit = ! $this->isEdit;
    }

    public function edit()
    {
        $this->validate([
            'new_comment' => 'required|min:5',
        ]);
        $this->comment->update([
            'content' => $this->new_comment,
        ]);
        $this->isEdit = false;
    }

    private function updateCommentReaction($type, $commentId)
    {
        $comment = $this->post->comments()->find($commentId);
        $reaction = $comment->reactions()->where('user_id', Auth::id())->where('type', $type)->first();
        if ($reaction) {
            $reaction->delete();
        } else {
            $comment->reactions()->create([
                'user_id' => Auth::id(),
                'comment_id' => $comment->id,
                'type' => $type,
            ]);
        }
        $comment->save();
    }

    private function checkAuth()
    {
        if (! Auth::check()) {
            return $this->redirect(route('login'));
        }
    }

    public function render()
    {
        return view('livewire.app.comment-item');
    }
}
