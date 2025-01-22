<?php

namespace App\Models;

use App\Models\Pengaduan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Masyarakat extends Model
{
    use HasFactory;

    /**
     * Kolom-kolom yang dapat diisi (mass assignable).
     */
    protected $table = 'masyarakats';
    protected $fillable = [
        'nik',
        'nama_lengkap',
        'jenis_kelamin',
        'username',
        'password',
        'no_telepon',
        'alamat',
    ];

    /**
     * Kolom yang disembunyikan dari array atau JSON.
     */
    protected $hidden = [
        'password',
    ];

    /**
     * Relasi ke model Pengaduan.
     */
    public function pengaduans()
    {
        return $this->hasMany(Pengaduan::class, 'masyarakat_id');
    }
}
