<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    public function run(): void
    {
        $pendidikan = ['SD', 'SMP', 'SMA/SMK', 'D3', 'S1', 'S2', 'S3'];
        $jabatan = ['Staff Admin', 'Programmer', 'Manager', 'Staff HRD', 'Staff Marketing'];

        for ($i = 1; $i <= 40; $i++) {
            Pegawai::create([
                'nip' => 'EMP' . str_pad((string) $i, 4, '0', STR_PAD_LEFT),
                'nama' => 'Pegawai Contoh ' . $i,
                'jenis_kelamin' => $i % 2 === 0 ? 'P' : 'L',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => now()->subYears(rand(20, 58))->subDays(rand(0, 365)),
                'pendidikan_terakhir' => $pendidikan[array_rand($pendidikan)],
                'jabatan' => $jabatan[array_rand($jabatan)],
                'alamat' => 'Jl. Contoh No. ' . $i,
                'no_telepon' => '08' . rand(100000000, 999999999),
                'email' => 'pegawai' . $i . '@contoh.com',
            ]);
        }
    }
}
