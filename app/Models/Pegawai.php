<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $fillable = [
        'nip',
        'nama',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'pendidikan_terakhir',
        'jabatan',
        'alamat',
        'no_telepon',
        'email',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    protected function usia(): Attribute
    {
        return Attribute::make(
            get: fn() => Carbon::parse($this->tanggal_lahir)->age,
        );
    }
}
