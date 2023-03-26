<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absent extends Model
{
    use HasFactory;
    protected $fillable = [
        'opd_id',
        'pegawai_id',
        'tanggal',
        'jam_masuk',
        'jam_pulang',
        'lat_long_masuk',
        'lat_long_pulang',
        'photo_masuk',
        'photo_pulang',
        'status'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class);
    }
}
