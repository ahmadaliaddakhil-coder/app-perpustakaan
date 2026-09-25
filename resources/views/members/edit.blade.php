@extends('layouts.app')

@section('title', 'Edit Anggota')

@section('content')

    <h1>Edit Anggota</h1>

    <p>
        <a href="{{ route('members.index') }}">← Kembali ke Daftar Anggota</a>
    </p>

    <form action="{{ route('members.update', $member['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="nama">Nama</label><br>
            <input
                type="text"
                id="nama"
                name="nama"
                value="{{ old('nama', $member['nama']) }}"
            >
            @error('nama')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="nim">NIM</label><br>
            <input
                type="text"
                id="nim"
                name="nim"
                value="{{ old('nim', $member['nim']) }}"
            >
            @error('nim')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="email">Email</label><br>
            <input
                type="email"
                id="email"
                name="email"
                value="{{ old('email', $member['email']) }}"
            >
            @error('email')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="nomor_telepon">Nomor Telepon</label><br>
            <input
                type="text"
                id="nomor_telepon"
                name="nomor_telepon"
                value="{{ old('nomor_telepon', $member['nomor_telepon']) }}"
            >
            @error('nomor_telepon')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="alamat">Alamat</label><br>
            <textarea
                id="alamat"
                name="alamat"
                rows="4"
            >{{ old('alamat', $member['alamat']) }}</textarea>
            @error('alamat')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="status">Status</label><br>
            <select id="status" name="status">
                <option value="">-- Pilih Status --</option>
                <option value="aktif" {{ old('status', $member['status']) == 'aktif' ? 'selected' : '' }}>
                    Aktif
                </option>
                <option value="nonaktif" {{ old('status', $member['status']) == 'nonaktif' ? 'selected' : '' }}>
                    Nonaktif
                </option>
            </select>
            @error('status')
                <div style="color: red;">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <button type="submit">Simpan Perubahan</button>
    </form>

@endsection