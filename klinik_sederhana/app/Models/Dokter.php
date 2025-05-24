<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'spesialis',
        'no_telp',
        'alamat'
    ];

    public function kunjungans()
    {
        return $this->hasMany(Kunjungan::class);
    }
}
