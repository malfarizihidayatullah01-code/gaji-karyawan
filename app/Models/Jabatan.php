<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    // Nama tabel
    protected $table = 'jabatans';

    // Field yang boleh diisi
    protected $fillable = [
        'departemen_id',
        'nama_jabatan',
        'gaji_pokok',
        'tunjangan'
    ];

    /**
     * Relasi ke departemen
     */
    public function departemen()
    {
        return $this->belongsTo(Departemen::class);
    }
}