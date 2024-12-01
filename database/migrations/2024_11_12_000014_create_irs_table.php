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
            $table->integer('smt');
            $table->char('nim', 14);
            $table->char('kodeMK', 8);
            $table->primary(['nim', 'smt', 'kodeMK']);
            $table->char('kelas', 1);
            $table->char('ruang', 4);
            $table->integer('status')->nullable();
            $table->foreign('kelas')->references('kelas')->on('jadwal')->onDelete('cascade');
            $table->foreign('ruang')->references('ruang')->on('jadwal')->onDelete('cascade');
            $table->foreign('nim')->references('nim')->on('mahasiswa')->onDelete('cascade');
            $table->foreign('kodeMK')->references('kodeMK')->on('jadwal')->onDelete('cascade');
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