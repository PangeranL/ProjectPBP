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
        Schema::create('khs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idIRS');
            $table->unsignedInteger('smt');
            $table->char('nim', 14);
            $table->char('kodeMK', 8);
            $table->char('nilai', 1)->nullable();
            $table->float('ips');
            $table->float('ipk');
            $table->foreign('idIRS')->references('id')->on('irs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('khs');
    }
};
