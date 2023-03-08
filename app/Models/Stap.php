<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Stap extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'dinas_id',
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
}
