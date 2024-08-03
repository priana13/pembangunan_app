<?php

namespace App\Filament\Resources\ProyekResource\Widgets;

use App\Models\Proyek;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;

class ProyekOverView extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make("Total", Proyek::count()),
            Stat::make("Selesai", Proyek::where('status', "Selesai")->count()),
            Stat::make("Pembangunan", Proyek::where('status', 'Pembangunan')->count()),
            Stat::make("Survei", Proyek::where('status', 'Survei')->count()),
        ];
    }
}
