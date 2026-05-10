<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// Import model
use App\Models\Jabatan;
use App\Models\Absensi;
use App\Models\Penggajian;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans';

    protected $fillable = [

        'nama_karyawan',
        'jabatan_id',
        'jenis_kelamin',
        'email',
        'no_hp',
        'alamat',
        'tanggal_masuk'
    ];

    /**
     * Relasi ke jabatan
     */
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    /**
     * Relasi ke absensi
     */
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }

    /**
     * Relasi ke penggajian
     */
    public function penggajian()
    {
        return $this->hasMany(Penggajian::class);
    }
}