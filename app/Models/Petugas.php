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
    protected $table = 'petugass';
    protected $fillable = [
        'nama_petugas',
        'username',
        'password',
        'no_hp',
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
}
