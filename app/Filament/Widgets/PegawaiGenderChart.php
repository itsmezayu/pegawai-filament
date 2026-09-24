<?php

namespace App\Filament\Widgets;

use App\Models\Pegawai;
use Filament\Widgets\ChartWidget;

class PegawaiGenderChart extends ChartWidget
{
    protected ?string $heading = 'Perbandingan Jenis Kelamin';

    protected static ?int $sort = 1; // urutan widget di dashboard
    protected int|string|array $columnSpan = '1'; // lebar widget di dashboard


    protected function getData(): array
    {
        return [
            'datasets' => [[
                'label' => 'Jumlah Pegawai',
                'data' => [
                    Pegawai::where('jenis_kelamin', 'L')->count(),
                    Pegawai::where('jenis_kelamin', 'P')->count(),
                ],
                'backgroundColor' => ['#3b82f6', '#ec4899'],
                'borderColor' => ['#ffffff', '#ffffff'],
                'barThickness' => 30,
            ]],
            'labels' => ['Laki-laki', 'Perempuan'],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
