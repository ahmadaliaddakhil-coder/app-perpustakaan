@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')
    <h1>Tambah Peminjaman</h1>

    <p><a href="{{ route('loans.index') }}">&larr; Kembali ke daftar peminjaman</a></p>

    <form action="{{ route('loans.store') }}" method="POST">
        @csrf

        <div>
            <label for="member_id">Anggota</label><br>
            <select name="member_id" id="member_id" required>
                <option value="">-- Pilih Anggota --</option>
                @foreach ($members as $member)
                    <option value="{{ $member['id'] }}" @selected(old('member_id') == $member['id'])>
                        {{ $member['nama'] }} ({{ $member['nim'] }})
                    </option>
                @endforeach
            </select>
            @error('member_id')
                <div class="alert-error">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="user_id">Petugas</label><br>
            <select name="user_id" id="user_id" required>
                <option value="">-- Pilih Petugas --</option>
                @foreach ($users as $user)
                    <option value="{{ $user['id'] }}" @selected(old('user_id') == $user['id'])>
                        {{ $user['name'] }}
                    </option>
                @endforeach
            </select>
            @error('user_id')
                <div class="alert-error">{{ $message }}</div>
            @enderror
            <p><em>Petugas dipilih manual karena fitur login dibahas pada Pertemuan 8.</em></p>
        </div>

        <div>
            <label for="tanggal_pinjam">Tanggal Pinjam</label><br>
            <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" value="{{ old('tanggal_pinjam') }}" required>
            @error('tanggal_pinjam')
                <div class="alert-error">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="tanggal_kembali">Tanggal Kembali</label><br>
            <input type="date" name="tanggal_kembali" id="tanggal_kembali" value="{{ old('tanggal_kembali') }}" required>
            @error('tanggal_kembali')
                <div class="alert-error">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <strong>Buku yang Dipinjam</strong>
            <div>
                @forelse ($books as $book)
                    <label>
                        <input
                            type="checkbox"
                            name="book_ids[]"
                            value="{{ $book['id'] }}"
                            @checked(in_array($book['id'], old('book_ids', [])))
                        >
                        {{ $book['judul'] }} (stok: {{ $book['stok'] }})
                    </label><br>
                @empty
                    <p>Belum ada data buku.</p>
                @endforelse
            </div>
            @error('book_ids')
                <div class="alert-error">{{ $message }}</div>
            @enderror
            @error('book_ids.*')
                <div class="alert-error">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <button type="submit" class="btn">Simpan</button>
    </form>
@endsection
