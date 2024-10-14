<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman About</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Menghubungkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

    <h1>Kelola kasir</h1>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">My Website</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/IT">Kelola produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="/about">Kelola kasir</a>
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
            <div class="col-md-8 mx-auto">
                <h1 class="text-center mb-4">Halaman Kelola Kasir</h1>

                <!-- Pesan sukses -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Form Pembuatan Kasir -->
                <div class="card mb-4">
                    <div class="card-header bg-primary text-white">
                        <h2>Create a New Kasir</h2>
                    </div>
                    <div class="card-body">
                        <form action="/create-kasir" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama kasir</label>
                                <input type="text" class="form-control" name="nama" placeholder="Enter nama" required>
                            </div>
                            <div class="mb-3">
                                <label for="no_telp">No_telpon</label>
                                <input type="text" name="no_telp" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" required>
                            </div>
                            <button type="submit" class="btn btn-success">Save Kasir</button>
                        </form>
                    </div>
                </div>

                <!-- Daftar Semua Kasir -->
                <div class="card">
                    <div class="card-header bg-dark text-white">
                        <h2>All Kasir</h2>
                    </div>
                    <div class="card-body">
                        @foreach ($kasirs as $item)
                            <div class="mb-4 p-3 border rounded bg-light">
                                <h3 class="text-primary">{{ $item->nama }}</h3>
                                <p>No telpon: {{ $item->no_telp }}</p>
                                <p>Alamat: {{ $item->alamat }}</p>
                                <p>Tanggal lahir: {{ $item->tgl_lahir }}</p>
                                <p>Tempat lahir: {{ $item->tempat_lahir }}</p>
                                <div class="d-flex justify-content-between">
                                    <a href="/edit-kasir/{{ $item->id }}" class="btn btn-warning">Edit</a>
                                    <form action="/delete-kasir/{{ $item->id }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Yakin dihapus?')">Delete</button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menghubungkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
