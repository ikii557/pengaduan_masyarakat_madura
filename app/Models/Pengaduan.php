<?php

namespace App\Models;

use App\Models\Petugas;
use App\Models\Kategori;
use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaduan extends Model
{
    use HasFactory;

    /**
     * Kolom-kolom yang dapat diisi (mass assignable).
     */
    protected $table = 'pengaduans';
    protected $fillable = [
        'masyarakat_id',
        'kategori_id',
        'tanggal_pengaduan',
        'isi_pengaduan',
        'foto',
        'status',
    ];

    /**
     * Relasi ke model Masyarakat.
     */
    public function masyarakat()
    {
        return $this->belongsTo(Petugas::class, 'masyarakat_id');
    }

    /**
     * Relasi ke model Kategori.
     */
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    /**
     * Relasi ke model Tanggapan.
     */
    public function tanggapans()
    {
        return $this->hasMany(Tanggapan::class, 'pengaduan_id');
    }
}
