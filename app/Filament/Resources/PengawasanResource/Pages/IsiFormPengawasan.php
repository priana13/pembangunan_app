<?php

namespace App\Filament\Resources\PengawasanResource\Pages;

use App\Filament\Resources\PengawasanResource;
use App\Models\Pengawasan;
use Filament\Resources\Pages\Page;

class IsiFormPengawasan extends Page
{
    protected static string $resource = PengawasanResource::class;

    protected static string $view = 'filament.resources.pengawasan-resource.pages.isi-form-pengawasan';

    public $record;

    public function mount(Pengawasan $record){

       $this->record = $record;
       
    }
}