@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h3>Data Mobil</h3>
        <form  action="{{ url('/mobils') }}" method="GET" class="d-flex align-items-center">
            <div class="form-group mb-0 mr-2">
                <input type="text" name="search" class="form-control" placeholder="Search..." value="{{ request('search') }}">
            </div>
            <button type="submit" class="btn btn-outline-primary">Search</button>
        </form>
        <a href="{{ url('/mobils/create') }}" class="btn btn-success">Tambah Mobil</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Merek</th>
                <th>Warna</th>
                <th>Tahun</th>
                <th>Penjual</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($mobils as $mobil)
                <tr>
                    <td>{{ $mobil->id }}</td>
                    <td>{{ $mobil->merek }}</td>
                    <td>{{ $mobil->warna }}</td>
                    <td>{{ $mobil->tahun }}</td>
                    <td>{{ $mobil->author->name }}</td>
                    <td>
                        <a href="{{ url('/mobils/' . $mobil->id) }}" class="btn btn-dark">Show</a>
                        <a href="{{ url('/mobils/' . $mobil->id . '/edit') }}" class="btn btn-warning">Edit</a>
                        <form onsubmit="return confirm('Apakah Anda Yakin Ingin Menghapus?');" action="{{ url('/mobils/' . $mobil->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
            <div class="alert alert-danger">
                Data Mobil Belum Tersedia.
            </div>
            @endforelse
        </tbody>
    </table>
    <div class="d-flex justify-content-center">
        {{ $mobils->links() }}
    </div>
@endsection
