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
        Schema::create('juaras', function (Blueprint $table) {
            $table->id();
            $table->string('juara')->nullable(); // contoh: Juara 1, Juara Harapan, dll
            $table->string('judul');
            $table->text('deskripsi')->nullable();

            $table->string('kategori')->nullable();
            // contoh: Akademik, Non Akademik, Tahfidz, Olahraga, dll

            $table->date('tanggal')->nullable();

            $table->string('foto')->nullable();
            // simpan path storage

            $table->boolean('show')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('juaras');
    }
};
