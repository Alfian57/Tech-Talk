<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.post.index', [
            'title' => 'List Topik',
            'posts' => Post::latest()->with('user', 'category')->get(),
        ]);
    }

    public function show(Post $post)
    {
        return view('dashboard.pages.post.show', [
            'title' => 'Detail Topik',
            'post' => $post,
        ]);
    }

    public function pin(Post $post)
    {
        $post->update([
            'is_pinned' => true,
        ]);

        toast('Topik berhasil dipin', 'success');
        return redirect()->back();
    }

    public function unpin(Post $post)
    {
        $post->update([
            'is_pinned' => false,
        ]);

        toast('Topik berhasil diunpin', 'success');
        return redirect()->back();
    }

    public function open(Post $post)
    {
        $post->update([
            'is_closed' => false,
        ]);

        toast('Topik berhasil dibuka', 'success');
        return redirect()->back();
    }

    public function close(Post $post)
    {
        $post->update([
            'is_closed' => true,
        ]);

        toast('Topik berhasil ditutup', 'success');
        return redirect()->back();
    }

    public function destroy(Post $post)
    {
        $post->delete();

        toast('Topik berhasil dihapus', 'success');
        return redirect()->route('dashboard.posts.index');
    }
}
