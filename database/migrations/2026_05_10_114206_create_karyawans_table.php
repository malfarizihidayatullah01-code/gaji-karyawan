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
        Schema::create('karyawans', function (Blueprint $table) {

            // Primary key
            $table->id();

            // Nama karyawan
            $table->string('nama_karyawan');

            // Relasi ke jabatan
            $table->foreignId('jabatan_id')
                  ->constrained()
                  ->onDelete('cascade');

            // Jenis kelamin
            $table->enum('jenis_kelamin', [
                'L',
                'P'
            ]);

            // Email
            $table->string('email');

            // Nomor HP
            $table->string('no_hp');

            // Alamat
            $table->text('alamat');

            // Tanggal masuk kerja
            $table->date('tanggal_masuk');

            // Timestamp Laravel
            $table->timestamps();
        });
    }

    /**
     * Reverse migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};