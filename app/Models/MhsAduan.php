<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MhsAduan extends Model
{
    use HasFactory;
    protected $table = 'mhs_aduan';
    protected $fillable = [
        'jenis_aduan',
        'judul_aduan',
        'deskripsi',
        'status',
        'gambar'
    ];
}
