<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>

    <link rel="stylesheet" href="{{ asset('css/edit-post.css') }}">

    <!-- Menghubungkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Menghubungkan CSS Kustom (Jika Diperlukan) -->
    {{-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> --}}
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center mb-4">Edit Post</h1>

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

                <!-- Form Edit Post -->
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT') <!-- Mengubah metode menjadi PUT -->

                            <!-- Nama Produk -->
                            <div class="mb-3">
                                <label for="nama_produk" class="form-label">Nama Produk</label>
                                <input type="text" name="nama_produk" class="form-control" id="nama_produk" value="{{ old('nama_produk', $post->nama_produk) }}" placeholder="Masukkan nama produk" required>
                            </div>

                            <!-- Harga -->
                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="text" name="harga" class="form-control" id="harga" value="{{ old('harga', $post->harga) }}" required onkeyup="formatRupiah(this)" placeholder="Rp 0">
                            </div>

                            <!-- Stok -->
                            <div class="mb-3">
                                <label for="stok" class="form-label">Stok</label>
                                <input type="number" name="stok" class="form-control" id="stok" value="{{ old('stok', $post->stok) }}" required placeholder="Masukkan stok">
                            </div>

                            <!-- Kategori -->
                            <div class="mb-3">
                                <label for="category_id" class="form-label">Kategori</label>
                                <select name="category_id" class="form-control" id="category_id" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}" {{ (old('category_id', $post->category_id) == $category->id) ? 'selected' : '' }}>
                                            {{ $category->nama_kategori }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Menampilkan Gambar Saat Ini -->
                            @if($post->image)
                                <div class="mb-3">
                                    <label class="form-label">Gambar Saat Ini</label>
                                    <div>
                                        <img src="{{ asset('storage/' . $post->image) }}" alt="Gambar Produk" style="max-width: 200px;">
                                    </div>
                                </div>
                            @endif

                            <!-- Menambahkan Input File untuk Gambar Baru -->
                            <div class="mb-3">
                                <label for="image" class="form-label">Ganti Gambar Produk</label>
                                <input type="file" name="image" class="form-control" id="image" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-success w-100">Save Changes</button>
                        </form>

                            <!-- Tombol Submit -->
                            <button type="submit" class="btn btn-success w-100">Save Changes</button>
                        </form>
                    </div>
                </div>

                <!-- Kembali ke Halaman Daftar Produk (Opsional) -->
                <div class="mt-3 text-center">
                    <a href="{{ route('home') }}" class="btn btn-secondary">Back to Posts</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Menghubungkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script untuk Format Rupiah (Jika Diperlukan) -->
    <script>
        function formatRupiah(objek) {
            var nilai = objek.value;
            var angka = nilai.replace(/[^,\d]/g, '').toString();
            var pisah = angka.split(',');
            var sisa = pisah[0].length % 3;
            var rupiah = pisah[0].substr(0, sisa);
            var ribuan = pisah[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                var separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = pisah[1] != undefined ? rupiah + ',' + pisah[1] : rupiah;
            objek.value = 'Rp ' + rupiah;
        }
    </script>
</body>
</html>
