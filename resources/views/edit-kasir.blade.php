<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Kasir</title>

    <link rel="stylesheet" href="{{ asset('css/edit-post.css') }}">

    <!-- Menghubungkan Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h1 class="text-center mb-4">Edit Kasir</h1>

                <!-- Form Edit Kasir -->
                <div class="card">
                    <div class="card-body">
                        <form action="/edit-kasir/{{ $kasir->id }}" method="POST">

                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Kasir</label>
                                <input type="text" name="nama" class="form-control" value="{{ $kasir->nama }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="nomor telpon" class="form-label">No Telepon</label>
                                <input type="number" name="no_telp" class="form-control" value="{{ $kasir->no_telp }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="text" name="alamat" class="form-control" value="{{ $kasir->alamat }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="tgl_lahir" class="form-control" value="{{ $kasir->tgl_lahir }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" class="form-control" value="{{ $kasir->tempat_lahir }}" required>
                            </div>

                            <button type="submit" class="btn btn-success w-100">Save Changes</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Menghubungkan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
