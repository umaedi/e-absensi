<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Stap extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'dinas_id',
        'jabatan_id',
        'nip',
        'name',
        'email',
        'no_tlp',
        'password',
        'image',
        'remember_token'
    ];

    public function dinas()
    {
        return $this->belongsTo(Dinas::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function cuty()
    {
        return $this->hasMany(Cuty::class);
    }
}
