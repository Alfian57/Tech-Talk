<?php

namespace App\Livewire\App;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class PostForm extends Component
{
    public string $title = '';

    public string $content = '';

    public int $category_id = 0;

    public function rules()
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ];
    }

    public function submit()
    {
        $this->validate();

        /**
         * @var \App\Models\User $user
         */
        $user = Auth::user();
        $post = $user->posts()->create([
            'category_id' => $this->category_id,
            'title' => $this->title,
            'content' => $this->content,
        ]);

        toast('Diskusi berhasil dibuat', 'success');

        return $this->redirect((route('posts.index', $post->id)));
    }

    public function render()
    {
        return view('livewire.app.post-form', [
            'categories' => Category::latest()->get(),
        ]);
    }
}
