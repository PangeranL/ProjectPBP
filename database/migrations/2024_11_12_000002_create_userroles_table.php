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
        Schema::create('userroles', function (Blueprint $table) {
            $table->id();
            $table->string('email', 50);
            $table->string('role', 20);
            $table->foreign('email')->references('email')->on('useracc')->onDelete('cascade');
            $table->foreign('role')->references('role')->on('roles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('userroles');
    }
};