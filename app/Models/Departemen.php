<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jabatan;

class Departemen extends Model
{
    use HasFactory;

    protected $table = 'departemens';

    protected $fillable = [
        'nama_departemen'
    ];

    /**
     * Relasi ke jabatan
     */
    public function jabatan()
    {
        return $this->hasMany(Jabatan::class);
    }
}