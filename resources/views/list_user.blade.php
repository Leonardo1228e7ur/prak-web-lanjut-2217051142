@extends('layouts.app')

@section('title', 'List Pengguna')

@section('content')
<div class="my-3">
    <a href="{{ route('user.create') }}" class="btn btn-success">Tambah Pengguna Baru</a>
</div>

<div class="container mt-4">
    <h1 class="text-center">List Data Pengguna</h1><br>
    <table class="table table-bordered table-striped">
        <thead class="table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nama</th>
                <th scope="col">NPM</th>
                <th scope="col">Kelas</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td class="text-center">{{ $user->id }}</td>
                <td>{{ $user->nama }}</td>
                <td class="text-center">{{ $user->npm }}</td>
                <td class="text-center">{{ $user->nama_kelas }}</td>
                <td class="text-center">
                    <!-- Tombol Detail -->
                    <a href="{{ route('user.show', $user->id) }}" class="btn btn-info btn-sm">Detail</a>

                    <!-- Tombol Edit -->
                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm">Edit</a>

                    <!-- Tombol Delete -->
                    <form action="{{ route('user.destroy', $user->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
