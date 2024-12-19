<?php

namespace App\Livewire\App;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileModal extends Component
{
    use WithFileUploads;

    public User $user;

    public $name = '';

    public $email = '';

    public $bio = '';

    public $profile_picture;

    public $password = '';

    public $password_confirmation = '';

    public function updatedProfilePicture($value)
    {
        $this->validate([
            'profile_picture' => 'image|max:2048',
        ]);

        $this->user->update([
            'profile_picture' => $value->store('images/profile-pic', 'public'),
        ]);

        toast('Foto profil berhasil diperbarui', 'success');

        return $this->redirect(route('profile.index'));
    }

    public function mount()
    {
        $this->user = Auth::user() ? Auth::user() : new User;
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->bio = Auth::user()->bio;
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'bio' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $this->user->update([
            'name' => $this->name,
            'email' => $this->email,
            'bio' => $this->bio,
        ]);

        if ($this->password) {
            $this->user->update([
                'password' => bcrypt($this->password),
            ]);
        }

        toast('Profil berhasil diperbarui', 'success');

        return $this->redirect(route('profile.index'));
    }

    public function render()
    {
        return view('livewire.app.profile-modal');
    }
}
