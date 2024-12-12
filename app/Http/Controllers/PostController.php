<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post)
    {
        return view('app.pages.post-detail', [
            'title' => 'Detail Diskusi',
            'post' => $post->load('user', 'category', 'comments.user', 'reactions'),
        ]);
    }

    public function create()
    {
        return view('app.pages.post-create', [
            'title' => 'Buat Diskusi Baru',
        ]);
    }
}
