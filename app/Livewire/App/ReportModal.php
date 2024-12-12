<?php

namespace App\Livewire\App;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;
use Livewire\Component;

class ReportModal extends Component
{
    public Post $currentPost;

    public string $type;

    public Post $post;

    public Comment $comment;

    public string $content = '';

    #[On('set-report-modal')]
    public function setData(string $id, string $type)
    {
        $this->type = $type;

        if ($type === 'post') {
            $this->post = Post::find($id);
        } else {
            $this->comment = Comment::find($id);
        }
    }

    public function submit()
    {
        if (! Auth::check()) {
            return $this->redirect(route('login'));
        }
        $this->validate([
            'content' => 'required|min:10',
        ]);

        /**
         * @var \App\Models\User $user
         */
        $user = Auth::user();
        $user->reports()->create([
            'content' => $this->content,
            'status' => 'opened',
            'comment_id' => $this->type === 'comment' ? $this->comment->id : null,
            'post_id' => $this->type === 'post' ? $this->post->id : null,
        ]);

        toast('Laporan berhasil dikirim.', 'success');

        return $this->redirect(route('posts.index', $this->currentPost->id));
    }

    public function render()
    {
        return view('livewire.app.report-modal');
    }
}
