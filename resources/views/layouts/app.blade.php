<!DOCTYPE html>
<html>
<head>
    <title>Manajemen Kategori</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">My Website</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/IT">Kelola Produk</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">Kelola kasir</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="categories.index">kelola kategori</a>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5">
        @yield('content')
    </div>
</body>
</html>
