<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departemen;

class DepartemenController extends Controller
{
    /**
     * Menampilkan semua data
     */
    public function index()
    {
        // Ambil semua data departemen
        $departemens = Departemen::all();

        // Kirim ke view
        return view('departemen.index', compact('departemens'));
    }

    /**
     * Menampilkan form tambah
     */
    public function create()
    {
        return view('departemen.create');
    }

    /**
     * Menyimpan data baru
     */
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_departemen' => 'required'
        ]);

        // Simpan data ke database
        Departemen::create([
            'nama_departemen' => $request->nama_departemen
        ]);

        // Redirect kembali
        return redirect('/departemen')
                ->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Menampilkan form edit
     */
    public function edit($id)
    {
        // Cari data berdasarkan id
        $departemen = Departemen::findOrFail($id);

        // Kirim ke view
        return view('departemen.edit', compact('departemen'));
    }

    /**
     * Update data
     */
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'nama_departemen' => 'required'
        ]);

        // Cari data
        $departemen = Departemen::findOrFail($id);

        // Update data
        $departemen->update([
            'nama_departemen' => $request->nama_departemen
        ]);

        // Redirect kembali
        return redirect('/departemen')
                ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Hapus data
     */
    public function destroy($id)
    {
        // Cari data
        $departemen = Departemen::findOrFail($id);

        // Hapus data
        $departemen->delete();

        // Redirect kembali
        return redirect('/departemen')
                ->with('success', 'Data berhasil dihapus');
    }
}