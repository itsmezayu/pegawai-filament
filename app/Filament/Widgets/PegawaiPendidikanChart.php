<?php

namespace App\Filament\Widgets;

use App\Models\Pegawai;
use Filament\Widgets\ChartWidget;

class PegawaiPendidikanChart extends ChartWidget
{
    protected ?string $heading = 'Pendidikan Terakhir';

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
                    '#ef4444', // SD
                    '#f97316', // SMP
                    '#eab308', // SMA/SMK
                    '#22c55e', // D3
                    '#06b6d4', // S1
                    '#3b82f6', // S2
                    '#8b5cf6', // S3
                ],
            ]],
            'labels' => $jenjang,
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
