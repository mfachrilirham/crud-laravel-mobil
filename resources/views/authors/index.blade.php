@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between mb-3">
    <h3>Data Penjual</h3>
    <form action="{{ url('/authors') }}" method="GET" class="d-flex align-items-center">
        <div class="form-group mb-0 mr-2">
            <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
        </div>
        <button type="submit" class="btn btn-outline-primary">Search</button>
    </form>
    <a href="{{ url('/authors/create') }}" class="btn btn-success">Tambah Penjual</a>
</div>


    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($authors as $author)
                <tr>
                    <td>{{ $author->id }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->email }}</td>
                    <td>{{ $author->phone_number }}</td>
                    <td>{{ $author->address }}</td>
                    <td>
                        <a href="{{ url('/authors/' . $author->id) }}" class="btn btn-dark">Show</a>
                        <a href="{{ url('/authors/' . $author->id . '/edit') }}" class="btn btn-warning">Edit</a>
                        <form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus?');"
                            action="{{ url('/authors/' . $author->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <div class="alert alert-danger">
                    Data Penjual Belum Tersedia.
                </div>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $authors->links() }}
    </div>
@endsection
