<?php

namespace App\Filament\Resources\PengawasanResource\Pages;

use App\Filament\Resources\PengawasanResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPengawasan extends EditRecord
{
    protected static string $resource = PengawasanResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
