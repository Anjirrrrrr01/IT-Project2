<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Home</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Menghubungkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <!-- Menampilkan Pesan Sukses atau Error -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> Terdapat beberapa masalah dengan input Anda.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="row">
            <!-- ... (rest of the content) ... -->
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">My Website</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="/IT">Kelola Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">Kelola kasir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('categories.index') }}">Kelola Kategori</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
             <!-- Form Pembuatan Post -->
<!-- Form Pembuatan Post -->
<div class="card mb-4">
    <div class="card-header bg-primary text-white">
        <h2>Create a New Produk</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('posts.create') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nama_produk" class="form-label">Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk" id="nama_produk" placeholder="Masukkan nama produk" required>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga</label>
                <input type="number" name="harga" class="form-control" id="harga" placeholder="Masukkan harga" required>
            </div>
            <div class="mb-3">
                <label for="stok" class="form-label">Stok</label>
                <input type="number" name="stok" class="form-control" id="stok" placeholder="Masukkan stok" required>
            </div>
            <div class="mb-3">
                <label for="category_id" class="form-label">Kategori</label>
                <select name="category_id" class="form-control" id="category_id" required>
                    <option value="">-- Pilih Kategori --</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->nama_kategori }}</option>
                    @endforeach
                </select>
            </div>
            <!-- Menambahkan Input File untuk Gambar -->
            <div class="mb-3">
                <label for="image" class="form-label">Gambar Produk</label>
                <input type="file" name="image" class="form-control" id="image" accept="image/*">
            </div>
            <button type="submit" class="btn btn-success">Save Post</button>
        </form>
    </div>
</div>


            <div class="col-md-6">
               <!-- Daftar Semua Post -->
<div class="card">
    <div class="card-header bg-dark text-white">
        <h2>All Posts</h2>
    </div>
    <div class="card-body">
        @foreach ($posts as $post)
            <div class="mb-4 p-3 border rounded bg-light">
                <!-- Menampilkan Gambar Produk jika ada -->
                @if($post->image)
                    <div class="mb-3">
                        <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->nama_produk }}" style="max-width: 100%; height: auto;">
                    </div>
                @endif

                <h3 class="text-primary">{{ $post->nama_produk }}</h3>
                <p>Kategori: <strong>{{ $post->category->nama_kategori }}</strong></p>
                <p>Harga: Rp{{ number_format($post->harga, 0, ',', '.') }}</p>
                <p>Stok: {{ $post->stok }} unit</p>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin dihapus?')">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>


                <!-- Pagination -->
                <div class="mt-4">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>
