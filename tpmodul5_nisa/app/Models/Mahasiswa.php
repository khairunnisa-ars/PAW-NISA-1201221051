<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa';

    protected $fillable = [

        'nama',
        'nim',
        'jurusan',
        'fakultas',
        'foto_profil',

    ];

    protected function fotoProfil(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $value ? asset('storage/'.$value) : null,
            set: fn ($value) => $value
        );
    }
}
