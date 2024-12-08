<?php

namespace App\Http\Controllers;

class CategoryController extends Controller
{
    public function index()
    {
        return view('app.pages.categories.index', [
            'title' => 'Kategori',
        ]);
    }
}
