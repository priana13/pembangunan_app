<?php

namespace App\Filament\Pages;

use App\Models\Kategori;
use App\Models\Proyek;
use Filament\Pages\Page;

class FormulirPengawasan extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.formulir-pengawasan';

    protected static ?string $navigationLabel = 'Formulir';

    public $list_proyek;

    public $list_kategori;

    public $petugas;

    public function mount(){

        $this->list_proyek = Proyek::get();

        $this->list_kategori = Kategori::get();

        $this->petugas = auth()->user()->name;
       
    }

}
