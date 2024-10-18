<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;
use App\Http\Requests\UserRequest;

class UserController extends Controller {
    public $userModel;
    public $kelasModel;
    
    public function __construct() {
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index() {
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];

        return view('list_user', $data);
    }

    public function profile($nama = "", $kelas = "", $npm = "") {
        $data = [
            'nama' => $nama,
            'kelas' => $kelas,
            'npm' => $npm
        ];

        return view('profile', $data);
    }

    public function create() {
        $kelasModel = new Kelas();
        $kelas = $kelasModel->getKelas();

        $data = [
            'title' => 'Create User',
            'kelas' => $kelas,
        ];

        return view('create_user', $data);
    }

    public function store(UserRequest $request) {
        $request->validate([
            'nama' => 'required|string|max:255',
            'npm' => 'required|string|max:255',
            'kelas_id' => 'required|integer',
            'foto' => 'nullable|image|mimes:jpeg, png, jpg, gif, svg|max:2048',
        ]);

        if($request->hasFile('foto')) {
            $foto = $request->file('foto');
            $fotoName = $foto->hashName();
            $fotoPath = $foto->move(('upload/img'), $fotoName);
            
            // Ensure the path uses forward slashes
            $fotoPath = str_replace('\\', '/', $fotoPath);
        } else {
            $fotoPath = null;
        }
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'npm' => $request->input('npm'),
            'kelas_id' => $request->input('kelas_id'),
            'foto' => $fotoPath,
        ]);
        return redirect()->to('/user')->with('success', 'User berhasil ditambahkan');
    }

    public function show($id)
    {
        // Mengambil data user berdasarkan ID
        $user = $this->userModel->getUser($id);
    
        // Mengambil data kelas user (misalnya relasi user ke kelas)
        $kelas = $user->kelas;
    
        // Judul halaman
        $title = 'Detail ' . $user->nama;
    
        // Mengirim data ke view 'show'
        return view('profile', compact('user', 'kelas', 'title'));
    }
    
    

    public function edit($id)
   {
    // Mencari data user berdasarkan ID, jika tidak ditemukan maka akan throw error 404
    $user = UserModel::findOrFail($id);

    $kelas = Kelas::all();

    $title = 'Edit User';

    // Mengirim data ke view edit_user
    return view('edit_user', compact('user', 'kelas', 'title'));
   }

   public function update(Request $request, $id) {
    $user = UserModel::findOrFail($id);
    $user->nama = $request->input('nama');
    $user->npm = $request->input('npm');
    $user->kelas_id = $request->input('kelas_id');

    // Logika untuk update foto
    if($request->hasFile('foto')) {
        $file = $request->file('foto');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('upload/img'), $filename);
        $user->foto = $filename;
    }

    $user->save();
    return redirect()->to('/user')->with('success', 'User berhasil diupdate');
}

    public function destroy($id) {
        $user = UserModel::findOrFail($id);
        $user->delete();
        return redirect()->to('/user')->with('success', 'User berhasil dihapus');
     }

    }




