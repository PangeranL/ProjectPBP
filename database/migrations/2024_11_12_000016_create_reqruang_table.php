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
        Schema::create('reqruang', function (Blueprint $table) {
            $table->id(); // Add auto-incrementing 'id' as primary key
            $table->char('nama', 4);
            $table->string('prodi', 30);
            $table->integer('kuota');
            $table->enum('status', ['pending', 'diterima', 'ditolak']);
            // Remove the old primary key definition
            $table->foreign('prodi')->references('nama')->on('prodi')->onDelete('cascade');
            $table->foreign('nama')->references('nama')->on('ruang')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reqruang');
    }
};
