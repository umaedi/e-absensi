<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Kepalaopd extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'opd_id',
        'jabatan_id',
        'nip',
        'name',
        'email',
        'no_tlp',
        'password',
        'image',
        'remember_token'
    ];
}
