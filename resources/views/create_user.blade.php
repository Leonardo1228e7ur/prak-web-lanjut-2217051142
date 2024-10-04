
@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('assets/css/create.css') }}">
<div>
    
    <!-- Form Create User -->
    <form action="{{ url('/user/store') }}" method="POST">
        @csrf <!-- Token CSRF untuk keamanan form Laravel -->

        <!-- Input Nama -->
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required>
        <!-- Tampilkan pesan error jika validasi nama gagal -->
        @error('nama')
            <div class="error">{{ $message }}</div> <!-- Menampilkan error nama -->
        @enderror
        <br>

        <!-- Input NPM -->
        <label for="npm">NPM:</label>
        <input type="text" name="npm" id="npm" value="{{ old('npm') }}" required>
        <!-- Tampilkan pesan error jika validasi NPM gagal -->
        @error('npm')
            <div class="error">{{ $message }}</div> <!-- Menampilkan error npm -->
        @enderror
        <br>

        <!-- Pilih Kelas -->
        <label for="kelas_id">Kelas:</label><br>
        <select name="kelas_id" id="kelas_id" required>
            <option value="">Pilih Kelas</option>
            @foreach($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}" {{ old('kelas_id') == $kelasItem->id ? 'selected' : '' }}>
                    {{ $kelasItem->nama_kelas }}
                </option>
            @endforeach
        </select>
        <!-- Tampilkan pesan error jika validasi kelas gagal -->
        @error('kelas_id')
            <div class="error">{{ $message }}</div> <!-- Menampilkan error kelas -->
        @enderror
        <br>

        <!-- Tombol Submit -->
        <button type="submit">Submit</button>

    </form>
</div>
@endsection


