<?php

namespace App\Filament\Resources\JenisProyekResource\Pages;

use App\Filament\Resources\JenisProyekResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJenisProyeks extends ListRecords
{
    protected static string $resource = JenisProyekResource::class;

    protected static ?string $title = "Jenis Proyek";

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
