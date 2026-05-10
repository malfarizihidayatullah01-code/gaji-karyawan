<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import model
use App\Models\Absensi;
use App\Models\Karyawan;

class AbsensiController extends Controller
{
    /**
     * Menampilkan semua data absensi
     */
    public function index()
    {
        // Ambil semua data absensi + relasi karyawan
        $absensis = Absensi::with(
            'karyawan.jabatan.departemen'
        )->get();

        // Kirim ke view
        return view('absensi.index', compact('absensis'));
    }

    /**
     * Menampilkan form tambah
     */
    public function create()
    {
        // Ambil semua data karyawan
        $karyawans = Karyawan::all();

        // Kirim ke view
        return view('absensi.create', compact('karyawans'));
    }

    /**
     * Menyimpan data baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'karyawan_id' => 'required',
            'tanggal' => 'required',
            'status' => 'required'
        ]);

        // Simpan data
        Absensi::create([
            'karyawan_id' => $request->karyawan_id,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
            'keterangan' => $request->keterangan
        ]);

        // Redirect
        return redirect('/absensi')
                ->with('success', 'Data absensi berhasil ditambahkan');
    }

    /**
     * Form edit
     */
    public function edit($id)
    {
        // Cari data absensi
        $absensi = Absensi::findOrFail($id);

        // Ambil semua karyawan
        $karyawans = Karyawan::all();

        // Kirim ke view
        return view('absensi.edit', compact(
            'absensi',
            'karyawans'
        ));
    }

    /**
     * Update data
     */
    public function update(Request $request, $id)
    {
        // Validasi
        $request->validate([
            'karyawan_id' => 'required',
            'tanggal' => 'required',
            'status' => 'required'
        ]);

        // Cari data
        $absensi = Absensi::findOrFail($id);

        // Update data
        $absensi->update([
            'karyawan_id' => $request->karyawan_id,
            'tanggal' => $request->tanggal,
            'status' => $request->status,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
            'keterangan' => $request->keterangan
        ]);

        // Redirect
        return redirect('/absensi')
                ->with('success', 'Data absensi berhasil diupdate');
    }

    /**
     * Hapus data
     */
    public function destroy($id)
    {
        // Cari data
        $absensi = Absensi::findOrFail($id);

        // Hapus data
        $absensi->delete();

        // Redirect
        return redirect('/absensi')
                ->with('success', 'Data absensi berhasil dihapus');
    }
}