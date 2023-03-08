<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    use HasFactory;
    protected $fillable = [
        'stap_id',
        'dinas_id',
        'tanggal',
        'jam_masuk',
        'jam_pulang',
        'lat_long_masuk',
        'lat_long_pulang',
        'photo_masuk',
        'photo_pulang',
        'bulan',
        'tahun',
    ];
}
