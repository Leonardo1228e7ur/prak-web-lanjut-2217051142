@extends('layouts.app')

@section('title', $title)

@section('content')
<div class="container">
    <h1>{{ $title }}</h1>

    <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $user->nama) }}">
        </div>

        <div class="form-group">
            <label for="npm">NPM</label>
            <input type="text" name="npm" id="npm" class="form-control" value="{{ old('npm', $user->npm) }}">
        </div>

        <div class="form-group">
            <label for="kelas_id">Kelas</label>
            <select name="kelas_id" id="kelas_id" class="form-control">
                @foreach($kelas as $k)
                    <option value="{{ $k->id }}" {{ $user->kelas_id == $k->id ? 'selected' : '' }}>
                        {{ $k->nama_kelas }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="foto">Foto</label>
            <input type="file" name="foto" id="foto" class="form-control">
            <img src="{{ asset('upload/img/' . $user->foto) }}" alt="Foto User" width="100">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
