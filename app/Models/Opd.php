<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opd extends Model
{
    use HasFactory;
    protected $fillable = ['nama_opd'];

    public function stap()
    {
        return $this->hasMany(Stap::class);
    }

    public function cuty()
    {
        return $this->hasMany(Cuty::class);
    }
}
