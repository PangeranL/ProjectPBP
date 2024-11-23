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
        Schema::create('kaprodi', function (Blueprint $table) {
            $table->char('nidn', 14)->primary();
            $table->string('email', 50);
            $table->foreign('nidn')->references('nidn')->on('dosen')->onDelete('cascade');
            $table->foreign('email')->references('email')->on('useracc')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kaprodi');
    }
};
