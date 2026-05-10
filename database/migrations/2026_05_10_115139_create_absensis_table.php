<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run migrations.
     */
    public function up(): void
    {
        Schema::create('absensis', function (Blueprint $table) {

            // Primary key
            $table->id();

            // Relasi ke karyawan
            $table->foreignId('karyawan_id')
                ->constrained()
                ->onDelete('cascade');

            // Tanggal absensi
            $table->date('tanggal');

            // Status kehadiran
            $table->enum('status', [
                'Hadir',
                'Izin',
                'Sakit',
                'Alpha'
            ]);

            // Jam masuk
            $table->time('jam_masuk')
                ->nullable();

            // Jam keluar
            $table->time('jam_keluar')
                ->nullable();

            // Keterangan
            $table->text('keterangan')
                ->nullable();

            // Timestamp
            $table->timestamps();
        });
    }

    /**
     * Reverse migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};