@extends('layouts.app')

@section('content')
    <h1>Edit Penjual</h1>

    <form action="{{ url('/authors/' . $author->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
                value="{{ old('name', $author->name) }}">
            @error('name')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{ old('email', $author->email) }}">
            @error('email')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="phone_number">Nomor Telepon</label>
            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number"
                name="phone_number" value="{{ old('phone_number', $author->phone_number) }}">
            @error('phone_number')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="address">Alamat</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address"
                value="{{ old('address', $author->address) }}">
            @error('address')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ url('/authors') }}" class="btn btn-dark">Kembali</a>
    </form>
@endsection
