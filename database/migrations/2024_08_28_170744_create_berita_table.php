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
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->string('judul', 150);
            $table->text('konten');
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('penulis_id');
            $table->unsignedBigInteger('artis_id')->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('kategori_id')->references('id')->on('kategori_berita')->onDelete('cascade');
            $table->foreign('penulis_id')->references('id')->on('penulis')->onDelete('cascade');
            $table->foreign('artis_id')->references('id')->on('artis')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('berita');
    }
};
