<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::latest()->paginate(5);
        return view('categories.index', compact('categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // Menampilkan form untuk membuat kategori baru
    public function create()
    {
        return view('categories.create');
    }

    // Menyimpan kategori baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan kategori tertentu
    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    // Menampilkan form untuk mengedit kategori
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    // Mengupdate kategori
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'nama_kategori' => 'required|string|max:255',
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')
                         ->with('success', 'Kategori berhasil diperbarui.');
    }

    // Menghapus kategori
    public function destroy(Category $category)
{
    $category->delete();
    return redirect()->route('categories.index')
                     ->with('success', 'Kategori berhasil dihapus.');
}

}
