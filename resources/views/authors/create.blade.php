@extends('layouts.app')

@section('content')
    <h1>Tambah Penjual</h1>

    <form action="{{ url('/authors') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name') }}">
            @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{ old('email') }}">
            @error('email')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone_number">Nomor Telepon</label>
            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                name="phone_number" value="{{ old('phone_number') }}">
            @error('phone_number')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">Alamat</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                value="{{ old('address') }}">
            @error('address')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ url('/authors') }}" class="btn btn-dark">Kembali</a>
    </form>
@endsection
