<?php

namespace App\Models;

use App\Models\Pengaduan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;

    /**
     * Kolom-kolom yang dapat diisi (mass assignable).
     */
    protected $table = 'kategoris';
    protected $fillable = [
        'nama_kategori',
        'deskripsi',
    ];

    /**
     * Relasi ke model Pengaduan.
     */
    public function pengaduans()
    {
        return $this->hasMany(Pengaduan::class, 'kategori_id');
    }
}
