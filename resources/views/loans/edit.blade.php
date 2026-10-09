@extends('layouts.app')

@section('title', 'Edit Peminjaman')

@section('content')
    <h1>Edit Peminjaman</h1>

    <p><a href="{{ route('loans.index') }}">&larr; Kembali ke daftar peminjaman</a></p>

    <p><strong>Anggota:</strong> {{ $loan['member']['nama'] }} ({{ $loan['member']['nim'] }})</p>
    <p>
        <strong>Buku:</strong>
        @foreach ($loan['loanItems'] as $item)
            {{ $item['book']['judul'] }}@if (!$loop->last), @endif
        @endforeach
    </p>

    <form action="{{ route('loans.update', $loan['id']) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="tanggal_kembali">Tanggal Kembali</label><br>
            <input
                type="date"
                name="tanggal_kembali"
                id="tanggal_kembali"
                value="{{ old('tanggal_kembali', $loan['tanggal_kembali']) }}"
                required
            >
            @error('tanggal_kembali')
                <div class="alert-error">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <div>
            <label for="status">Status</label><br>
            <select name="status" id="status" required>
                <option value="dipinjam" @selected(old('status', $loan['status']) === 'dipinjam')>Dipinjam</option>
                <option value="dikembalikan" @selected(old('status', $loan['status']) === 'dikembalikan')>Dikembalikan</option>
                <option value="terlambat" @selected(old('status', $loan['status']) === 'terlambat')>Terlambat</option>
            </select>
            @error('status')
                <div class="alert-error">{{ $message }}</div>
            @enderror
        </div>

        <br>

        <button type="submit" class="btn">Perbarui</button>
    </form>
@endsection
