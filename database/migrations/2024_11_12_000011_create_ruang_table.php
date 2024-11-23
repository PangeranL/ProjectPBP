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
        Schema::create('ruang', function (Blueprint $table) {
            $table->char('nama', 4);
            $table->integer('kuota');
            $table->string('prodi', 30)->nullable();
            $table->string('fakultas', 30);
            $table->primary(['nama', 'fakultas']);
            $table->foreign('prodi')->references('nama')->on('prodi')->onDelete('cascade');
            $table->foreign('fakultas')->references('nama')->on('fakultas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruang');
    }
};
