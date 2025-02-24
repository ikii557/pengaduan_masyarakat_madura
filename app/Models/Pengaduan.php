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

    protected $table = 'pengaduans';

    protected $fillable = [
        'masyarakat_id',
        'kategori_id',
        'tanggal_pengaduan',
        'isi_pengaduan',
        'foto',
        'status',
    ];
    protected $casts = [
        'tanggal_pengaduan' => 'date',
    ];


    // Relasi ke model Masyarakat
            // Relasi ke model Masyarakat
            public function masyarakat()
            {
                return $this->belongsTo(Petugas::class, 'masyarakat_id');
            }


        // Relasi ke model Petugas melalui tanggapan
        public function petugas()
{
    return $this->belongsTo(Petugas::class, 'petugas_id');
}



    // Relasi ke model Kategori
    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }

    // Relasi ke model Tanggapan
// Relasi ke model Tanggapan
    // Model Pengaduan.php
    // App\Models\Pengaduan.php

public function tanggapans()  // Perhatikan nama method pakai plural (bentuk jamak)
{
    return $this->hasMany(Tanggapan::class, 'pengaduan_id');
}






}
