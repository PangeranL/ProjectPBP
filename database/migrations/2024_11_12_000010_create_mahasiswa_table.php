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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->char('nim', 14)->primary();
            $table->string('name', 30);
            $table->date('dob');
            $table->string('phone', 13);
            $table->string('address', 50);
            $table->char('nidnWali', 14);
            $table->string('email', 50);
            $table->integer('thnmasuk');
            $table->string('status',25);
            $table->unsignedInteger('smt');
            $table->foreign('email')->references('email')->on('useracc')->onDelete('cascade');
            $table->foreign('nidnWali')->references('nidn')->on('pembimbingakademik')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
