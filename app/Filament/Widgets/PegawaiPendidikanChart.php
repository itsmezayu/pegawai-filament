<?php

namespace App\Filament\Widgets;

use App\Models\Pegawai;
use Filament\Widgets\ChartWidget;

class PegawaiPendidikanChart extends ChartWidget
{
    protected ?string $heading = 'Pendidikan Terakhir';

    protected static ?int $sort = 3; // urutan widget di dashboard
    protected int | string | array $columnSpan = 1; // lebar widget di dashboard


    protected function getData(): array
    {
        $jenjang = ['SD', 'SMP', 'SMA/SMK', 'D3', 'S1', 'S2', 'S3'];

        return [
            'datasets' => [[
                'label' => 'Jumlah Pegawai',
                'data' => collect($jenjang)
                    ->map(fn($j) => Pegawai::where('pendidikan_terakhir', $j)->count())
                    ->toArray(),
                'backgroundColor' => [
                    '#ff0000', // SD
                    '#ff6a00', // SMP
                    '#febf00', // SMA/SMK
                    '#00ff5e', // D3
                    '#00d9ff', // S1
                    '#0062ff', // S2
                    '#9a6eff', // S3
                ],
                'radius' => 150,
            ]],
            'labels' => $jenjang,
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
