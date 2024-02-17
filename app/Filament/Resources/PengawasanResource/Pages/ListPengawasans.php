<?php

namespace App\Filament\Resources\PengawasanResource\Pages;

use App\Filament\Resources\PengawasanResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPengawasans extends ListRecords
{
    protected static string $resource = PengawasanResource::class;

    protected static ?string $title = "Pengawasan";

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->url(function(){
                return route('filament.admin.pages.formulir-pengawasan');
            })->label("Tambah Baru"),
        ];
    }
}
