<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Post;
use App\Models\Reaction;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.dashboard.index', [
            'title' => 'Dashboard',
            'openedPostChartData' => $this->getOpenedPostChartData(),
            'closedPostChartData' => $this->getClosedPostChartData(),
            'postCount' => Post::count(),
            'categoryCount' => Category::count(),
            'commentCount' => Comment::count(),
            'reactionCount' => Reaction::count(),
            'activeUsers' => $this->getActiveUsers(),
            'popularPosts' => $this->getPupularPosts(),
        ]);
    }

    private function getActiveUsers()
    {
        return User::query()
            ->withCount('posts', 'comments')
            ->limit(5)
            ->orderBy('posts_count', 'desc')
            ->get();
    }

    private function getPupularPosts()
    {
        return Post::query()
            ->with('category', 'user')
            ->withCount('reactions', 'comments')
            ->limit(5)
            ->orderBy('reactions_count', 'desc')
            ->get();
    }

    private function getOpenedPostChartData()
    {
        $openPostCountPerMonth = DB::table('posts')
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', Carbon::now()->year)
            ->where('is_closed', false)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        $result = array_fill(0, 12, 0);

        foreach ($openPostCountPerMonth as $month => $count) {
            $result[$month - 1] = $count;
        }

        return $result;
    }

    private function getClosedPostChartData()
    {
        $closedPostCountPerMonth = DB::table('posts')
            ->selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', Carbon::now()->year)
            ->where('is_closed', true)
            ->groupBy('month')
            ->orderBy('month')
            ->get()
            ->pluck('count', 'month')
            ->toArray();

        $result = array_fill(0, 12, 0);

        foreach ($closedPostCountPerMonth as $month => $count) {
            $result[$month - 1] = $count;
        }

        return $result;
    }
}
