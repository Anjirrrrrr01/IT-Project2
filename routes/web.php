<?php

use App\Models\Post;
use App\Models\Kasir;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\CategoryController;


// Rute untuk halaman About, mengambil data dari model Kasir
Route::get('/about', function () {
    $kasirs = Kasir::all(); // Mengambil semua data dari model Kasir
    return view('about', ['kasirs' => $kasirs]); // Mengirimkan data ke view
});

// Rute untuk halaman IT, mengambil data dari model Post
Route::get('/IT', function () {
    $posts = Post::all(); // Mengambil semua data dari model Post
    return view('home', ['posts' => $posts]); // Mengirimkan data ke view
});
Route::get('/', function () {
    return redirect()->route('categories.index');
});

Route::resource('categories', CategoryController::class);

// Hapus rute manual berikut ini
// Route::delete('categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy');


// Rute untuk menangani pembuatan kasir
Route::post('/create-kasir', [KasirController::class, 'createKasir']);

// Rute untuk menampilkan halaman edit kasir
Route::get('/edit-kasir/{kasir}', [KasirController::class, 'showEditScreen']);

// Rute untuk memperbarui kasir
Route::put('/edit-kasir/{kasir}', [KasirController::class, 'actuallyUpdateKasir']);

// Rute untuk menghapus kasir
Route::delete('/delete-kasir/{kasir}', [KasirController::class, 'deletekasir']);

Route::get('/IT', [PostController::class, 'index'])->name('home');
Route::post('/create-post', [PostController::class, 'createPost'])->name('posts.create');
Route::get('/edit-post/{post}', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/update-post/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/delete-post/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
