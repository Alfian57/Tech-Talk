<?php

namespace App\Livewire\App;

use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryList extends Component
{
    use WithPagination;

    public string $search = '';

    public function follow($id)
    {
        if (! Auth::check()) {
            return $this->redirect(route('login'));
        }

        $category = Category::find($id);
        if ($category->users()->where('user_id', Auth::id())->exists()) {
            $category->users()->detach(Auth::id());
        } else {
            $category->users()->attach(Auth::id());
        }
    }

    public function render()
    {
        return view('livewire.app.category-list', [
            'categories' => Category::query()
                ->where('name', 'like', "%{$this->search}%")
                ->withCount('users')
                ->latest()
                ->paginate(),
        ]);
    }
}
