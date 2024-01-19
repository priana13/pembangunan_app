<?php

namespace App\Filament\Resources\JenisProyekResource\Pages;

use App\Filament\Resources\JenisProyekResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenisProyek extends EditRecord
{
    protected static string $resource = JenisProyekResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
