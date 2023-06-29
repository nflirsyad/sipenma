<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PetugasAduan extends Model
{
    use HasFactory;
    protected $table = 'petugas_aduan';
    protected $fillable = [
        'mhs_aduan_id',
        'nama',
        'jenis_aduan',
        'judul_aduan',
        'deskripsi',
        'status',
        'gambar'
    ];
}
