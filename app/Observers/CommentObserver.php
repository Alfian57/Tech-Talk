<?php

namespace App\Observers;

use App\Models\Comment;
use App\Models\UserLog;

class CommentObserver
{
    public function created(Comment $comment): void
    {
        UserLog::create([
            'user_id' => $comment->user_id,
            'action' => 'comment-create',
            'description' => "User membuat komentar pada post dengan judul: {$comment->post->title}",
        ]);
    }

    public function updated(Comment $comment): void
    {
        UserLog::create([
            'user_id' => $comment->user_id,
            'action' => 'comment-edit',
            'description' => "User mengedit komentar pada post dengan judul: {$comment->post->title}",
        ]);
    }

    public function deleted(Comment $comment): void
    {
        UserLog::create([
            'user_id' => $comment->user_id,
            'action' => 'comment-delete',
            'description' => "User menghapus komentar pada post dengan judul: {$comment->post->title}",
        ]);
    }
}
