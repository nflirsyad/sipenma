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
        Schema::create('mhs_aduan', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_aduan',50);
            $table->string('judul_aduan',50);
            $table->string('deskripsi');
            $table->smallInteger('status')->default(1)->comment('1=verif, 2=do, 3=done, 4=reject');
            $table->string('gambar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mhs_aduan');
    }
};
