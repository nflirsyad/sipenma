<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\petugasAduan;

class MhsAduan extends Model
{
    use HasFactory;
    protected $table = 'mhs_aduan';
    protected $fillable = [
        'jenis_aduan',
        'judul_aduan',
        'deskripsi',
        'status',
        'gambar',
        'keterangan',
        'bukti_selesai'
    ];

    public function petugasAduan()
    {
        return $this->hasMany(PetugasAduan::class);
    }
}
