<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run migrations
     */
    public function up(): void
    {
        Schema::create('penggajians', function (Blueprint $table) {

            // Primary key
            $table->id();

            /**
             * Relasi ke tabel karyawans
             */
            $table->foreignId('karyawan_id')
                ->constrained()
                ->onDelete('cascade');

            /**
             * Bulan payroll
             * Contoh:
             * Mei 2026
             */
            $table->string('bulan');

            /**
             * Total jam lembur
             */
            $table->integer('jam_lembur')
                ->default(0);

            /**
             * Total uang lembur
             */
            $table->bigInteger('uang_lembur')
                ->default(0);

            /**
             * Total potongan
             * Dari absensi:
             * Alpha / Izin
             */
            $table->bigInteger('potongan')
                ->default(0);

            /**
             * Total gaji akhir
             */
            $table->bigInteger('total_gaji');

            /**
             * Timestamp Laravel
             */
            $table->timestamps();
        });
    }

    /**
     * Reverse migrations
     */
    public function down(): void
    {
        Schema::dropIfExists('penggajians');
    }
};