<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.profile.index', [
            'title' => 'Profil',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth::id(),
            'bio' => 'nullable|string',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'current_password' => 'required_with:password|string|min:8',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        /**
         * @var \App\Models\User $user
         */
        $user = Auth::user();
        $user->update($request->only('name', 'email', 'bio'));

        if ($request->password) {
            if (! Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->withErrors([
                    'current_password' => 'Password lama tidak sesuai',
                ]);
            }

            $user->update([
                'password' => bcrypt($request->password),
            ]);
        }

        if ($request->profile_picture) {
            if ($user->profile_picture && file_exists(storage_path('app/public/'.$user->profile_picture))) {
                Storage::delete('public/'.$user->profile_picture);
            }

            $file = $request->file('profile_picture');
            $filename = $file->store('images/profile-pic', 'public');
            $user->update([
                'profile_picture' => $filename,
            ]);
        }

        toast('Profil berhasil diperbarui', 'success');

        return redirect()->back();
    }
}
