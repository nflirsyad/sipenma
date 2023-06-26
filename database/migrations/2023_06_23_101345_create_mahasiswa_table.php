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
            $table->id();
            $table->string('nim',50)->unique();
            $table->string('nama_mahasiswa',50)->unique();
            $table->string('username',50)->unique();
            $table->string('email',50)->unique();
            $table->string('password');
            $table->smallInteger('level')->default(1)->comment('1=mahasiswa, 2=petugas, 3=admin');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
