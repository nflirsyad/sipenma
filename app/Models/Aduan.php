<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aduan extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'jenis_aduan';
    protected $fillable = ['nama'];
}
