<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import model
use App\Models\Jabatan;
use App\Models\Departemen;

class JabatanController extends Controller
{
    /**
     * Menampilkan semua data jabatan
     */
    public function index()
    {
        // Ambil semua data jabatan + relasi departemen
        $jabatans = Jabatan::with('departemen')->get();

        // Kirim ke view
        return view('jabatan.index', compact('jabatans'));
    }

    /**
     * Menampilkan form tambah
     */
    public function create()
    {
        // Ambil data departemen
        $departemens = Departemen::all();

        // Kirim ke view
        return view('jabatan.create', compact('departemens'));
    }

    /**
     * Simpan data baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'departemen_id' => 'required',
            'nama_jabatan' => 'required',
            'gaji_pokok' => 'required',
            'tunjangan' => 'required'
        ]);

        // Simpan data
        Jabatan::create([
            'departemen_id' => $request->departemen_id,
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan
        ]);

        // Redirect
        return redirect('/jabatan')
                ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Form edit
     */
    public function edit($id)
    {
        // Cari data jabatan
        $jabatan = Jabatan::findOrFail($id);

        // Ambil semua departemen
        $departemens = Departemen::all();

        // Kirim ke view
        return view('jabatan.edit', compact(
            'jabatan',
            'departemens'
        ));
    }

    /**
     * Update data
     */
    public function update(Request $request, $id)
    {
        // Validasi
        $request->validate([
            'departemen_id' => 'required',
            'nama_jabatan' => 'required',
            'gaji_pokok' => 'required',
            'tunjangan' => 'required'
        ]);

        // Cari data
        $jabatan = Jabatan::findOrFail($id);

        // Update data
        $jabatan->update([
            'departemen_id' => $request->departemen_id,
            'nama_jabatan' => $request->nama_jabatan,
            'gaji_pokok' => $request->gaji_pokok,
            'tunjangan' => $request->tunjangan
        ]);

        // Redirect
        return redirect('/jabatan')
                ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Hapus data
     */
    public function destroy($id)
    {
        // Cari data
        $jabatan = Jabatan::findOrFail($id);

        // Hapus data
        $jabatan->delete();

        // Redirect
        return redirect('/jabatan')
                ->with('success', 'Data berhasil dihapus');
    }
}