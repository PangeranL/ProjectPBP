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
        Schema::create('jadwal', function (Blueprint $table) {
            $table->id(); 
            $table->char('kodeMK', 8);
            $table->char('kelas', 1);
            $table->string('hari', 6);
            $table->time('mulai');
            $table->time('selesai');
            $table->char('thnAjar', 16);
            $table->integer('kuota');
            $table->char('ruang', 4);
            $table->enum('status', ['Pending', 'Disetujui', 'Ditolak'])->default('Pending');

            $table->index('kelas');
            $table->index('ruang');

            $table->foreign('kodeMK')->references('kodeMK')->on('matakuliah')->onDelete('cascade');
            $table->foreign('ruang')->references('nama')->on('ruang')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal');
    }
};
