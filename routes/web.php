<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController as AppCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController as AppPostController;
use App\Http\Controllers\ProfileController as AppProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'store'])->name('store');
});

Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');
});

Route::middleware('roles:user|moderator')->group(function () {
    Route::redirect('/', '/home');

    Route::get('/posts/create', [AppPostController::class, 'create'])->name('posts.create');

    Route::get('/profile', [AppProfileController::class, 'index'])->name('profile.index');

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about-us');

    Route::get('/categories', [AppCategoryController::class, 'index'])->name('categories.index');
    Route::get('/categories/{category}', [AppCategoryController::class, 'show'])->name('categories.show');

    Route::get('/posts/{post}', [AppPostController::class, 'index'])->name('posts.index');
});

Route::prefix('dashboard')->as('dashboard.')->middleware('roles:admin')->group(function () {
    Route::get('/index', [DashboardController::class, 'index'])->name('index');

    Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('users', UserController::class);
    Route::post('/users/{user}/banned', [UserController::class, 'banned'])->name('users.banned');
    Route::post('/users/{user}/unbanned', [UserController::class, 'unbanned'])->name('users.unbanned');

    Route::resource('categories', CategoryController::class);

    Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
    Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
    Route::post('/posts/{post}/pin', [PostController::class, 'pin'])->name('posts.pin');
    Route::post('/posts/{post}/unpin', [PostController::class, 'unpin'])->name('posts.unpin');
    Route::post('/posts/{post}/open', [PostController::class, 'open'])->name('posts.open');
    Route::post('/posts/{post}/close', [PostController::class, 'close'])->name('posts.close');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::get('reports', [ReportController::class, 'index'])->name('reports.index');
    Route::get('reports/{report}', [ReportController::class, 'show'])->name('reports.show');
    Route::post('reports/{report}/close', [ReportController::class, 'close'])->name('reports.close');
});
