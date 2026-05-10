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
        Schema::create('jabatans', function (Blueprint $table) {

            // Primary key
            $table->id();

            // Foreign key ke departemen
            $table->foreignId('departemen_id')
                  ->constrained()
                  ->onDelete('cascade');

            // Nama jabatan
            $table->string('nama_jabatan');

            // Gaji pokok
            $table->bigInteger('gaji_pokok');

            // Tunjangan
            $table->bigInteger('tunjangan');

            // Timestamp
            $table->timestamps();
        });
    }

    /**
     * Reverse migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jabatans');
    }
};