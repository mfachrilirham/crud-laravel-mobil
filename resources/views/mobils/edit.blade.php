@extends('layouts.app')

@section('content')
    <h1>Edit Mobil</h1>

    <form action="{{ url('/mobils/' . $mobil->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="merek">Merek</label>
            <input type="text" class="form-control @error('merek') is-invalid @enderror" id="merek" name="merek" value="{{ old('merek', $mobil->merek) }}" >
            @error('merek')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="warna">Warna</label>
            <input type="text" class="form-control @error('warna') is-invalid @enderror" id="warna" name="warna" value="{{ old('warna', $mobil->warna) }}" >
            @error('warna')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="tahun">Tahun</label>
            <input type="number" class="form-control @error('tahun') is-invalid @enderror" id="tahun" name="tahun" value="{{ old('tahun', $mobil->tahun) }}" >
            @error('tahun')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="author_id">Penjual</label>
            <select class="form-control @error('author_id') is-invalid @enderror" id="author_id" name="author_id" >
                @foreach($authors as $author)
                    <option value="{{ $author->id }}" {{ old('author_id', $mobil->author_id) == $author->id ? 'selected' : '' }}>{{ $author->name }}</option>
                @endforeach
            </select>
            @error('author_id')
                <div class="alert alert-danger mt-2">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ url('/mobils') }}" class="btn btn-dark">Kembali</a>
    </form>
@endsection
