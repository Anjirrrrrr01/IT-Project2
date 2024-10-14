@extends('layouts.app')

@section('content')
    <div class="row mb-3">
        <div class="col-lg-12">
            <h2>Edit Kategori</h2>
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

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <strong>Nama Kategori:</strong>
            <input type="text" name="nama_kategori" value="{{ $category->nama_kategori }}" class="form-control" placeholder="Nama Kategori">
        </div>

        <div class="mt-3">
            <a class="btn btn-secondary" href="{{ route('categories.index') }}"> Kembali</a>
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
