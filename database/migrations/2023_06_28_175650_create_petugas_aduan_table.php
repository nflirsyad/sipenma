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
        Schema::create('petugas_aduan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mhs_aduan_id')->nullable();
            $table->foreign('mhs_aduan_id')->references('id')->on('mhs_aduan');
            $table->string('nama',50);
            $table->string('jenis_aduan',50);
            $table->string('judul_aduan',50);
            $table->text('deskripsi');
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
        Schema::table('petugas_aduan', function (Blueprint $table) {
            $table->dropForeign(['mhs_aduan_id']);
        });
        Schema::dropIfExists('petugas_aduan');
    }
};
