@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Daftar Kategori</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('categories.create') }}"> Tambah Kategori</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success mt-2">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered mt-2">
        <tr>
            <th>No</th>
            <th>Nama Kategori</th>
            <th width="280px">Aksi</th>
        </tr>
        @foreach ($categories as $category)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $category->nama_kategori }}</td>
            <td>
                <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">Delete</button>
                </form>
                <a class="btn btn-primary btn-sm" href="{{ route('categories.edit', $category->id) }}">Edit</a>
                <a class="btn btn-info btn-sm" href="{{ route('categories.show', $category->id) }}">Show</a>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $categories->links() !!}
@endsection
