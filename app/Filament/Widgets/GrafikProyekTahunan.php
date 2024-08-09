<?php

namespace App\Filament\Widgets;

use App\Models\Proyek;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\DB;

class GrafikProyekTahunan extends ChartWidget
{
    protected static ?string $heading = 'Grafik Proyek';

    protected static ?int $sort = 2;

    protected int | string | array $columnSpan = "full";

    protected function getData(): array
    {

        $data_proyek = Proyek::select(['tahun', DB::raw('count(*) as jumlah')])->groupBy('tahun')->get();

        foreach ($data_proyek as $key => $proyek) {

            $tahun[] = $proyek->tahun;
            $jumlah[] = $proyek->jumlah;

        }

        return [
                'datasets' => [
                    [
                        'label' => 'Tahun',
                        'data' => $jumlah,
                        'backgroundColor' => '#36A2EB',
                        'borderColor' => '#9BD0F5',
                    ],
                ],
                'labels' => $tahun,
            ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
