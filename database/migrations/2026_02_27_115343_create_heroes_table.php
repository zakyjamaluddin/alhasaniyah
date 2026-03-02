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
        Schema::create('heroes', function (Blueprint $table) {
            $table->id();
            $table->string('heading_1');
            $table->string('heading_2')->nullable();
            $table->string('sub_heading');

            // Feature 1
            $table->string('feature_1')->nullable();
            $table->text('description_1')->nullable();

            // Feature 2
            $table->string('feature_2')->nullable();
            $table->text('description_2')->nullable();

            // Feature 3
            $table->string('feature_3')->nullable();
            $table->text('description_3')->nullable();

            // Image
            $table->string('image')->nullable();
            // (biasanya menyimpan path storage)

            // Popup
            $table->string('popup_header')->nullable();
            $table->text('popup_description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('heroes');
    }
};
