<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Pegawai extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'opd_id',
        'jabatan',
        'nip',
        'name',
        'email',
        'no_tlp',
        'password',
        'image',
        'remember_token'
    ];

    public function opd()
    {
        return $this->belongsTo(Opd::class);
    }

    public function cuty()
    {
        return $this->hasMany(Cuty::class);
    }

    public function absent()
    {
        return $this->hasMany(Pegawai::class);
    }
}
