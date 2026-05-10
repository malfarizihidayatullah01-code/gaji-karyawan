<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import model
use App\Models\Karyawan;
use App\Models\Jabatan;
use App\Models\Departemen;
use App\Models\Penggajian;
use App\Models\Absensi;

class DashboardController extends Controller
{
    /**
     * Dashboard
     */
    public function index()
    {
        // Hitung total karyawan
        $total_karyawan =
            Karyawan::count();

        // Hitung total jabatan
        $total_jabatan =
            Jabatan::count();

        // Hitung total departemen
        $total_departemen =
            Departemen::count();

        // Hitung total penggajian
        $total_penggajian =
            Penggajian::sum(
                'total_gaji'
            );

        // Hitung total absensi
        $total_absensi =
            Absensi::count();

        // Kirim ke view
        return view(
            'dashboard.index',
            compact(
                'total_karyawan',
                'total_jabatan',
                'total_departemen',
                'total_penggajian',
                'total_absensi'
            )
        );
    }
}