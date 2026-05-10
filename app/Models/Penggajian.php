<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Import model
use App\Models\Karyawan;

class Penggajian extends Model
{
    use HasFactory;

    /**
     * Nama tabel
     */
    protected $table = 'penggajians';

    /**
     * Field yang boleh diisi
     */
    protected $fillable = [

        'karyawan_id',

        'bulan',

        'jam_lembur',

        'uang_lembur',

        'potongan',

        'total_gaji'
    ];

    /**
     * Relasi ke karyawan
     */
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }
}