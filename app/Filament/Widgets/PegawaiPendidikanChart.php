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
                'backgroundColor' => '#22c55e',
            ]],
            'labels' => $jenjang,
        ];
    }

    protected function getType(): string
    {
        return 'pie';
    }
}
