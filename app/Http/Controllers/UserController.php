<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas; // Import model Kelas
use App\Models\UserModel; // Import model User

class UserController extends Controller
{
    // Fungsi create
    public function create()
    {
        return view('create_user', [
            'kelas' => Kelas::all(), // Ambil semua data kelas
        ]);
    }

    // Fungsi profile
    public function profile()
    {
        return view('profile');
    }

    // Fungsi store untuk menyimpan data user
    public function store(Request $request)
    {
        // Validasi data inputan
        $validatedData = $request->validate([
            'nama' => 'required|string|regex:/^[a-zA-Z\s]+$/|max:255',
            'npm' => 'required|string|max:255|unique:user,npm',
            'kelas_id' => 'required|exists:kelas,id',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.regex' => 'Nama hanya boleh berisi huruf dan spasi.',
            'npm.required' => 'NPM wajib diisi.',
            'npm.unique' => 'NPM ini sudah terdaftar. Silakan gunakan NPM lain.',
            'kelas_id.required' => 'Kelas wajib dipilih.',
            'kelas_id.exists' => 'Kelas yang dipilih tidak valid.',
        ]);

        // Simpan data user ke database
        $user = UserModel::create($validatedData);

        // Muat relasi kelas
        $user->load('kelas');

        // Tampilkan data ke halaman profile
        return view('profile', [
            'nama' => $user->nama,
            'npm' => $user->npm,
            'nama_kelas' => $user->kelas->nama_kelas ?? 'kelas tidak ditemukan',
        ]);
    }
}
