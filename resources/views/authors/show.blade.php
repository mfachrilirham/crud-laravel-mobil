@extends('layouts.app')

@section('content')
    <h1>Detail Penjual</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $author->name }}</h5>
            <p class="card-text">Email: {{ $author->email }}</p>
            <p class="card-text">Nomor Telepon: {{ $author->phone_number }}</p>
            <p class="card-text">Alamat: {{ $author->address }}</p>
            <a href="{{ url('/authors') }}" class="btn btn-dark">Kembali</a>
        </div>
    </div>
@endsection
