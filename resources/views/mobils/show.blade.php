@extends('layouts.app')

@section('content')
    <h1>Detail Mobil</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $mobil->merek }}</h5>
            <p class="card-text">Warna: {{ $mobil->warna }}</p>
            <p class="card-text">Tahun: {{ $mobil->tahun }}</p>
            <p class="card-text">Penjual: {{ $mobil->author->name }}</p>
            <a href="{{ url('/mobils') }}" class="btn btn-dark">Kembali</a>
        </div>
    </div>
@endsection
