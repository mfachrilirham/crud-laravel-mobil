@extends('layouts.app')

@section('content')
    <h3>Tambah Mobil</h3>

    <form action="{{ url('/mobils') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="merek">Merek</label>
            <input type="text" class="form-control  @error('merek') is-invalid @enderror" id="merek" name="merek" value="{{ old('merek') }}">
            @error('merek')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="warna">Warna</label>
            <input type="text" class="form-control  @error('warna') is-invalid @enderror" id="warna" name="warna" value="{{ old('warna') }}">
            @error('warna')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for=tahun>Tahun</label>
            <input type="number" class="form-control  @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ old('tahun') }}">
            @error('tahun')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="author_id">Penjual</label>
            <select class="form-control  @error('author_id') is-invalid @enderror" id="author_id" name="author_id">
                @foreach($authors as $author)
                    <option value="{{ $author->id }}">{{ $author->name }}</option>
                @endforeach
            </select>
            @error('author_id')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ url('/mobils') }}" class="btn btn-dark">Kembali</a>
    </form>
@endsection
