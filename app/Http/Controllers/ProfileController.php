<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('app.pages.profile', [
            'title' => 'Profil',
        ]);
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'profile_picture' => 'image|max:2048',
        ]);

        /**
         * @var \App\Models\User $user
         */
        $user = Auth::user();
        $user->update([
            'profile_picture' => $request->file('profile_picture')->store('images/profile-pic', 'public'),
        ]);

        toast('Foto profil berhasil diperbarui', 'success');

        return redirect(route('profile.index'));
    }
}
