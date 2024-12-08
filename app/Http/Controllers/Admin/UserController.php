<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.user.index', [
            'title' => 'List Pengguna',
            'users' => User::latest()->whereNot('id', Auth::id())->get(),
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.user.create', [
            'title' => 'Tambah Pengguna',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'role' => 'required|in:admin,user,moderator',
        ]);

        User::create($validatedData);
        toast('User berhasil ditambahkan', 'success');

        return redirect()->route('dashboard.users.index');
    }

    public function show(User $user)
    {
        return view('dashboard.pages.user.show', [
            'title' => 'Detail Pengguna',
            'user' => $user,
            'logs' => $user->userLogs()->latest()->get(),
        ]);
    }

    public function edit(User $user)
    {
        return view('dashboard.pages.user.edit', [
            'title' => 'Edit Pengguna',
            'user' => $user,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,'.$user->id,
            'password' => 'nullable|min:8',
            'role' => 'required|in:admin,user,moderator',
        ]);

        if (! $request->password) {
            unset($validatedData['password']);
        }

        $user->update($validatedData);
        toast('User berhasil diupdate', 'success');

        return redirect()->route('dashboard.users.index');
    }

    public function destroy(User $user)
    {
        $user->delete();
        toast('User berhasil dihapus', 'success');

        return redirect()->route('dashboard.users.index');
    }

    public function banned(User $user)
    {
        $user->update([
            'is_banned' => ! $user->is_banned,
        ]);
        toast('User berhasil diupdate', 'success');

        return redirect()->route('dashboard.users.index');
    }

    public function unbanned(User $user)
    {
        $user->update([
            'is_banned' => ! $user->is_banned,
        ]);
        toast('User berhasil diupdate', 'success');

        return redirect()->route('dashboard.users.index');
    }
}
