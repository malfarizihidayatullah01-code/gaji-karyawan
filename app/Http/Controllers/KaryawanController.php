<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import model
use App\Models\Karyawan;
use App\Models\Jabatan;

class KaryawanController extends Controller
{
    /**
     * Menampilkan semua data karyawan
     */
    public function index()
    {
        // Ambil semua data karyawan + relasi jabatan & departemen
        $karyawans = Karyawan::with(
            'jabatan.departemen'
        )->get();

        // Kirim ke view
        return view('karyawan.index', compact('karyawans'));
    }

    /**
     * Menampilkan form tambah
     */
    public function create()
    {
        // Ambil semua jabatan
        $jabatans = Jabatan::all();

        // Kirim ke view
        return view('karyawan.create', compact('jabatans'));
    }

    /**
     * Menyimpan data baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_karyawan' => 'required',
            'jabatan_id' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'tanggal_masuk' => 'required'
        ]);

        // Simpan data
        Karyawan::create([
            'nama_karyawan' => $request->nama_karyawan,
            'jabatan_id' => $request->jabatan_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'tanggal_masuk' => $request->tanggal_masuk
        ]);

        // Redirect
        return redirect('/karyawan')
                ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Menampilkan form edit
     */
    public function edit($id)
    {
        // Cari data karyawan
        $karyawan = Karyawan::findOrFail($id);

        // Ambil semua jabatan
        $jabatans = Jabatan::all();

        // Kirim ke view
        return view('karyawan.edit', compact(
            'karyawan',
            'jabatans'
        ));
    }

    /**
     * Update data
     */
    public function update(Request $request, $id)
    {
        // Validasi
        $request->validate([
            'nama_karyawan' => 'required',
            'jabatan_id' => 'required',
            'jenis_kelamin' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'alamat' => 'required',
            'tanggal_masuk' => 'required'
        ]);

        // Cari data
        $karyawan = Karyawan::findOrFail($id);

        // Update data
        $karyawan->update([
            'nama_karyawan' => $request->nama_karyawan,
            'jabatan_id' => $request->jabatan_id,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'tanggal_masuk' => $request->tanggal_masuk
        ]);

        // Redirect
        return redirect('/karyawan')
                ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Hapus data
     */
    public function destroy($id)
    {
        // Cari data
        $karyawan = Karyawan::findOrFail($id);

        // Hapus data
        $karyawan->delete();

        // Redirect
        return redirect('/karyawan')
                ->with('success', 'Data berhasil dihapus');
    }
}