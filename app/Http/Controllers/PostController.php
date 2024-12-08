<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            'categories' => Category::latest()->get(),
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ], [
            'category_id.required' => 'Kategori wajib dipilih',
            'category_id.exists' => 'Kategori tidak valid',
            'title.required' => 'Judul wajib diisi',
            'title.max' => 'Judul maksimal 255 karakter',
            'content.required' => 'Konten wajib diisi',
        ]);

        $validatedData['user_id'] = Auth::id();

        $post = $request->user()->posts()->create($validatedData);
        toast('Diskusi berhasil dibuat', 'success');

        return redirect()->route('posts.index', $post->id);
    }
}
