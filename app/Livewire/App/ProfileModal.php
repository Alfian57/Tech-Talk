<?php

namespace App\Livewire\App;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileModal extends Component
{
    use WithFileUploads;

    public $name = '';

    public $email = '';

    public $bio = '';

    public $profile_picture;

    public $password = '';

    public $password_confirmation = '';

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'bio' => 'nullable|string',
        'profile_picture' => 'nullable|image|max:2048',
        'password' => 'nullable|string|min:8|confirmed',
    ];

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->bio = Auth::user()->bio;
    }

    public function update()
    {
        $this->validate();

        /**
         * @var \App\Models\User $user
         */
        $user = Auth::user();
        $user->name = $this->name;
        $user->email = $this->email;
        $user->bio = $this->bio;

        if ($this->profile_picture) {
            $path = $this->profile_picture->store('images/profile-pic', 'public');
            $user->profile_picture = $path;
        }

        if ($this->password) {
            $user->password = $this->password;
        }

        $user->save();

        toast('Profil berhasil diperbarui', 'success');

        return $this->redirect(route('profile.index'));
    }

    public function render()
    {
        return view('livewire.app.profile-modal');
    }
}
