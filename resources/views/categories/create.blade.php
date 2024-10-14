@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col-lg-12">
            <h2>Tambah Kategori Baru</h2>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> Ada beberapa masalah dengan inputanmu.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <strong>Nama Kategori:</strong>
            <input type="text" name="nama_kategori" class="form-control" placeholder="Nama Kategori" value="{{ old('nama_kategori') }}">
        </div>

        <div class="mt-3">
            <a class="btn btn-secondary" href="{{ route('categories.index') }}"> Kembali</a>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
    </form>
@endsection
