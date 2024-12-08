<?php

namespace App\Observers;

use App\Models\Post;
use App\Models\UserLog;

class PostObserver
{
    public function created(Post $post): void
    {
        UserLog::create([
            'user_id' => $post->user_id,
            'action' => 'post-create',
            'description' => "User membuat post dengan judul: {$post->title}",
        ]);
    }

    public function updated(Post $post): void
    {
        UserLog::create([
            'user_id' => $post->user_id,
            'action' => 'post-edit',
            'description' => "User mengedit post dengan judul: {$post->title}",
        ]);
    }

    public function deleted(Post $post): void
    {
        UserLog::create([
            'user_id' => $post->user_id,
            'action' => 'post-delete',
            'description' => "User menghapus post dengan judul: {$post->title}",
        ]);
    }
}
