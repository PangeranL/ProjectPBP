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
        Schema::create('irs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idJadwal');
            $table->unsignedInteger('smt');
            $table->char('nim', 14);
            $table->char('kodeMK', 8);
            $table->char('kelas', 1);
            $table->char('ruang', 4);
            $table->integer('status')->nullable();
            $table->foreign('idJadwal')->references('id')->on('jadwal')->onDelete('cascade');
            $table->foreign('nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('irs');
    }
};