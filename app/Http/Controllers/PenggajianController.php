<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// Import model
use App\Models\Penggajian;
use App\Models\Karyawan;
use App\Models\Absensi;

class PenggajianController extends Controller
{
    /**
     * Menampilkan data penggajian
     */
    public function index()
    {
        // Ambil data penggajian + relasi
        $penggajians = Penggajian::with(
            'karyawan.jabatan.departemen'
        )->get();

        // Kirim ke view
        return view(
            'penggajian.index',
            compact('penggajians')
        );
    }

    /**
     * Form tambah penggajian
     */
    public function create()
    {
        // Ambil semua data karyawan
        $karyawans = Karyawan::with(
            'jabatan'
        )->get();

        // Kirim ke view
        return view(
            'penggajian.create',
            compact('karyawans')
        );
    }

    /**
     * AJAX ambil data gaji
     */
    public function getGaji($id)
    {
        /**
         * Cari data karyawan
         * beserta jabatan
         */
        $karyawan = Karyawan::with(
            'jabatan'
        )->findOrFail($id);

        /**
         * Hitung alpha
         */
        $alpha = Absensi::where(
                    'karyawan_id',
                    $id
                 )
                 ->where('status', 'Alpha')
                 ->count();

        /**
         * Hitung izin
         */
        $izin = Absensi::where(
                    'karyawan_id',
                    $id
                 )
                 ->where('status', 'Izin')
                 ->count();

        /**
         * Default potongan
         */
        $potongan = 0;

        /**
         * IF ELSE alpha
         */
        if($alpha > 0){

            $potongan +=
                $alpha * 100000;

        }else{

            $potongan += 0;
        }

        /**
         * IF ELSE izin
         */
        if($izin > 0){

            $potongan +=
                $izin * 50000;

        }else{

            $potongan += 0;
        }

        /**
         * Return JSON
         */
        return response()->json([

            'gaji_pokok'
                =>
                $karyawan
                ->jabatan
                ->gaji_pokok,

            'tunjangan'
                =>
                $karyawan
                ->jabatan
                ->tunjangan,

            'potongan'
                =>
                $potongan
        ]);
    }

    /**
     * Simpan data penggajian
     */
    public function store(Request $request)
    {
        // Validasi
        $request->validate([

            'karyawan_id' => 'required',
            'bulan' => 'required',
            'jam_lembur' => 'required'
        ]);

        /**
         * Cari data karyawan
         */
        $karyawan = Karyawan::with(
            'jabatan'
        )->findOrFail($request->karyawan_id);

        /**
         * Ambil gaji pokok
         */
        $gaji_pokok =
            $karyawan->jabatan->gaji_pokok;

        /**
         * Ambil tunjangan
         */
        $tunjangan =
            $karyawan->jabatan->tunjangan;

        /**
         * IF ELSE lembur
         */
        if($request->jam_lembur > 0){

            $uang_lembur =
                $request->jam_lembur * 50000;

        }else{

            $uang_lembur = 0;
        }

        /**
         * Hitung alpha
         */
        $alpha = Absensi::where(
                    'karyawan_id',
                    $request->karyawan_id
                )
                ->where('status', 'Alpha')
                ->count();

        /**
         * Hitung izin
         */
        $izin = Absensi::where(
                    'karyawan_id',
                    $request->karyawan_id
                )
                ->where('status', 'Izin')
                ->count();

        /**
         * Default potongan
         */
        $potongan = 0;

        /**
         * IF ELSE alpha
         */
        if($alpha > 0){

            $potongan +=
                $alpha * 100000;

        }else{

            $potongan += 0;
        }

        /**
         * IF ELSE izin
         */
        if($izin > 0){

            $potongan +=
                $izin * 50000;

        }else{

            $potongan += 0;
        }

        /**
         * Hitung total gaji
         */
        $total_gaji =
            $gaji_pokok
            +
            $tunjangan
            +
            $uang_lembur
            -
            $potongan;

        /**
         * Simpan data
         */
        Penggajian::create([

            'karyawan_id'
                => $request->karyawan_id,

            'bulan'
                => $request->bulan,

            'jam_lembur'
                => $request->jam_lembur,

            'uang_lembur'
                => $uang_lembur,

            'potongan'
                => $potongan,

            'total_gaji'
                => $total_gaji
        ]);

        /**
         * Redirect
         */
        return redirect('/penggajian')
                ->with(
                    'success',
                    'Data penggajian berhasil ditambahkan'
                );
    }

    /**
     * Form edit
     */
    public function edit($id)
    {
        // Cari data
        $penggajian =
            Penggajian::findOrFail($id);

        // Ambil karyawan
        $karyawans = Karyawan::with(
            'jabatan'
        )->get();

        // Kirim ke view
        return view(
            'penggajian.edit',
            compact(
                'penggajian',
                'karyawans'
            )
        );
    }

    /**
     * Update data
     */
    public function update(
        Request $request,
        $id
    )
    {
        // Validasi
        $request->validate([

            'karyawan_id' => 'required',

            'bulan' => 'required',

            'jam_lembur' => 'required'
        ]);

        // Cari data
        $penggajian =
            Penggajian::findOrFail($id);

        // Cari karyawan
        $karyawan = Karyawan::with(
            'jabatan'
        )->findOrFail($request->karyawan_id);

        // Gaji pokok
        $gaji_pokok =
            $karyawan->jabatan->gaji_pokok;

        // Tunjangan
        $tunjangan =
            $karyawan->jabatan->tunjangan;

        /**
         * IF ELSE lembur
         */
        if($request->jam_lembur > 0){

            $uang_lembur =
                $request->jam_lembur * 50000;

        }else{

            $uang_lembur = 0;
        }

        // Hitung alpha
        $alpha = Absensi::where(
                    'karyawan_id',
                    $request->karyawan_id
                )
                ->where('status', 'Alpha')
                ->count();

        // Hitung izin
        $izin = Absensi::where(
                    'karyawan_id',
                    $request->karyawan_id
                )
                ->where('status', 'Izin')
                ->count();

        // Default potongan
        $potongan = 0;

        /**
         * IF ELSE alpha
         */
        if($alpha > 0){

            $potongan +=
                $alpha * 100000;
        }

        /**
         * IF ELSE izin
         */
        if($izin > 0){

            $potongan +=
                $izin * 50000;
        }

        // Total gaji
        $total_gaji =
            $gaji_pokok
            +
            $tunjangan
            +
            $uang_lembur
            -
            $potongan;

        // Update data
        $penggajian->update([

            'karyawan_id'
                => $request->karyawan_id,

            'bulan'
                => $request->bulan,

            'jam_lembur'
                => $request->jam_lembur,

            'uang_lembur'
                => $uang_lembur,

            'potongan'
                => $potongan,

            'total_gaji'
                => $total_gaji
        ]);

        // Redirect
        return redirect('/penggajian')
                ->with(
                    'success',
                    'Data berhasil diupdate'
                );
    }

    /**
     * Hapus data
     */
    public function destroy($id)
    {
        // Cari data
        $penggajian =
            Penggajian::findOrFail($id);

        // Hapus data
        $penggajian->delete();

        // Redirect
        return redirect('/penggajian')
                ->with(
                    'success',
                    'Data berhasil dihapus'
                );
    }
}