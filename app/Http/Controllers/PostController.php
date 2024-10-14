<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Impor Storage Facade

class PostController extends Controller
{
    // Menampilkan semua produk dan formulir pembuatan
    public function index()
    {
        $posts = Post::with('category')->latest()->paginate(5);
        $categories = Category::all();
        return view('home', compact('posts', 'categories'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    // Menyimpan produk baru
    public function createPost(Request $request)
    {
        // Debug: Periksa apakah file 'image' diterima
        if ($request->hasFile('image')) {
            \Log::info('Image file is present.');
        } else {
            \Log::warning('Image file is not present.');
        }

        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        $data = $request->all();

        // Menangani upload gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        Post::create($data);

        return redirect()->route('home')
                         ->with('success', 'Produk berhasil ditambahkan.');
    }

    // Menampilkan form edit produk
    public function edit(Post $post)
    {
        $categories = Category::all();
        return view('edit-post', compact('post', 'categories'));
    }

    // Memperbarui produk
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'nama_produk' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validasi gambar
        ]);

        $data = $request->all();

        // Menangani upload gambar jika ada
        if ($request->hasFile('image')) {
            // Menghapus gambar lama jika ada
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }

            $imagePath = $request->file('image')->store('images', 'public');
            $data['image'] = $imagePath;
        }

        $post->update($data);

        return redirect()->route('home')
                         ->with('success', 'Produk berhasil diperbarui.');
    }

    // Menghapus produk
    public function destroy(Post $post)
    {
        // Menghapus gambar jika ada
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }

        $post->delete();
        return redirect()->route('home')
                         ->with('success', 'Produk berhasil dihapus.');
    }
}
