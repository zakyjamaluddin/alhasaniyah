<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('santri_barus', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nisn')->nullable()->unique();
            // unique karena NISN secara nasional unik

            $table->string('asal_sekolah')->nullable();
            $table->string('nama_orang_tua')->nullable();

            $table->text('alamat_lengkap')->nullable();
            $table->string('nomor_hp')->nullable();
            $table->string('email')->nullable();
            $table->enum('status', ['pending', 'diverifikasi', 'diterima', 'ditolak'])
                ->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santri_barus');
    }
};
