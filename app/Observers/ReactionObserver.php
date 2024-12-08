<?php

namespace App\Observers;

use App\Models\Reaction;
use App\Models\UserLog;

class ReactionObserver
{
    public function created(Reaction $reaction): void
    {
        UserLog::create([
            'user_id' => $reaction->user_id,
            'action' => 'reaction-create',
            'description' => 'User memberikan reaksi ' . $reaction->type . ' pada ' . ($reaction->comment_id ? 'komentar' : 'postingan') . ' dengan id: ' . ($reaction->comment_id ? $reaction->comment_id : $reaction->post_id),
        ]);
    }

    public function updated(Reaction $reaction): void
    {
        UserLog::create([
            'user_id' => $reaction->user_id,
            'action' => 'reaction-update',
            'description' => 'User mengubah reaksi ' . $reaction->type . ' pada ' . ($reaction->comment_id ? 'komentar' : 'postingan') . ' dengan id: ' . ($reaction->comment_id ? $reaction->comment_id : $reaction->post_id),
        ]);
    }

    public function deleted(Reaction $reaction): void
    {
        UserLog::create([
            'user_id' => $reaction->user_id,
            'action' => 'reaction-delete',
            'description' => 'User menghapus reaksi ' . $reaction->type . ' pada ' . ($reaction->comment_id ? 'komentar' : 'postingan') . ' dengan id: ' . ($reaction->comment_id ? $reaction->comment_id : $reaction->post_id),
        ]);
    }
}
