@extends('layouts.app')

@section('title', 'Tambah Kategori')

@section('content')

    <h1>Tambah Kategori</h1>

    <p>
        <a href="{{ route('categories.index') }}">← Kembali ke Daftar Kategori</a>
    </p>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div>
            <label for="nama_kategori">Nama Kategori</label><br>
            <input
                type="text"
                id="nama_kategori"
                name="nama_kategori"
                value="{{ old('nama_kategori') }}"
            >

            @error('nama_kategori')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="deskripsi">Deskripsi</label><br>
            <textarea
                id="deskripsi"
                name="deskripsi"
                rows="4"
            >{{ old('deskripsi') }}</textarea>

            @error('deskripsi')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <button type="submit" class="btn">
            Simpan Kategori
        </button>
    </form>

@endsection