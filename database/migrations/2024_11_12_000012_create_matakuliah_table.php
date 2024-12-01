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
        Schema::create('matakuliah', function (Blueprint $table) {
            $table->char('kodeMK', 8)->primary();
            $table->string('namaMK', 30)->unique();
            $table->integer('sks');
            $table->integer('semester');
            $table->timestamps();
            $table->char('nidn_dosen1')->nullable();
            $table->foreign('nidn_dosen1')->references('nidn')->on('dosen');
            $table->char('nidn_dosen2')->nullable();
            $table->foreign('nidn_dosen2')->references('nidn')->on('dosen');
            $table->char('nidn_dosen3')->nullable();
            $table->foreign('nidn_dosen3')->references('nidn')->on('dosen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('matakuliah');
    }
};
