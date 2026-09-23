<?php

namespace App\Filament\Widgets;

use App\Models\Pegawai;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;

class PegawaiUsiaChart extends ChartWidget
{
    protected ?string $heading = 'Rentang Usia Pegawai';

    protected function getData(): array
    {
        $rentang = [
            '<25' => fn ($u) => $u < 25,
            '25-34' => fn ($u) => $u >= 25 && $u <= 34,
            '35-44' => fn ($u) => $u >= 35 && $u <= 44,
            '45-54' => fn ($u) => $u >= 45 && $u <= 54,
            '55+' => fn ($u) => $u >= 55,
        ];

        $usiaSemua = Pegawai::pluck('tanggal_lahir')->map(fn ($t) => Carbon::parse($t)->age);

        return [
            'datasets' => [[
                'label' => 'Jumlah Pegawai',
                'data' => collect($rentang)->map(fn ($cek) => $usiaSemua->filter($cek)->count())->values()->toArray(),
                'backgroundColor' => '#f97316',
            ]],
            'labels' => array_keys($rentang),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
