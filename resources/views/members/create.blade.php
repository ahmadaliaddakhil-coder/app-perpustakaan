<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Anggota</title>

    <style>
        body {
            font-family: sans-serif;
            margin: 40px;
            max-width: 600px;
        }

        label {
            display: block;
            margin-top: 12px;
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 6px;
            margin-top: 4px;
            box-sizing: border-box;
        }

        textarea {
            min-height: 80px;
        }

        .error {
            color: #b91c1c;
            font-size: 14px;
            margin-top: 4px;
        }

        .btn {
            margin-top: 20px;
            padding: 8px 16px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
    </style>
</head>

<body>

    <h1>Tambah Anggota</h1>

    <p>
        <a href="{{ route('members.index') }}">
            &larr; Kembali ke daftar anggota
        </a>
    </p>

    <form action="{{ route('members.store') }}" method="POST">

        @csrf

        {{-- Nama --}}
        <label for="nama">
            Nama Anggota
        </label>

        <input
            type="text"
            name="nama"
            id="nama"
            value="{{ old('nama') }}"
        >

        @error('nama')
            <div class="error">
                {{ $message }}
            </div>
        @enderror


        {{-- NIM --}}
        <label for="nim">
            NIM
        </label>

        <input
            type="text"
            name="nim"
            id="nim"
            value="{{ old('nim') }}"
        >

        @error('nim')
            <div class="error">
                {{ $message }}
            </div>
        @enderror


        {{-- Email --}}
        <label for="email">
            Email
        </label>

        <input
            type="email"
            name="email"
            id="email"
            value="{{ old('email') }}"
        >

        @error('email')
            <div class="error">
                {{ $message }}
            </div>
        @enderror


        {{-- Nomor Telepon --}}
        <label for="nomor_telepon">
            Nomor Telepon
        </label>

        <input
            type="text"
            name="nomor_telepon"
            id="nomor_telepon"
            value="{{ old('nomor_telepon') }}"
        >

        @error('nomor_telepon')
            <div class="error">
                {{ $message }}
            </div>
        @enderror


        {{-- Alamat --}}
        <label for="alamat">
            Alamat
        </label>

        <textarea
            name="alamat"
            id="alamat"
        >{{ old('alamat') }}</textarea>

        @error('alamat')
            <div class="error">
                {{ $message }}
            </div>
        @enderror


        {{-- Status --}}
        <label for="status">
            Status
        </label>

        <select name="status" id="status">

            <option value="">
                -- Pilih Status --
            </option>

            <option
                value="Aktif"
                @selected(old('status') == 'Aktif')
            >
                Aktif
            </option>

            <option
                value="Nonaktif"
                @selected(old('status') == 'Nonaktif')
            >
                Nonaktif
            </option>

        </select>

        @error('status')
            <div class="error">
                {{ $message }}
            </div>
        @enderror


        <button type="submit" class="btn">
            Simpan
        </button>

    </form>

</body>

</html>