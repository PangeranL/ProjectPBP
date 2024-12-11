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
            // Menambahkan kolom-kolom yang diperlukan
            $table->id();
            $table->char('kodeMK', 8);
            $table->char('kelas', 1);
            // $table->primary(['kodeMK', 'kelas']); // Menjadikan kodeMK, nidn, dan kelas sebagai primary key
            $table->string('hari', 6);
            $table->time('mulai');
            $table->time('selesai');
            $table->string('thnAjar');
            $table->integer('kuota');
            $table->char('ruang', 4);
            $table->enum('status', ['Pending', 'Disetujui', 'Ditolak'])->default('Pending');

            // Menambahkan index untuk beberapa kolom
            $table->index('kelas');
            $table->index('ruang');

            // Menambahkan foreign key
            $table->foreign('kodeMK')->references('kodeMK')->on('matakuliah')->onDelete('cascade');
            $table->foreign('ruang')->references('nama')->on('ruang')->onDelete('cascade');

            // Kolom timestamps untuk tracking waktu pembuatan dan update
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus tabel jadwal
        Schema::dropIfExists('jadwal');
    }
};