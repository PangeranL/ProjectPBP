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
        Schema::create('bagianakademik', function (Blueprint $table) {
            $table->char('nidn', 14)->primary();
            $table->string('name', 30);
            $table->date('dob');
            $table->string('phone', 13);
            $table->string('address', 50);
            $table->string('email', 50);
            $table->string('fakultas', 30);
            $table->foreign('fakultas')->references('nama')->on('fakultas')->onDelete('cascade');
            $table->foreign('email')->references('email')->on('useracc')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bagianakademik');
    }
};
