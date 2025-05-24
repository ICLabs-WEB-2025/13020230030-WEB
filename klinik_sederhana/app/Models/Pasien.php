<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'alamat',
        'no_telp',
        'tanggal_lahir',
        'jenis_kelamin'
    ];

    public function kunjungans()
    {
        return $this->hasMany(Kunjungan::class);
    }
}
