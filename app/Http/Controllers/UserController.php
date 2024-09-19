<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Fungsi create
  
    public function create(){ 
        return view('create_user'); 
        }

    // Fungsi profile
    public function profile()
    {
        // Tampilkan view profile
        return view('profile'); // Pastikan view 'user/profile.blade.php' ada
    }
    public function store(Request $request) 
    { 
        $data = [ 
            'nama' => $request->input('nama'), 
            'kelas' => $request->input('kelas'), 
            'npm' => $request->input('npm'), 
            ];

            return view('profile', $data);
    }
}
