<?php

namespace App\Models;

use App\Models\Tanggapan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Petugas extends Model
{
    use HasFactory;

    /**
     * Kolom-kolom yang dapat diisi (mass assignable).
     */
    protected $table='users';
    protected $fillable = [
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'username',
        'password',
        'no_telepon',
        'alamat',
        'role',
    ];

    /**
     * Kolom yang disembunyikan dari array atau JSON.
     */
    protected $hidden = [
        'password',
    ];
    public function tanggapans()
    {
        return $this->hasMany(Tanggapan::class, );
    }
    public function pengaduans(){
        return $this->hasMany(Pengaduan::class,);
    }
}
