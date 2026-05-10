<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Import model
use App\Models\Karyawan;

class Absensi extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'absensis';

    // Field yang boleh diisi
    protected $fillable = [
        'karyawan_id',
        'tanggal',
        'status',
        'jam_masuk',
        'jam_keluar',
        'keterangan'
    ];

    /**
     * Relasi ke karyawan
     */
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}