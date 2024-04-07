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
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id('PeminjamanID');
            $table->unsignedBigInteger('BukuID');
            $table->unsignedBigInteger('UserID');
            $table->date('TanggalPeminjaman');
            $table->date('TanggalPengembalian');
            $table->enum('StatusPeminjaman',['ditunda','dipinjam','ditolak','selesai'])->default('ditunda');
            $table->foreign('BukuID')->references('BukuID')->on('bukus')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('UserID')->references('UserID')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
