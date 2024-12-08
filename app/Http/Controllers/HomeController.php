<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Reaction;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        return view('app.pages.home', [
            'title' => 'Home',
            'pinnedPosts' => Post::query()
                ->where('is_pinned', true)
                ->with('category', 'user')
                ->withCount(['comments', 'reactions' => function ($query) {
                    $query->where('type', 'like');
                }])
                ->when(request('category'), function ($query) {
                    return $query->where('category_id', request('category'));
                })
                ->limit(3)
                ->get(),
            'posts' => Post::query()
                ->with('category', 'user')
                ->withCount(['comments', 'reactions' => function ($query) {
                    $query->where('type', 'like');
                }])
                ->when(request('category'), function ($query) {
                    return $query->where('category_id', request('category'));
                })
                ->latest()
                ->paginate(),
        ]);
    }

    public function aboutUs()
    {
        return view('app.pages.about-us', [
            'title' => 'Tentang Kami',
            'admins' => User::query()
                ->where('role', 'admin')
                ->limit(10)
                ->get(),
            'moderators' => User::query()
                ->where('role', 'moderator')
                ->limit(25)
                ->get(),
            'topicCount' => Post::query()->count(),
            'topicCountInMonth' => Post::query()
                ->where('created_at', '>=', now()->subMonth())
                ->count(),
            'topicCountInWeek' => Post::query()
                ->where('created_at', '>=', now()->subWeek())
                ->count(),
            'userCount' => User::query()->count(),
            'userCountInMonth' => User::query()
                ->where('created_at', '>=', now()->subMonth())
                ->count(),
            'userCountInWeek' => User::query()
                ->where('created_at', '>=', now()->subWeek())
                ->count(),
            'likeCount' => Reaction::query()
                ->where('type', 'like')
                ->count(),
            'likeCountInMonth' => Reaction::query()
                ->where('type', 'like')
                ->where('created_at', '>=', now()->subMonth())
                ->count(),
            'likeCountInWeek' => Reaction::query()
                ->where('type', 'like')
                ->where('created_at', '>=', now()->subWeek())
                ->count(),
            'commentCount' => Comment::query()
                ->count(),
            'commentCountInMonth' => Comment::query()
                ->where('created_at', '>=', now()->subMonth())
                ->count(),
            'commentCountInWeek' => Comment::query()
                ->where('created_at', '>=', now()->subWeek())
                ->count(),
        ]);
    }
}
