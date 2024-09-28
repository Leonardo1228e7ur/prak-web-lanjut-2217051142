<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;

    // Definisikan nama tabel sebagai string
    protected $table = 'user'; 

    // Gunakan guarded jika ada field yang tidak boleh diisi sembarangan
    protected $guarded = ['id']; 

    // Definisikan relasi ke model Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
